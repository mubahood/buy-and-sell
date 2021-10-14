<?php

namespace App\Models;

use Hamcrest\Arrays\IsArray;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Zebra_Image;

class Utils
{

    public static function get_file_url($link)
    {
        $link = str_replace("public/","",$link);
        $link = str_replace("public","",$link);
        $link = "storage/".$link;        
        return $link;
    }

    public static function make_slug($str)
    {
        $slug =  strtolower(Str::slug($str, "-"));
 
        if (
            (!empty(Product::where("slug", $slug)->First())) ||
            (!empty(Profile::where("username", $slug)->First()))
        ) {
            $slug .= rand(100, 1000);
        }

        return $slug;
    }
    public static function upload_images($files)
    {
        if ($files == null || empty($files)) {
            return [];
        }
        if (!isset($files['name'])) {
            return [];
        }
        if (!is_array($files['name'])) {
            return [];
        }

        $uploaded_images = array();
        if (isset($files['name'])) {
            for ($i = 0; $i < count($files['name']); $i++) {
                if (
                    isset($files['name'][$i]) &&
                    isset($files['type'][$i]) &&
                    isset($files['tmp_name'][$i]) &&
                    isset($files['error'][$i]) &&
                    isset($files['size'][$i])
                ) {
                    $img['name'] = $files['name'][$i];
                    $img['type'] = $files['type'][$i];
                    $img['tmp_name'] = $files['tmp_name'][$i];
                    $img['error'] = $files['error'][$i];
                    $img['size'] = $files['size'][$i];

 
                    $path = Storage::putFile('/', $img['tmp_name']); 
                    //echo '<img src="http://127.0.0.1:8000/storage/'.$path.'" alt="">';
                    //dd("");
                

                    $path_not_optimized =  Storage::url("storage/".$path);
                    $path_optimized = "storage/thumb_".$path_not_optimized;
                    $thumbnail = Utils::create_thumbail(
                        array(
                            "source" => $path_not_optimized,
                            "target" => $path_optimized,
                        )
                    );

                    if (strlen($thumbnail) > 3) {
                        $thumbnail = str_replace("./storage/", "public/", $thumbnail);
                    } else {
                        $thumbnail = $path;
                    }


                    $ready_image['src'] = $path;
                    $ready_image['thumbnail'] = $thumbnail;

                    $ready_image['user_id'] = Auth::id();
                    if (!$ready_image['user_id']) {
                        $ready_image['user_id'] = 1;
                    }

                    $_ready_image = new Image($ready_image);
                    $_ready_image->save();
                    $uploaded_images[] = $ready_image;
                }
            }
        }

        return $uploaded_images;
    }

    public static function create_thumbail($params = array())
    {
        if (
            !isset($params['source']) ||
            !isset($params['target'])
        ) {
            return [];
        }

        $image = new Zebra_Image();

        $image->auto_handle_exif_orientation = false;
        $image->source_path = $params['source'];
        $image->target_path = $params['target'];

        $image->jpeg_quality = 75;
        if (isset($params['quality'])) {
            $image->jpeg_quality = $params['quality'];
        }

        $image->preserve_aspect_ratio = true;
        $image->enlarge_smaller_images = true;
        $image->preserve_time = true;
        $image->handle_exif_orientation_tag = true;

        $width = 380;
        $heigt = 220;
        if (isset($params['width'])) {
            $width = $params['width'];
        }
        if (isset($params['heigt'])) {
            $width = $params['heigt'];
        }

        if (!$image->resize($width, $heigt, ZEBRA_IMAGE_CROP_CENTER)) {
            return "";
        } else {
            return $image->target_path;
        }
    }
}
