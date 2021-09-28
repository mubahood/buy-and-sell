<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Profile;
use App\Models\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class Dashboard extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    } 

    public function profile()
    {
        return view('dashboard.profile');
    }

    public function membership()
    {
        return view('dashboard.membership');
    }

    public function messages()
    {
        return view('dashboard.messages');
    }

    public function profileEdit(Request $request)
    {
        if ($request->has("user_id")) {
            $user_id = $request->input("user_id");
            $profile =  Profile::where('user_id', $user_id)->first();
            if (!$profile) {
                $pro = new Profile();
                $pro->user_id = $user_id;
                $pro->save();
                $profile =  Profile::where('user_id', $user_id)->first();
            }
            if (!$profile) {
                die("failed to find profile.");
            }
            $profile->first_name = $request->input("first_name");
            $profile->last_name = $request->input("last_name");
            $profile->company_name = $request->input("company_name");
            $profile->email = $request->input("email");
            $profile->phone_number = $request->input("phone_number");
            $profile->location = $request->input("location");
            $profile->about = $request->input("about");
            $profile->services = $request->input("services");
            $profile->longitude = $request->input("longitude");
            $profile->latitude = $request->input("latitude");
            $profile->opening_hours = $request->input("opening_hours");
            $profile->division = $request->input("division");
            $profile->facebook = $request->input("facebook");
            $profile->twitter = $request->input("twitter");
            $profile->whatsapp = $request->input("whatsapp");
            $profile->youtube = $request->input("youtube");
            $profile->instagram = $request->input("instagram");
            $profile->last_seen = time();

            if ($request->hasFile("profile_photo")) {
                $images = Utils::upload_images($_FILES['profile_photo']);
                if (isset($images[0])) {
                    $profile->profile_photo = json_encode($images[0]);
                }
            }

            if ($request->hasFile("cover_photo")) {
                $images = Utils::upload_images($_FILES['cover_photo']);
                if (isset($images[0])) {
                    $profile->cover_photo = json_encode($images[0]);
                }
            }

            return redirect()->intended('profile');
        }
        return view('dashboard.profile-edit');
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
            $pro['thumbnail'] = "";
            if (!empty($images)) {
                $pro['images'] = json_encode($images);
                $pro['thumbnail'] = json_encode($images[0]);
            }
            // $thumbnail = URL::asset('storage/'.str_replace("public/", "", json_decode($pro['thumbnail'])->thumbnail));
            // echo '<code>'.$thumbnail.'</code>';
            // echo '<img src="'.$thumbnail.'" alt="">';
            // die();

            $pro['name'] = $request->input("name");
            $pro['city_id'] = $request->input("city_id");
            $pro['country_id'] = $request->input("country_id");
            $pro['price'] = $request->input("price");
            $pro['status'] = "0";
            $pro['attributes'] = "[]";
            $pro['description'] = $request->input("description");
            $pro['category_id'] = $request->input("category_id");
            $pro['sub_category_id'] = $request->input("sub_category_id");
            $pro['user_id'] = Auth::id();
            if (!$pro['user_id']) {
                $pro['user_id'] = 1;
            }

            $pro['slug'] = Str::slug($pro['name'], '-');
            $product = new Product($pro);
            $product->name = str_replace("i will","",strtolower($product->name));
            $product->name = str_replace("will","",strtolower($product->name));
            $product->name = "I will ".$product->name;

            if ($product->save()) {
            } else {

            }

            return redirect()->intended('dashboard');
        }

        return view('dashboard.post-ad-category-pick');
    }
}
