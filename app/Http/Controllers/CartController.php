<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Product $product)
    {
        $user = User::find(Auth::id());
        $user->cart()->attach($product);
        return redirect()->route('product.details', ['product' => $product->id])
            ->with('message', 'Product added to cart');
    }

    public function removeCart(Product $product)
    {
        $user = User::find(Auth::id());
        $user->cart()->detach($product);
        return redirect()->route('cart.show')
            ->with('message', 'Product removed from cart');
    }

    public function showCart()
    {
        $user = User::find(Auth::id());
        $cart = $user->cart;
        $total = 0;
        foreach ($cart as $product) {
            $total += $product->price;
        }
        return view('user.UserCart', ['cart' => $cart, 'total' => $total]);
    }

    public function checkout()
    {
        $user = User::find(Auth::id());
        $cart = $user->cart;
        foreach ($cart as $product) {
            $product->product_status = 'sold';
            $product->save();
        } 
        $total = 0;
        foreach ($cart as $product) {
            $total += $product->price;
        }
        $user->cart()->detach();
        return view('user.UserCart', ['cart' => $cart, 'total' => $total]);
    }
}
