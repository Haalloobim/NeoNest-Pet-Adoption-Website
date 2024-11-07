<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function upload(Request $request)
    {
        $image = $request->file('image');
        $image->storeAs('public/images/products', $image->hashName());

        if ($request->category == 'other') {
            $category = $request->other_category;
        } else {
            $category = $request->category;
        }

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category' => $category,
            'image' => $image->hashName(),
            'seller_id' => Auth::id(),
        ]);
        return redirect()->route('dashboard')->with('success', 'Product uploaded successfully!');
    }
}
