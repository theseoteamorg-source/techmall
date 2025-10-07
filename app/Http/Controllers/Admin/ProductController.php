<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:products',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only('name', 'price', 'description');
        $data['slug'] = Str::slug($request->name);
        $data['published'] = $request->has('published');
        $data['featured'] = $request->has('featured');

        if ($request->hasFile('image')) {
            $imageName = $data['slug'] . '-' . time() . '.' . $request->image->extension();
            $request->image->storeAs('public/products', $imageName);
            $data['image'] = 'products/' . $imageName;
        }

        Product::create($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $product->load('variants');
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:products,name,' . $product->id,
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only('name', 'price', 'description');
        $data['slug'] = Str::slug($request->name);
        $data['published'] = $request->has('published');
        $data['featured'] = $request->has('featured');

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::delete('public/' . $product->image);
            }
            $imageName = $data['slug'] . '-' . time() . '.' . $request->image->extension();
            $request->image->storeAs('public/products', $imageName);
            $data['image'] = 'products/' . $imageName;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully');
    }

    public function updateVariants(Request $request, Product $product)
    {
        $variantsData = $request->input('variants', []);
        $defaultVariantId = $request->input('is_default');

        foreach ($variantsData as $variantId => $variantData) {
            $variant = ProductVariant::find($variantId);
            if ($variant) {
                $variant->update($variantData);
            }
        }

        $product->variants()->update(['is_default' => false]);

        $defaultVariant = ProductVariant::find($defaultVariantId);
        if ($defaultVariant) {
            $defaultVariant->update(['is_default' => true]);
        }

        return redirect()->back()->with('success', 'Product variants updated successfully.');
    }
}
