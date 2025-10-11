<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IndexController extends Controller
{

    public function index()
    {
         // Fetch categories from API
        $response = Http::withHeaders([
            'X-API-KEY' => '8f4d9a2b-6c1e-4b7a-9d3e-12f5a8b7c9d0'
        ])->get('https://admin.saadatyapp.com/api/categories');

        // Convert response to array
        $categories = $response->json();

        return view('frontend.index', compact('categories'));
    }

    public function stores($id)
    {
        $response = Http::withHeaders([
            'X-API-KEY' => '8f4d9a2b-6c1e-4b7a-9d3e-12f5a8b7c9d0'
        ])->get('https://admin.saadatyapp.com/api/stores',[
            'category' => $id
        ]);

        // Convert response to array
        $stores = $response->json();

        $categoryName = collect($stores)->firstWhere('category_id', (string) $id)['category'] ?? null;

        $response = Http::withHeaders([
            'X-API-KEY' => '8f4d9a2b-6c1e-4b7a-9d3e-12f5a8b7c9d0'
        ])->get('https://admin.saadatyapp.com/api/districts');

        // Convert response to array
        $districts = $response->json();

        return view('frontend.sub_categories', compact('stores', 'districts', 'categoryName'));
    }

    public function Store($id)
    {
        $response = Http::withHeaders([
        'X-API-KEY' => '8f4d9a2b-6c1e-4b7a-9d3e-12f5a8b7c9d0'
        ])->get("https://admin.saadatyapp.com/api/store", [
            'store_id' => $id
        ]);

        $store = $response->json();
        // Get only 4 items from media
        $media = collect($store['media'])->take(4);

        return view('frontend.blog', compact('store', 'media'));
    }


}
