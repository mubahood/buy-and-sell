<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Profile;
use App\Models\Utils;
use App\Models\Attribute;
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

    public function complete_profile_request()
    {
        return view('dashboard.complete-profile-request');
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

            $profile->save();
            $errors['success'] = "Account was updated successfully!";
            return redirect()->intended('profile')->withErrors($errors);
        }
        return view('dashboard.profile-edit');
    }

    public function postAd()
    {
        return view('dashboard.post-ad');
    }
    public function postAdCategpryPick(Request $request)
    {
        if ($request->has("price")) {
 
            $attr_nodes = [];
            $pro['attributes'] = "[]";
            foreach ($_POST as $key => $v) {
                if(substr($key,0,2) != "__"){
                    continue;
                }
                $attr_id = (int)(str_replace("__","",$key));
                if($attr_id<1){
                    continue;
                }
                $attr =  Attribute::where('id', $attr_id)->first();
                if(!$attr){
                    continue;
                }
 

                $attr_node['id'] = $attr->id;
                $attr_node['name'] = $attr->name;
                $attr_node['type'] = $attr->type;
                $attr_node['options'] = $attr->options;
                $attr_node['is_required'] = $attr->is_required;
                $attr_node['units'] = $attr->units;
                $attr_node['value'] = $v;
                $attr_nodes[] = $attr_node;

            }


            $validated = $request->validate([
                'name' => 'required|min:2',
                'price' => 'required'
            ]);

            $pro['attributes'] = json_encode($attr_nodes);
            $images = Utils::upload_images($_FILES['images']);
            $pro['images'] = "[]";
            $pro['thumbnail'] = "";
            if (!empty($images)) {
                $pro['images'] = json_encode($images);
                $pro['thumbnail'] = json_encode($images[0]);
            }
         
            $pro['name'] = $request->input("name");
            $pro['city_id'] = $request->input("city_id");
            $pro['country_id'] = $request->input("country_id");
            $pro['price'] = $request->input("price");
            $pro['status'] = "0";
            $pro['description'] = $request->input("description");
            $pro['category_id'] = $request->input("category_id");
            $pro['sub_category_id'] = $request->input("sub_category_id");
            $pro['user_id'] = Auth::id();
            if (!$pro['user_id']) {
                $pro['user_id'] = 1;
            }

            $pro['slug'] = Str::slug($pro['name'], '-');
            $product = new Product($pro);
            $product->name = str_replace("i will", "", strtolower($product->name));
            $product->name = str_replace("will", "", strtolower($product->name));
            $product->name = "I will " . $product->name;

            if ($product->save()) {
                $errors['success'] = "Product was uploaded successfully!";
            } else {
                die("failed to upload product.");
            }

            return redirect()->intended('dashboard')->withErrors($errors);
        }

        return view('dashboard.post-ad-category-pick');
    }
}
