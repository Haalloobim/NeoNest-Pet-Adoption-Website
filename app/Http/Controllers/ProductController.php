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

        if (!isset($result['predictions'][0])) {
            return redirect()->route('dashboard')->with('error', 'Image not recognized! Please try again.');
        }
        $resData = [$result, $path];
        return $resData;
        // Further processing if the prediction is set
    }

    public function upload(Request $request)
    {
        $image = $request->file('image');
        $petResult = $this->detect($image);
        // dd($petResult);
        if ($petResult instanceof \Illuminate\Http\RedirectResponse) {
            return redirect()->route('dashboard')->with('error', 'Image not recognized! Please try again.');
        }

        $name = $request->input('name');
        $price = $request->input('price');
        $description = $request->input('description');

        // dd($petResult);
        $res1 = $petResult[0];
        $imagePath = $petResult[1];

        $class = $res1['predictions'][0]['class'];
        $parsed = explode('-', $class);
        $category = $parsed[0];
        $species = str_replace("_", " ", $parsed[1]);

        $data = [
            'name' => $name,
            'price' => $price,
            'description' => $description,
            'category' => $category,
            'species' => $species,
            'image_path' => $imagePath,
            'seller_id' => Auth::id(),
        ];

        Product::create($data);

        return redirect()->route('dashboard')->with('success', 'Product uploaded successfully!');
    }

    public function uploadProduct(Product $product)
    {

        if ((Auth::user()->role != 'seller')) {
            return redirect()->route('dashboard')->with('error', 'Unauthorized access!');
        }
        return view('SellerUpload');
    }

    public function productDetail(Product $product)
    {
        if (Auth::id() != $product->seller_id) {
            return redirect()->route('dashboard')->with('error', 'You are not authorized to view this product.');
        }
        return view('ProductDetails', compact('product'));
    }

    public function filterProducts(Request $request)
    {
        $query = Product::query();

        if ($request->sortBy === 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($request->sortBy === 'price_desc') {
            $query->orderBy('price', 'desc');
        }

        if ($request->categories) {
            $query->whereIn('category', $request->categories);
        }

        if ($request->priceFrom) {
            $query->where('price', '>=', $request->priceFrom);
        }
        if ($request->priceTo) {
            $query->where('price', '<=', $request->priceTo);
        }

        $products = $query->get();

        return response()->json(['products' => $products]);
    }
}
