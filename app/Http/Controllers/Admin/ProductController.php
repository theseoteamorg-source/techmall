<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['category', 'brand']);

        if ($request->filled('stock_status')) {
            if ($request->stock_status == 'in_stock') {
                $query->whereHas('variants', function ($q) {
                    $q->where('stock', '>', 0);
                });
            } elseif ($request->stock_status == 'out_of_stock') {
                $query->whereDoesntHave('variants', function ($q) {
                    $q->where('stock', '>', 0);
                });
            }
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }

        $products = $query->latest()->paginate(10);
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.products.index', compact('products', 'categories', 'brands'));
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.create', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:products',
            'description' => 'required|string',
            'details' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'include_in_sitemap' => 'required|boolean',
            'variants.*.name' => 'required_with:variants.*.price,variants.*.sku,variants.*.stock|string|max:255',
            'variants.*.price' => 'required_with:variants.*.name|numeric',
            'variants.*.sku' => 'nullable|string|max:255',
            'variants.*.stock' => 'nullable|integer',
        ]);

        $slug = Str::slug($request->name);
        $count = Product::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }

        $imageName = $slug . '-' . time() . '.' . $request->image->extension();
        Storage::disk('products')->put($imageName, file_get_contents($request->image));

        $product_data = $request->only([
            'name',
            'description',
            'details',
            'price',
            'category_id',
            'brand_id',
            'meta_title',
            'meta_description',
            'meta_keywords',
            'include_in_sitemap'
        ]);
        $product_data['slug'] = $slug;
        $product_data['image'] = $imageName;
        $product = Product::create($product_data);


        if ($request->has('variants')) {
            foreach ($request->variants as $variantData) {
                $product->variants()->create($variantData);
            }
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = $slug . '-' . uniqid() . '.' . $image->extension();
                Storage::disk('products')->put($imageName, file_get_contents($image));
                $product->images()->create(['image_path' => $imageName]);
            }
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $product->load(['images', 'variants']);
        return view('admin.products.edit', compact('product', 'categories', 'brands'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:products,name,' . $product->id,
            'description' => 'required|string',
            'details' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'include_in_sitemap' => 'required|boolean',
            'variants.*.id' => 'nullable|exists:product_variants,id',
            'variants.*.name' => 'required_with:variants.*.price,variants.*.sku,variants.*.stock|string|max:255',
            'variants.*.price' => 'required_with:variants.*.name|numeric',
            'variants.*.sku' => 'nullable|string|max:255',
            'variants.*.stock' => 'nullable|integer',
        ]);

        $slug = Str::slug($request->name);
        $count = Product::where('slug', 'LIKE', "{$slug}%")->where('id', '!=', $product->id)->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }

        $data = $request->only([
            'name',
            'description',
            'details',
            'price',
            'category_id',
            'brand_id',
            'meta_title',
            'meta_description',
            'meta_keywords',
            'include_in_sitemap'
        ]);
        $data['slug'] = $slug;

        if ($request->hasFile('image')) {
            if ($product->image && Storage::disk('products')->exists($product->image)) {
                Storage::disk('products')->delete($product->image);
            }
            $imageName = $slug . '-' . time() . '.' . $request->image->extension();
            Storage::disk('products')->put($imageName, file_get_contents($request->image));
            $data['image'] = $imageName;
        }

        $product->update($data);

        if ($request->has('variants')) {
            $variantIds = [];
            foreach ($request->variants as $variantData) {
                if (isset($variantData['id'])) {
                    $variant = $product->variants()->find($variantData['id']);
                    if ($variant) {
                        $variant->update($variantData);
                        $variantIds[] = $variant->id;
                    }
                } else {
                    $newVariant = $product->variants()->create($variantData);
                    $variantIds[] = $newVariant->id;
                }
            }
            $product->variants()->whereNotIn('id', $variantIds)->delete();
        } else {
            $product->variants()->delete();
        }


        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = $slug . '-' . uniqid() . '.' . $image->extension();
                Storage::disk('products')->put($imageName, file_get_contents($image));
                $product->images()->create(['image_path' => $imageName]);
            }
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        if ($product->image && Storage::disk('products')->exists($product->image)) {
            Storage::disk('products')->delete($product->image);
        }
        foreach ($product->images as $image) {
            if (Storage::disk('products')->exists($image->image_path)) {
                Storage::disk('products')->delete($image->image_path);
            }
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully');
    }

    public function destroyImage(ProductImage $image)
    {
        if (Storage::disk('products')->exists($image->image_path)) {
            Storage::disk('products')->delete($image->image_path);
        }
        $image->delete();

        return back()->with('success', 'Image deleted successfully.');
    }
}
