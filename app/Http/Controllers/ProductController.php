<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function detect(UploadedFile $image)
    {   
        $path = $image->store('products', 'public');
        $data = base64_encode(Storage::disk('public')->get($path));
        $api_key = env('ROBOFLOW_API_KEY');
        $model_endpoint = 'oxford-pets-tgv53/1';

        $url = "https://detect.roboflow.com/" . $model_endpoint
            . "?api_key=" . $api_key
            . "&name=" . $image->hashName();

        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => $data
            )
        );

        $context  = stream_context_create($options);
        $result = json_decode(file_get_contents($url, false, $context), true);
        dd($result);
    }

    public function upload(Request $request)
    {
        $image = $request->file('image');
        $cat = $this->detect($image);
        dd($cat);
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category' => $request->category,
            'image' => $image->hashName(),
            'seller_id' => Auth::id(),
        ]);

        
        return redirect()->route('seller.dashboard')->with('success', 'Product uploaded successfully!');
    }
}
