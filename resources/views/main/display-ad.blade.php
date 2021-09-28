@php
use App\Models\Product;

$slug = request()->segment(1);
$pro = Product::where('slug', $slug)->firstOrFail();
$images = $pro->get_images();

@endphp
@extends('layouts.layout')

@section('title', $pro->name)

@section('head')
<link rel="stylesheet" href="{{ URL::asset('/assets/css/custom/ad-details.css') }}">
@endsection

@section('content')


<section class="inner-section ad-details-part pt-3 pt-md-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="common-card">
                    <ol class="breadcrumb ad-details-breadcrumb">
                        <li class="breadcrumb-item"><a href="#">{{ $pro->category->name }}</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ $pro->category->name }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $pro->name }}</li>
                    </ol>
                    <h5 class="ad-details-address">{{ $pro->country->name }}, {{ $pro->city->name }}</h5>
                    <h3 class="ad-details-title">{{ $pro->name }}</h3>
                    <div class="ad-details-meta"><a class="view"><i
                                class="fas fa-eye"></i><span><strong>(134)</strong>preview</span></a><a class="click"><i
                                class="fas fa-mouse"></i><span><strong>(76)</strong>click</span></a><a href="#review"
                            class="rating"><i class="fas fa-star"></i><span><strong>(29)</strong>review</span></a></div>
                    <div class="ad-details-slider-group">
                        <div class="ad-details-slider slider-arrow">
                            @foreach ($images as $img)
                            <div><img src="{{$img->src}}" alt="details"></div>
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
                    <div class="ad-details-action"><button type="button" class="wish"><i
                                class="fas fa-heart"></i>bookmark</button><button type="button"><i
                                class="fas fa-exclamation-triangle"></i>report</button><button type="button"
                            data-toggle="modal" data-target="#ad-share"><i class="fas fa-share-alt"></i>share </button>
                    </div>
                </div>
                <div class="common-card">
                    <div class="card-header">
                        <h5 class="card-title">Specification</h5>
                    </div>
                    <ul class="ad-details-specific">
                        <li>
                            <h6>Starting price:</h6>
                            <p>${{ $pro->price }}</p>
                        </li>
                        <li>
                            <h6>published:</h6>
                            <p>{{ $pro->created_at }}</p>
                        </li>
                        <li>
                            <h6>location:</h6>
                            <p>{{ $pro->country->name }}, {{ $pro->city->name }}</p>
                        </li>
                        <li>
                            <h6>category:</h6>
                            <p>{{ $pro->category->name }}</p>
                        </li>
                    </ul>
                </div>
                <div class="common-card">
                    <div class="card-header">
                        <h5 class="card-title">description</h5>
                    </div>
                    <p class="ad-details-desc">{{ $pro->category->description }}</p>
                </div>
                <div class="common-card" id="review">
                    <div class="card-header">
                        <h5 class="card-title">reviews (2)</h5>
                    </div>
                    <div class="ad-details-review">
                        <ul class="review-list">
                            <li class="review-item">
                                <div class="review-user">
                                    <div class="review-head">
                                        <div class="review-profile">
                                            <a href="#" class="review-avatar"><img
                                                    src="<?= URL::asset('assets/') ?>/images/avatar/03.jpg"
                                                    alt="review"></a>
                                            <div class="review-meta">
                                                <h6><a href="#">miron mahmud -</a><span>June 02, 2020</span></h6>
                                                <ul>
                                                    <li><i class="fas fa-star active"></i></li>
                                                    <li><i class="fas fa-star active"></i></li>
                                                    <li><i class="fas fa-star active"></i></li>
                                                    <li><i class="fas fa-star active"></i></li>
                                                    <li><i class="fas fa-star active"></i></li>
                                                    <li>
                                                        <h5>- for delivery system</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="review-desc">Lorem ipsum, dolor sit amet consectetur adipisicing elit
                                        Non quibusdam harum ipsum dolor cumque quas magni voluptatibus cupiditate minima
                                        quis.</p>
                                </div>
                            </li>
                            <li class="review-item">
                                <div class="review-user">
                                    <div class="review-head">
                                        <div class="review-profile">
                                            <a href="#" class="review-avatar"><img
                                                    src="<?= URL::asset('assets/') ?>/images/avatar/02.jpg"
                                                    alt="review"></a>
                                            <div class="review-meta">
                                                <h6><a href="#">labonno khan -</a><span>June 02, 2020</span></h6>
                                                <ul>
                                                    <li><i class="fas fa-star active"></i></li>
                                                    <li><i class="fas fa-star active"></i></li>
                                                    <li><i class="fas fa-star active"></i></li>
                                                    <li><i class="fas fa-star active"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li>
                                                        <h5>- for product quality</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="review-desc">Lorem ipsum, dolor sit amet consectetur adipisicing elit
                                        Non quibusdam harum ipsum dolor cumque quas magni voluptatibus cupiditate minima
                                        quis.</p>
                                </div>
                                <div class="review-author">
                                    <div class="review-head">
                                        <div class="review-profile">
                                            <a href="#" class="review-avatar"><img
                                                    src="<?= URL::asset('assets/') ?>/images/avatar/04.jpg"
                                                    alt="review"></a>
                                            <div class="review-meta">
                                                <h6><a href="#">Miron Mahmud</a></h6>
                                                <h6>Author - <span>June 02, 2020</span></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="review-desc">Lorem ipsum, dolor sit amet consectetur adipisicing elit
                                        Non quibusdam harum ipsum dolor cumque quas magni voluptatibus cupiditate
                                        minima.</p>
                                </div>
                            </li>
                        </ul>
                        <form class="review-form">
                            <div class="star-rating"><input type="radio" name="rating" id="star-1"><label
                                    for="star-1"></label><input type="radio" name="rating" id="star-2"><label
                                    for="star-2"></label><input type="radio" name="rating" id="star-3"><label
                                    for="star-3"></label>
                                <input type="radio" name="rating" id="star-4"><label for="star-4"></label><input
                                    type="radio" name="rating" id="star-5"><label for="star-5"></label>
                            </div>
                            <div class="review-form-grid">
                                <div class="form-group"><input type="text" class="form-control" placeholder="Name">
                                </div>
                                <div class="form-group"><input type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group"><select class="form-control custom-select">
                                        <option selected>Qoute</option>
                                        <option value="1">delivery system</option>
                                        <option value="2">product quality</option>
                                        <option value="3">payment issue</option>
                                    </select></div>
                            </div>
                            <div class="form-group"><textarea class="form-control" placeholder="Describe"></textarea>
                            </div><button type="submit" class="btn btn-inline review-submit"><i
                                    class="fas fa-tint"></i><span>drop your
                                    review</span></button>
                        </form>
                    </div>
                </div>
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
                    <h3>${{ $pro->price }}<span>starting price</span></h3><i class="fas fa-tag"></i>
                </div>
                <a href="{{route('messages')}}" class="common-card number">
                    <h3>Send Message<span class="text-left">Start converstion</span></h3><i class="fas fa-envelope"></i>
                </a>

                <button type="button" class="common-card number" data-toggle="modal" data-target="#number">
                    <h3>(+880)<span>Click to show</span></h3><i class="fas fa-phone"></i>
                </button>

                <div class="common-card">
                    <div class="card-header">
                        <h5 class="card-title">author info</h5>
                    </div>
                    <div class="ad-details-author">
                        <a href="#" class="author-img active"><img
                                src="<?= URL::asset('assets/') ?>/images/avatar/01.jpg" alt="avatar"></a>
                        <div class="author-meta">
                            <h4><a href="#">Jackon Honson</a></h4>
                            <h5>joined: february 02, 2021</h5>
                            <p>Corporis dolore libero temporibus minus tempora quia voluptas nesciunt.</p>
                        </div>
                        <div class="author-widget">
                            <a href="profile.html" title="Profile" class="fas fa-eye"></a>
                            <a href="message.html" title="Message" class="fas fa-envelope"></a><button type="button"
                                title="Follow" class="follow fas fa-heart"></button><button type="button" title="Number"
                                class="fas fa-phone" data-toggle="modal" data-target="#number"></button><button
                                type="button" title="Share" class="fas fa-share-alt" data-toggle="modal"
                                data-target="#profile-share"></button>
                        </div>
                        <ul class="author-list">
                            <li>
                                <h6>total ads</h6>
                                <p>134</p>
                            </li>
                            <li>
                                <h6>total ratings</h6>
                                <p>78</p>
                            </li>
                            <li>
                                <h6>total follower</h6>
                                <p>56</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="common-card">
                    <div class="card-header">
                        <h5 class="card-title">opening hour</h5>
                    </div>
                    <ul class="ad-details-opening">
                        <li>
                            <h6>Saturday</h6>
                            <p>09:00am - 05:00pm</p>
                        </li>
                        <li>
                            <h6>Sunday</h6>
                            <p>09:00am - 05:00pm</p>
                        </li>
                        <li>
                            <h6>monday</h6>
                            <p>09:00am - 05:00pm</p>
                        </li>
                        <li>
                            <h6>tuesday</h6>
                            <p>09:00am - 05:00pm</p>
                        </li>
                        <li>
                            <h6>wednesday</h6>
                            <p>09:00am - 05:00pm</p>
                        </li>
                        <li>
                            <h6>thursday</h6>
                            <p>09:00am - 05:00pm</p>
                        </li>
                        <li>
                            <h6>friday</h6>
                            <p>closed</p>
                        </li>
                    </ul>
                </div>
                <div class="common-card">
                    <div class="card-header">
                        <h5 class="card-title">area map</h5>
                    </div><iframe class="ad-details-map"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3654.3406974350205!2d90.48469931445422!3d23.663771197998262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b0d5983f048d%3A0x754f30c82bcad3cd!2sJalkuri%20Bus%20Stop!5e0!3m2!1sen!2sbd!4v1610539261654!5m2!1sen!2sbd"></iframe>
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
                <div class="common-card">
                    <div class="card-header">
                        <h5 class="card-title">featured ads</h5>
                    </div>
                    <div class="ad-details-feature slider-arrow">
                        <div class="feature-card">
                            <a href="#" class="feature-img"><img
                                    src="<?= URL::asset('assets/') ?>/images/product/10.jpg" alt="feature"></a>
                            <div class="cross-inline-badge feature-badge"><span>featured</span><i
                                    class="fas fa-book-open"></i></div><button type="button" class="feature-wish"><i
                                    class="fas fa-heart"></i></button>
                            <div class="feature-content">
                                <ol class="breadcrumb feature-category">
                                    <li><span class="flat-badge rent">rent</span></li>
                                    <li class="breadcrumb-item"><a href="#">automobile</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">private car</li>
                                </ol>
                                <h3 class="feature-title"><a href="ad-details-left.html">Unde eveniet ducimus nostrum
                                        maiores soluta temporibus ipsum dolor sit amet.</a></h3>
                                <div class="feature-meta"><span
                                        class="feature-price">$1200<small>/Monthly</small></span><span
                                        class="feature-time"><i class="fas fa-clock"></i>56 minute ago</span>
                                </div>
                            </div>
                        </div>
                        <div class="feature-card">
                            <a href="#" class="feature-img"><img
                                    src="<?= URL::asset('assets/') ?>/images/product/01.jpg" alt="feature"></a>
                            <div class="cross-inline-badge feature-badge"><span>featured</span><i
                                    class="fas fa-book-open"></i></div><button type="button" class="feature-wish"><i
                                    class="fas fa-heart"></i></button>
                            <div class="feature-content">
                                <ol class="breadcrumb feature-category">
                                    <li><span class="flat-badge booking">booking</span></li>
                                    <li class="breadcrumb-item"><a href="#">Property</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">House</li>
                                </ol>
                                <h3 class="feature-title"><a href="ad-details-left.html">Unde eveniet ducimus nostrum
                                        maiores soluta temporibus ipsum dolor sit amet.</a></h3>
                                <div class="feature-meta"><span
                                        class="feature-price">$800<small>/perday</small></span><span
                                        class="feature-time"><i class="fas fa-clock"></i>56 minute ago</span>
                                </div>
                            </div>
                        </div>
                        <div class="feature-card">
                            <a href="#" class="feature-img"><img
                                    src="<?= URL::asset('assets/') ?>/images/product/08.jpg" alt="feature"></a>
                            <div class="cross-inline-badge feature-badge"><span>featured</span><i
                                    class="fas fa-book-open"></i></div><button type="button" class="feature-wish"><i
                                    class="fas fa-heart"></i></button>
                            <div class="feature-content">
                                <ol class="breadcrumb feature-category">
                                    <li><span class="flat-badge sale">sale</span></li>
                                    <li class="breadcrumb-item"><a href="#">gadget</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">iphone</li>
                                </ol>
                                <h3 class="feature-title"><a href="ad-details-left.html">Unde eveniet ducimus nostrum
                                        maiores soluta temporibus ipsum dolor sit amet.</a></h3>
                                <div class="feature-meta"><span
                                        class="feature-price">$1150<small>/Negotiable</small></span><span
                                        class="feature-time"><i class="fas fa-clock"></i>56 minute ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="inner-section related-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-center-heading">
                    <h2>Related This <span>Ads</span></h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero
                        voluptatum repudiandae veniam maxime tenetur.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="related-slider slider-arrow">
                    <div class="product-card">
                        <div class="product-media">
                            <div class="product-img"><img src="<?= URL::asset('assets/') ?>/images/product/01.jpg"
                                    alt="product"></div>
                            <div class="product-type"><span class="flat-badge sale">sale</span></div>
                            <ul class="product-action">
                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>
                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>
                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <ol class="breadcrumb product-category">
                                <li><i class="fas fa-tags"></i></li>
                                <li class="breadcrumb-item"><a href="#">Luxury</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Duplex House</li>
                            </ol>
                            <h5 class="product-title"><a href="#">Lorem ipsum dolor sit amet consect adipisicing
                                    elit</a></h5>
                            <div class="product-meta"><span><i class="fas fa-map-marker-alt"></i>Uttara,
                                    Dhaka</span><span><i class="fas fa-clock"></i>30 min ago</span></div>
                            <div class="product-info">
                                <h5 class="product-price">$1500<span>/negotiable</span></h5>
                                <div class="product-btn">
                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a><button
                                        type="button" title="Wishlist" class="far fa-heart"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-card">
                        <div class="product-media">
                            <div class="product-img"><img src="<?= URL::asset('assets/') ?>/images/product/03.jpg"
                                    alt="product"></div>
                            <div class="product-type"><span class="flat-badge sale">sale</span></div>
                            <ul class="product-action">
                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>
                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>
                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <ol class="breadcrumb product-category">
                                <li><i class="fas fa-tags"></i></li>
                                <li class="breadcrumb-item"><a href="#">stationary</a></li>
                                <li class="breadcrumb-item active" aria-current="page">books</li>
                            </ol>
                            <h5 class="product-title"><a href="#">Lorem ipsum dolor sit amet consect adipisicing
                                    elit</a></h5>
                            <div class="product-meta"><span><i class="fas fa-map-marker-alt"></i>Uttara,
                                    Dhaka</span><span><i class="fas fa-clock"></i>30 min ago</span></div>
                            <div class="product-info">
                                <h5 class="product-price">$470<span>/fixed</span></h5>
                                <div class="product-btn">
                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a><button
                                        type="button" title="Wishlist" class="far fa-heart"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-card">
                        <div class="product-media">
                            <div class="product-img"><img src="<?= URL::asset('assets/') ?>/images/product/10.jpg"
                                    alt="product"></div>
                            <div class="product-type"><span class="flat-badge sale">sale</span></div>
                            <ul class="product-action">
                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>
                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>
                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <ol class="breadcrumb product-category">
                                <li><i class="fas fa-tags"></i></li>
                                <li class="breadcrumb-item"><a href="#">automobile</a></li>
                                <li class="breadcrumb-item active" aria-current="page">private car</li>
                            </ol>
                            <h5 class="product-title"><a href="#">Lorem ipsum dolor sit amet consect adipisicing
                                    elit</a></h5>
                            <div class="product-meta"><span><i class="fas fa-map-marker-alt"></i>Uttara,
                                    Dhaka</span><span><i class="fas fa-clock"></i>30 min ago</span></div>
                            <div class="product-info">
                                <h5 class="product-price">$3300<span>/fixed</span></h5>
                                <div class="product-btn">
                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a><button
                                        type="button" title="Wishlist" class="far fa-heart"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-card">
                        <div class="product-media">
                            <div class="product-img"><img src="<?= URL::asset('assets/') ?>/images/product/09.jpg"
                                    alt="product"></div>
                            <div class="product-type"><span class="flat-badge sale">sale</span></div>
                            <ul class="product-action">
                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>
                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>
                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <ol class="breadcrumb product-category">
                                <li><i class="fas fa-tags"></i></li>
                                <li class="breadcrumb-item"><a href="#">animals</a></li>
                                <li class="breadcrumb-item active" aria-current="page">cat</li>
                            </ol>
                            <h5 class="product-title"><a href="#">Lorem ipsum dolor sit amet consect adipisicing
                                    elit</a></h5>
                            <div class="product-meta"><span><i class="fas fa-map-marker-alt"></i>Uttara,
                                    Dhaka</span><span><i class="fas fa-clock"></i>30 min ago</span></div>
                            <div class="product-info">
                                <h5 class="product-price">$900<span>/Negotiable</span></h5>
                                <div class="product-btn">
                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a><button
                                        type="button" title="Wishlist" class="far fa-heart"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-card">
                        <div class="product-media">
                            <div class="product-img"><img src="<?= URL::asset('assets/') ?>/images/product/02.jpg"
                                    alt="product"></div>
                            <div class="product-type"><span class="flat-badge sale">sale</span></div>
                            <ul class="product-action">
                                <li class="view"><i class="fas fa-eye"></i><span>264</span></li>
                                <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>
                                <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <ol class="breadcrumb product-category">
                                <li><i class="fas fa-tags"></i></li>
                                <li class="breadcrumb-item"><a href="#">fashion</a></li>
                                <li class="breadcrumb-item active" aria-current="page">shoes</li>
                            </ol>
                            <h5 class="product-title"><a href="#">Lorem ipsum dolor sit amet consect adipisicing
                                    elit</a></h5>
                            <div class="product-meta"><span><i class="fas fa-map-marker-alt"></i>Uttara,
                                    Dhaka</span><span><i class="fas fa-clock"></i>30 min ago</span></div>
                            <div class="product-info">
                                <h5 class="product-price">$384<span>/fixed</span></h5>
                                <div class="product-btn">
                                    <a href="compare.html" title="Compare" class="fas fa-compress"></a><button
                                        type="button" title="Wishlist" class="far fa-heart"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="center-50"><a href="ad-list-column3.html" class="btn btn-inline"><i
                            class="fas fa-eye"></i><span>view all related</span></a></div>
            </div>
        </div>
    </div>
</section>




@endsection