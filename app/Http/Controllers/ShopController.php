<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{


    public function addWishlist(Request $request, Product $product)
    {
        $user = User::find(Auth::id());

        // Attach product to user's wishlist
        $user->wishlist()->attach($product);

        // dd($user,$product->wishlistedBy()->where('user_id', $user->id)->exists());

        return redirect()->route('product.details', ['product' => $product->id])
            ->with('message', 'Product added to wishlist');
    }

    public function removeWishlist(Request $request, Product $product)
    {
        $user = User::find(Auth::id());

        // Detach product from user's wishlist
        $user->wishlist()->detach($product);

        return redirect()->route('product.details', ['product' => $product->id])
            ->with('message', 'Product removed from wishlist');
    }
}
