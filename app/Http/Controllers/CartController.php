<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\TransactionProduct;

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
        
        if ($cart->count() == 0) {
            return view('user.UserCart', ['cart' => $cart, 'total' => 0]);
        }

        $total = 0;
        foreach ($cart as $product) {
            $total += $product->price;
        }

        $transaction = Transaction::create([
            'user_id' => $user->id,
            'total_price' => $total
        ]);

        foreach ($cart as $product) {
            TransactionProduct::create([
                'transaction_id' => $transaction->id,
                'product_id' => $product->id
            ]);
            $product->product_status = 'sold';
            $product->save();
        }

        $user->cart()->detach();
        return view('user.UserCart', ['cart' => null, 'total' => 0]);
    }
}
