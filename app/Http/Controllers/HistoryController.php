<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionProduct;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function show()
    {   
        $transactions = Transaction::where('user_id', Auth::user()->id)->get();
        $userPets = [];
        $userPets = [];

        foreach ($transactions as $transaction) {
            foreach ($transaction->transactionProducts as $product) {
                $userPets[] = $product->product;
            }
        }
        
        return view('user.UserAdoptedPet', compact('userPets'));
    }
}
