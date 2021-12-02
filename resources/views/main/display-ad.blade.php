@php
use App\Models\Product;
use App\Models\Utils;

$slug = request()->segment(1);
$pro = Product::where('slug', $slug)->firstOrFail();
if($pro){
if(!$pro->user){
dd("User not found.");
}
}
$images = $pro->get_images();
$attributes = json_decode($pro->attributes);
$url = $_SERVER['REQUEST_URI'];

$is_logged_in = false;

$user = Auth::user();
$message_link = "/login";
$message_text = "Start converstion";
if($user!=null){
if(isset($user->id)){
$is_logged_in = true;
if($pro->user_id == $user->id){
$message_link = "javascript:;";
$message_text = "This is your product.";
}else{
$chat_thred = Utils::get_chat_thread($user->id,$pro->user_id,$pro->id);
$message_link = "/messages/".$chat_thred;
}
}
}

@endphp
@extends('layouts.layout')

@section('title', $pro->name)

@section('head')
<link rel="stylesheet" href="{{ URL::asset('/assets/css/custom/ad-details.css') }}">
<link rel="stylesheet" href="{{ URL::asset('/assets/css/vendor/simple-lightbox.css') }}">
@endsection

@section('content')


<section class="inner-section ad-details-part pt-3 mb-0 pb-0 ">
    <div class="container">

 
        <div class="row">
            <div class="col-lg-8">
                <div class="common-card pt-3">
                    <ol class="breadcrumb ad-details-breadcrumb  mb-0">
                        <li class="breadcrumb-item"><a href="#">{{ $pro->category->name }}</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ $pro->category->name }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $pro->name }}</li>
                    </ol>
                    <h1 class="ad-details-title mb-2">{{ $pro->name }}</h1>
                    <div class="ad-details-slider-group ">
                        <div class="ad-details-slider slider-arrow ">
                            @foreach ($images as $img)
 
                                <a rel="rel3" href="{{ str_replace("thumb_","",$img->thumbnail) }}">
                                <img src="{{$img->thumbnail}}" alt="details">
                                </a>
                              @endforeach
                        </div>
                        <div class="cross-vertical-badge ad-details-badge"><i
                                class="fas fa-clipboard-check"></i><span>recommend</span></div>
                    </div>
                    <div class="ad-thumb-slider">
                        @foreach ($images as $img)
                        <div><img src="{{$img->thumbnail}}" alt="details"></div>
                        @endforeach
                    </div>
                </div> 
                    {{-- <div class="ad-details-action"><button type="button" class="wish"><i
                                class="fas fa-heart"></i>bookmark</button><button type="button"><i
                                class="fas fa-exclamation-triangle"></i>report</button><button type="button"
                            data-toggle="modal" data-target="#ad-share"><i class="fas fa-share-alt"></i>share </button>
                    </div>  
                </div> --}}
                <div class="common-card">
                    <div class="card-header">
                        <h5 class="card-title">Specification</h5>
                    </div>
                    <ul class="ad-details-specific">
                        <li>
                            <h6>Price:</h6>
                            <p>${{ number_format($pro->price) }}
                                @if ($pro->fixed_price)
                                <small><i>Fixed price</i></small>
                                @else
                                <small><i>Negotiable</i></small>
                                @endif
                            </p>
                        </li>
                        <li>
                            <h6>published:</h6>
                            <p>{{ $pro->created_at }}</p>
                        </li>
                        <li>
                            <h6>location:</h6>
                            <p>{{ $pro->country->name }}, {{ $pro->city->name }}</p>
                        </li>
                        @foreach ($attributes as $item)
                        @if ($item->type == "text" || $item->type == "textarea")
                        <li>
                            <h6>{{ $item->name }}:</h6>
                            <p>{{ $item->value }} {{$item->units}}</p>
                        </li>
                        @elseif($item->type == "number")
                        <li>
                            <h6>{{ $item->name }}: </h6>
                            <p>{{ number_format($item->value,0) }} {{$item->units}}</p>
                        </li>
                        @elseif($item->type == "select")
                        <li>
                            <h6>{{ $item->name }}: </h6>
                            <p>{{ $item->value }} {{$item->units}}</p>
                        </li>
                        @elseif($item->type == "radio")
                        <li>
                            <h6>{{ $item->name }}: </h6>
                            <p>{{ $item->value }} {{$item->units}}</p>
                        </li>
                        @elseif($item->type == "checkbox")
                        <li>
                            <h6 class="mr-3">{{ $item->name }}: </h6>
                            <p> @php
                                if($item->value){
                                $i = 0;
                                foreach ($item->value as $key => $value) {
                                $i++;
                                echo $value;
                                if($i != count($item->value)){
                                echo ", ";
                                }else {
                                echo $value.".";
                                }
                                }
                                }
                                @endphp {{$item->units}}</p>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
                <div class="common-card">
                    <div class="card-header">
                        <h5 class="card-title">description</h5>
                    </div>
                    <p class="ad-details-desc">{{ $pro->category->description }}</p>
                </div>
                {{-- <div class="common-card" id="review">
                    <div class="card-header">
                        <h5 class="card-title">reviews (@php
                            echo count($pro->reviews)
                            @endphp)</h5>
                    </div>
                    <div class="ad-details-review">
                        <ul class="review-list">

                            @foreach ($pro->reviews as $item)
                            <li class="review-item">
                                <div class="review-user">
                                    <div class="review-head">
                                        <div class="review-profile">
                                            <a href="#" class="review-avatar"><img
                                                    src="<?= URL::asset('assets/') ?>/images/avatar/03.jpg"
                                                    alt="review"></a>
                                            <div class="review-meta">
                                                <h6><a href="#">{{$item->user->email}}
                                                        -</a><span>{{$item->created_at->diffForHumans()}}</span></h6>
                                                <ul>
                                                    @php
                                                    for ($i=0; $i < $item->rating; $i++) {
                                                        echo '<li><i class="fas fa-star active"></i></li>';
                                                        }
                                                        for ($i=0; $i < (5-$item->rating); $i++) {
                                                            echo '<li><i class="fas fa-star "></i></li>';
                                                            }
                                                            @endphp

                                                            <li>
                                                                <h5> - {{$item->reason}}</h5>
                                                            </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="review-desc">{{$item->comment}}.</p>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                        @guest
                        <div class="row justify-content-center">
                            <div class="col-12 ">
                                <div class="card dash-header-card pt-0">
                                    <div class="card-body text-center">


                                        <h2 class="h3 text-center mt-0">Login Required</h2>

                                        <P class="text-left mb-2">You need to be loggedin in order to submit your review
                                            about this product.</P>
                                        <a href="register" class="btn btn-inline mt-4 mb-2 post-btn"><i
                                                class="fas fa-plus-circle"></i><span>CREATE ACCOUNT</span></a>
                                        <a href="login" class="btn btn-inline mt-4 mb-2 post-btn"><i
                                                class="fas fa-plus-circle"></i><span>LOGIN</span></a>


                                    </div>
                                </div>
                            </div>
                        </div>

                        @endguest
                        @auth
                        <form method="post" action="{{$url}}" class="review-form">
                            @csrf
                            <input type="number" name="product_id" hidden value="{{$pro->id}}">

                            <div class="review-form-grid">
                                <div class="form-group"><input type="text" class="form-control" placeholder="Name">
                                </div>
                                <div class="form-group"><input type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group"><select name="reason" required
                                        class="form-control custom-select">
                                        <option></option>
                                        <option value="Qoute">Qoute</option>
                                        <option value="Product quality">product quality</option>
                                        <option value="Delivery system">delivery system</option>
                                        <option value="Payment issue">Payment issue</option>
                                    </select></div>
                            </div>
                            <div class="star-rating">
                                <input value="5" type="radio" name="rating" id="star-1"><label for="star-1"></label>
                                <input value="4" type="radio" name="rating" id="star-2"><label for="star-2"></label>
                                <input value="3" type="radio" name="rating" id="star-3"><label for="star-3"></label>
                                <input value="2" type="radio" name="rating" id="star-4"><label for="star-4"></label>
                                <input value="1" type="radio" required name="rating" id="star-5"><label
                                    for="star-5"></label>
                            </div>
                            <div class="form-group"><textarea required name="comment" class="form-control"
                                    placeholder="Describe"></textarea>
                            </div><button type="submit" class="btn btn-inline review-submit"><i
                                    class="fas fa-tint"></i><span>drop your
                                    review</span></button>
                        </form>

                        @endauth
                    </div>
                </div> --}}
            </div>

            <div class="modal fade" id="number">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Contact this Number</h4><button class="fas fa-times" data-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <h3 class="modal-number">(+880) 183 - 8288 - 389</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="common-card price">
                    <h3>${{ number_format($pro->price,0) }}<span>Price
                            (@if ($pro->fixed_price)
                            Fixed price
                            @else
                            Negotiable
                            @endif)
                        </span></h3><i class="fas fa-tag"></i>
                </div>
                <a href="{{ $message_link }}" class="common-card number">
                    <h3>Send Message<span class="text-left">{{$message_text}}</span></h3><i class="fas fa-envelope"></i>
                </a>

                <button type="button" class="common-card number" data-toggle="modal" data-target="#number">
                    <h3>(+880)<span>Click to show</span></h3><i class="fas fa-phone"></i>
                </button>

                <div class="common-card">
                    <div class="card-header">
                        <h5 class="card-title">About Vendor</h5>
                    </div>
                    <div class="ad-details-author">
                        @php
                            $profile_pic = "assets/images/avatar/03.jpg";
                            if($pro->user!= null){
                                if($pro->user->profile != null){
                                    if($pro->user->profile->profile_photo != null){
                                        $imgs = json_decode($pro->user->profile->profile_photo);
                                        if($imgs->src){
                                        $profile_pic = Utils::get_file_url($imgs->src);
                                    }
                                }
                            }
                            }

                        @endphp
                        <a href="/{{$pro->user->profile->username}}" class="author-img active"><img
                            width="100" height="100"    
                            src="{{ $profile_pic }}" alt="avatar"></a>
                        <div class="author-meta">
                            <h4><a href="/{{$pro->user->profile->username}}">
                                    {{$pro->user->profile->first_name}}
                                    {{$pro->user->profile->last_name}}
                                </a></h4>
                            <h5>joined: {{$pro->user->created_at->diffForHumans()}}</h5> 
                        </div> 
                    </div>
                </div> 
                <div class="common-card">
                    <div class="card-header">
                        <h5 class="card-title">safety tips</h5>
                    </div>
                    <div class="ad-details-safety">
                        <p>Check the item before you buy</p>
                        <p>Pay only after collecting item</p>
                        <p>Beware of unrealistic offers</p>
                        <p>Meet seller at a safe location</p>
                        <p>Do not make an abrupt decision</p>
                        <p>Be honest with the ad you post</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@php
$related_products = Product::where('category_id', $pro->category_id)->get();
@endphp
<section class="inner-section related-part mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-center-heading">
                    <h2>Related This <span>Ads</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="related-slider slider-arrow">
                    @foreach ($related_products as $item)
                    <x-product1 :item="$item" />
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="center-50"><a href="/" class="btn btn-inline"><i class="fas fa-eye"></i><span>view all
                            related</span></a></div>
            </div>
        </div>
    </div>

</section>

<script>
    window.addEventListener('DOMContentLoaded', (event) => {
    let $gallery = new SimpleLightbox('.slider-arrow a', {});
});
</script>


@endsection

@section('foot')
<script src="{{ URL::asset('/assets/js/vendor/slick.min.js') }} "></script>
<script src="{{ URL::asset('/assets/js/custom/slick.js') }} "></script>
<script src="{{ URL::asset('/assets/js/vendor/simple-lightbox.js') }} "></script>

@endsection