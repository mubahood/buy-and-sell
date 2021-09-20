<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Dashboard extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function postAd()
    {
        return view('dashboard.post-ad');
    }
    public function postAdCategpryPick(Request $request)
    {
        if ($request->has("name")) {

            $validated = $request->validate([
                'name' => 'required|min:2',
                'price' => 'required'
            ]);

            $images = Utils::upload_images($_FILES['images']);
            $pro['images'] = "[]";
            if(!empty($images)){
                $pro['images'] = json_encode($images);
            }
        
            $pro['name'] = $request->input("name");
            $pro['price'] = $request->input("price");
            $pro['status'] = 0;
            $pro['attributes'] = "[]";
            $pro['description'] = $request->input("description");
            $pro['category_id'] = $request->input("category_id");
            $pro['user_id'] = Auth::id();
            if (!$pro['user_id']) {
                $pro['user_id'] = 1;
            }
            $pro['slug'] = Str::slug($pro['name'], '-');
            $product = new Product($pro);
            if($product->save()){

            }else{

            }
            return redirect()->intended('dashboard');

        }

        return view('dashboard.post-ad-category-pick');
    }
}
