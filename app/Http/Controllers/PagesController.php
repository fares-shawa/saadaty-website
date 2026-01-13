<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PagesController extends Controller{

    public function index(){
        $response = Http::withHeaders([
            'X-API-KEY' => '8f4d9a2b-6c1e-4b7a-9d3e-12f5a8b7c9d0'
        ])->get('https://admin.saadatyapp.com/api/categories');
        $categories = $response->json();
        return view('welcome', compact('categories'));
    }

    public function privacy(){
        return view('privacy');
    }

    public function stores($id) {
        $response = Http::withHeaders([
            'X-API-KEY' => '8f4d9a2b-6c1e-4b7a-9d3e-12f5a8b7c9d0'
        ])->get('https://admin.saadatyapp.com/api/stores',[
            'category' => $id
        ]);
        $stores = $response->json();
        $categoryName = collect($stores)->firstWhere('category_id', (string) $id)['category'] ?? null;
        $response = Http::withHeaders([
            'X-API-KEY' => '8f4d9a2b-6c1e-4b7a-9d3e-12f5a8b7c9d0'
        ])->get('https://admin.saadatyapp.com/api/districtsMobile');
        $districts = $response->json();
        return view('list', compact('stores', 'districts', 'categoryName'));
    }

    public function Store($id){
        $response = Http::withHeaders([
        'X-API-KEY' => '8f4d9a2b-6c1e-4b7a-9d3e-12f5a8b7c9d0'
        ])->get("https://admin.saadatyapp.com/api/store", [
            'store_id' => $id
        ]);

        $store = $response->json();
        $media = collect($store['media'])->take(4);
        return view('store', compact('store', 'media'));
    }

    public function deleteCustomer(Request $request){
        return response(['message' => 'تمت جدولة حذف الحساب'], 200);
    }


}
