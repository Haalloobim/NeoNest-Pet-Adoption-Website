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
            'product_status' => 'available',
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
        return view('seller.SellerUpload');
    }

    public function productDetail(Product $product)
    {
        $user = Auth::user();
        $role = $user->role;


        if (($role == 'seller' && $user->id == $product->seller_id) || $role == 'user') {
            // dd($product->wishlistedBy()->where('user_id', $user->id)->exists());
            
            return view('product.ProductDetails', compact('product', 'user'));
        }

        return redirect()->route('dashboard')->with('error', 'Unauthorized access!');
    }

    public function deleteProduct(Product $product)
    {
        if (Auth::id() != $product->seller_id) {
            return redirect()->route('dashboard')->with('error', 'You are not authorized to delete this product.');
        }
        $product->delete();
        return redirect()->route('dashboard')->with('success', 'Product deleted successfully!');
    }

    public function editProduct(Product $product)
    {
        if (Auth::id() != $product->seller_id) {
            return redirect()->route('dashboard')->with('error', 'You are not authorized to edit this product.');
        }
        return view('product.ProductEdit', compact('product'));
    }

    public function updateProduct(Request $request, Product $product)
    {
        if (Auth::id() != $product->seller_id) {
            return redirect()->route('dashboard')->with('error', 'You are not authorized to edit this product.');
        }

        $product->update($request->all());
        return redirect()->route('dashboard')->with('success', 'Product updated successfully!');
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

        // dd($request->priceRanges);
        if ($request->has('priceFilters')) {
            $query->where(function ($query) use ($request) {
                foreach ($request->priceFilters as $range) {
                    if (isset($range['priceFrom']) && isset($range['priceTo'])) {
                        $query->orWhereBetween('price', [$range['priceFrom'], $range['priceTo']]);
                    }
                }
            });
        }
        // query only users product if user is a seller

        if (Auth::user()->role == 'seller') {
            $query->where('seller_id', Auth::id());
        }

        $products = $query->get();

        return response()->json(['products' => $products]);
    }

    public function dashboard()
    {
        $user = Auth::user();
        $products = Product::where('seller_id', $user->id)->get();
        // dd($user->id, $products);
        $allProducts = Product::all();
        if (Auth::check()) {
            if (Auth::user()->role == 'seller') {
                return view('seller.SellerDashboard', compact('user', 'products'));
            } else if (Auth::user()->role == 'user') {
                return view('user.UserDashboard');
            }
        }
        return redirect()->route('login');
    }

    public function LandingPageProduct()
    {
        $products = [];
        $productsImagesPath = [asset('images/welcome1.jpg'), asset('images/welcome2.jpg'), asset('images/welcome3.jpg')];
        $productsName = ['Kyliana Joe', 'Indicent Shy', 'Xenon Kye'];
        $productsPrice = ['100000', '200000', '300000'];

        for ($i = 0; $i < 3; $i++) {
            $products[$i] = [
                'image_path' => $productsImagesPath[$i],
                'name' => $productsName[$i],
                'price' => $productsPrice[$i],
            ];
        }
        // foreach ($products as $product) {
        //     dd($product['image_path']);
        // }
        return view('Landing', compact('products'));
    }

    public function showAllProducts()
    {
        $products = Product::all();
        return view('user.UserShowAllProducts', compact('products'));
    }

    # scanning pet and identifying the species and category
    public function scan_pet(Request $request)
    {
        $image = $request->file('image');
        $petResult = $this->detect($image);
        // dd($petResult);
        if ($petResult instanceof \Illuminate\Http\RedirectResponse) {
            return redirect()->route('dashboard')->with('error', 'Image not recognized! Please try again.');
        }
        // dd($petResult);
        $res1 = $petResult[0];
        $imagePath = $petResult[1];

        $class = $res1['predictions'][0]['class'];
        $parsed = explode('-', $class);
        $category = $parsed[0];
        $species = str_replace("_", " ", $parsed[1]);

        // fetch products based on the category and species where product status is available also the image path
        $products = Product::where('category', $category)
            ->where('species', $species)
            ->where('product_status', 'available')
            ->whereNotNull('image_path')
            ->get();

        $data = [
            'category' => $category,
            'species' => $species,
            'products' => $products,
        ];

        // dd($data);

        return view('user.UserScanPet', compact('data'));
    }

    public function landing_page_for_scan_pet()
    {
        return view('user.UserScanPet');
    }


    public function userProfile()
    {
        $user = Auth::user();
        if ($user->role == 'seller') {
            $query = Product::query();
            $query->where('seller_id', $user->id);
            $query->where('product_status', 'sold');
            $soldProducts = $query->get();

            return view('Profile', compact('user', 'soldProducts'));
        }
        
        dd($user);
        $pets = $user->pets;
        // dd($pets);
        $ownedPets = []; 
        foreach ($pets as $pet) {
            $ownedPets[] = $pet->product;
        }
        // dd($ownedPets);
        return view('Profile', compact('user', 'ownedPets'));
    }
}
