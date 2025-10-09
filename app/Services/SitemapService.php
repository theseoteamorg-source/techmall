<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;

class SitemapService
{
    public function generate()
    {
        $sitemap = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
        $sitemap .= "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";

        // Add static pages
        $sitemap .= $this->addUrl(URL::to('/'));
        $sitemap .= $this->addUrl(URL::to('/products'));
        $sitemap .= $this->addUrl(URL::to('/category'));
        $sitemap .= $this->addUrl(URL::to('/brands'));

        // Add dynamic pages from the database
        $products = DB::table('products')->orderBy('created_at', 'desc')->get();
        foreach ($products as $product) {
            $sitemap .= $this->addUrl(URL::to('/products/' . $product->slug));
        }

        $categories = DB::table('categories')->orderBy('created_at', 'desc')->get();
        foreach ($categories as $category) {
            $sitemap .= $this->addUrl(URL::to('/category/' . $category->slug));
        }

        $brands = DB::table('brands')->orderBy('created_at', 'desc')->get();
        foreach ($brands as $brand) {
            $sitemap .= $this->addUrl(URL::to('/brands/' . $brand->slug));
        }

        $sitemap .= "</urlset>";

        Storage::disk('public')->put('sitemap.xml', $sitemap);
    }

    protected function addUrl($url, $lastmod = null, $changefreq = 'daily', $priority = '0.8')
    {
        $lastmod = $lastmod ?: date('Y-m-d');
        return "  <url>\n" .
               "    <loc>$url</loc>\n" .
               "    <lastmod>$lastmod</lastmod>\n" .
               "    <changefreq>$changefreq</changefreq>\n" .
               "    <priority>$priority</priority>\n" .
               "  </url>\n";
    }
}
