@extends('layouts.layout')

@section('title', 'Page Title')

@section('sidebar')
@parent

<p>This is appended to the master sidebar.</p>
@endsection

@section('content')
<section class="banner-part" style="height: 25em">
    <div class="container ">
        <div class="banner-content">
            <h1>You can #Buy, #Rent, #Booking anything from here.</h1>
            <p>Buy and sell everything from used cars to mobile phones and computers, or search for property, jobs
                and more in the world.</p><a href="<?= URL::asset('/') ?>" class="btn btn-outline"><i
                    class="fas fa-eye"></i><span>Show all ads</span></a>
        </div>
    </div>
</section>

@php
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
$products = Product::all();
@endphp
<section class="section recomend-part pt-4">
    <div class="container">
        <div class="row mb-3 ml-md-0">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h4 class="h3">Most popular <span class="text-primary">Services</span></h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="recomend-slider slider-arrow">

                    @foreach ($products as $item)

                    <div class="product-card">
                        <div class="product-media">
                            <div class="product-img"><img src={{$item->get_thumbnail()}} alt="product">
                            </div>
                            <div class="cross-vertical-badge product-badge"><i
                                    class="fas fa-clipboard-check"></i><span>recommend</span></div>
                            <div class="product-type"><span class="flat-badge rent">new</span></div>
                            <ul class="product-action">

                                <li class="view"><i class="fas fa-map-marker-alt"></i><span>Uttara,
                                        Dhaka</span></li>
                                <li class="rating"><i class="fas fa-clock"></i><span>30 min ago</span>
                                </li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="row mt-2 mb-2 border-bottom ml-1 mr-1 p-0">
                                <div class="col-2 p-0">
                                    <a href="#"><img class="rounded-circle" style="width: 2.5rem"
                                            src="<?= URL::asset('assets/') ?>/images/avatar/03.jpg" alt="avatar"></a>
                                </div>
                                <div class="col-10 p-0 pt-1">
                                    <h5 class="h6 ml-2 mt-2">
                                        Muhindo
                                    </h5>
                                </div>
                            </div>

                            <h5 class="product-title"><a
                                    href="<?= URL::asset('/') ?>{{ $item->slug }}">{{ $item->get_name_short() }}</a>
                            </h5>
                            <div class="product-meta"><span><i class="fas fa-map-marker-alt"></i><a class="text-dark"
                                        href="#">{{ $item->country->name }}</a>,
                                    {{ $item->city->name }}</span><span><i
                                        class="fas fa-clock"></i>{{ $item->updated_at }}</span></div>
                            <div class="product-info">
                                <h5 class="product-price">${{ $item->price }}<span>/starting price</span></h5>
                                <div class="product-btn"><a href="<?= URL::asset('/') ?>" title="Compare"
                                        class="fas fa-compress"></a><button type="button" title="Wishlist"
                                        class="far fa-heart"></button></div>
                            </div>
                        </div>
                    </div>

                    @endforeach


                </div>
            </div>
        </div>

    </div>
</section>
<section class="section trend-part bg-light mt-5 pt-4 pb-5">
    <div class="container">
        <div class="row mb-3 ml-md-0">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h4 class="h3">Most popular <span class="text-primary">Services</span></h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-11 col-lg-8 col-xl-6">
                <div class="product-card standard">
                    <div class="product-media">
                        <div class="product-img"><img src="<?= URL::asset('assets/') ?>/images/product/01.jpg"
                                alt="product"></div>
                        <div class="cross-vertical-badge product-badge"><i class="fas fa-bolt"></i><span>trending</span>
                        </div>
                        <div class="product-type"><span class="flat-badge booking">booking</span></div>
                        <ul class="product-action">
                            <li class="view"><i class="fas fa-eye"></i><span>264</span></li>
                            <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>
                            <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li>
                        </ul>
                    </div>
                    <div class="product-content">
                        <ol class="breadcrumb product-category">
                            <li><i class="fas fa-tags"></i></li>
                            <li class="breadcrumb-item"><a href="#">property</a></li>
                            <li class="breadcrumb-item active" aria-current="page">house</li>
                        </ol>
                        <h5 class="product-title"><a href="<?= URL::asset('/') ?>">Lorem ipsum dolor sit amet
                                consect
                                adipisicing elit</a></h5>
                        <div class="product-meta"><span><i class="fas fa-map-marker-alt"></i>Uttara,
                                Dhaka</span><span><i class="fas fa-clock"></i>30 min ago</span></div>
                        <div class="product-info">
                            <h5 class="product-price">$974<span>/per day</span></h5>
                            <div class="product-btn"><a href="<?= URL::asset('/') ?>" title="Compare"
                                    class="fas fa-compress"></a><button type="button" title="Wishlist"
                                    class="far fa-heart"></button></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-11 col-lg-8 col-xl-6">
                <div class="product-card standard">
                    <div class="product-media">
                        <div class="product-img"><img src="<?= URL::asset('assets/') ?>/images/product/02.jpg"
                                alt="product"></div>
                        <div class="cross-vertical-badge product-badge"><i class="fas fa-bolt"></i><span>trending</span>
                        </div>
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
                        <h5 class="product-title"><a href="<?= URL::asset('/') ?>">Lorem ipsum dolor sit amet
                                consect
                                adipisicing elit</a></h5>
                        <div class="product-meta"><span><i class="fas fa-map-marker-alt"></i>Uttara,
                                Dhaka</span><span><i class="fas fa-clock"></i>30 min ago</span></div>
                        <div class="product-info">
                            <h5 class="product-price">$384<span>/fixed</span></h5>
                            <div class="product-btn"><a href="<?= URL::asset('/') ?>" title="Compare"
                                    class="fas fa-compress"></a><button type="button" title="Wishlist"
                                    class="far fa-heart"></button></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-11 col-lg-8 col-xl-6">
                <div class="product-card standard">
                    <div class="product-media">
                        <div class="product-img"><img src="<?= URL::asset('assets/') ?>/images/product/03.jpg"
                                alt="product"></div>
                        <div class="cross-vertical-badge product-badge"><i class="fas fa-bolt"></i><span>trending</span>
                        </div>
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
                            <li class="breadcrumb-item active" aria-current="page">book</li>
                        </ol>
                        <h5 class="product-title"><a href="<?= URL::asset('/') ?>">Lorem ipsum dolor sit amet
                                consect
                                adipisicing elit</a></h5>
                        <div class="product-meta"><span><i class="fas fa-map-marker-alt"></i>Uttara,
                                Dhaka</span><span><i class="fas fa-clock"></i>30 min ago</span></div>
                        <div class="product-info">
                            <h5 class="product-price">$78<span>/Negotiable</span></h5>
                            <div class="product-btn"><a href="<?= URL::asset('/') ?>" title="Compare"
                                    class="fas fa-compress"></a><button type="button" title="Wishlist"
                                    class="far fa-heart"></button></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-11 col-lg-8 col-xl-6">
                <div class="product-card standard">
                    <div class="product-media">
                        <div class="product-img"><img src="<?= URL::asset('assets/') ?>/images/product/04.jpg"
                                alt="product"></div>
                        <div class="cross-vertical-badge product-badge"><i class="fas fa-bolt"></i><span>trending</span>
                        </div>
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
                            <li class="breadcrumb-item"><a href="#">electronics</a></li>
                            <li class="breadcrumb-item active" aria-current="page">television</li>
                        </ol>
                        <h5 class="product-title"><a href="<?= URL::asset('/') ?>">Lorem ipsum dolor sit amet
                                consect
                                adipisicing elit</a></h5>
                        <div class="product-meta"><span><i class="fas fa-map-marker-alt"></i>Uttara,
                                Dhaka</span><span><i class="fas fa-clock"></i>30 min ago</span></div>
                        <div class="product-info">
                            <h5 class="product-price">$756<span>/fixed</span></h5>
                            <div class="product-btn"><a href="<?= URL::asset('/') ?>" title="Compare"
                                    class="fas fa-compress"></a><button type="button" title="Wishlist"
                                    class="far fa-heart"></button></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-11 col-lg-8 col-xl-6">
                <div class="product-card standard">
                    <div class="product-media">
                        <div class="product-img"><img src="<?= URL::asset('assets/') ?>/images/product/05.jpg"
                                alt="product"></div>
                        <div class="cross-vertical-badge product-badge"><i class="fas fa-bolt"></i><span>trending</span>
                        </div>
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
                            <li class="breadcrumb-item"><a href="#">gadget</a></li>
                            <li class="breadcrumb-item active" aria-current="page">headphone</li>
                        </ol>
                        <h5 class="product-title"><a href="<?= URL::asset('/') ?>">Lorem ipsum dolor sit amet
                                consect
                                adipisicing elit</a></h5>
                        <div class="product-meta"><span><i class="fas fa-map-marker-alt"></i>Uttara,
                                Dhaka</span><span><i class="fas fa-clock"></i>30 min ago</span></div>
                        <div class="product-info">
                            <h5 class="product-price">$245<span>/Negotiable</span></h5>
                            <div class="product-btn"><a href="<?= URL::asset('/') ?>" title="Compare"
                                    class="fas fa-compress"></a><button type="button" title="Wishlist"
                                    class="far fa-heart"></button></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-11 col-lg-8 col-xl-6">
                <div class="product-card standard">
                    <div class="product-media">
                        <div class="product-img"><img src="<?= URL::asset('assets/') ?>/images/product/06.jpg"
                                alt="product"></div>
                        <div class="cross-vertical-badge product-badge"><i class="fas fa-bolt"></i><span>trending</span>
                        </div>
                        <div class="product-type"><span class="flat-badge rent">new</span></div>
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
                            <li class="breadcrumb-item active" aria-current="page">cycle</li>
                        </ol>
                        <h5 class="product-title"><a href="<?= URL::asset('/') ?>">Lorem ipsum dolor sit amet
                                consect
                                adipisicing elit</a></h5>
                        <div class="product-meta"><span><i class="fas fa-map-marker-alt"></i>Uttara,
                                Dhaka</span><span><i class="fas fa-clock"></i>30 min ago</span></div>
                        <div class="product-info">
                            <h5 class="product-price">$75<span>/per hour</span></h5>
                            <div class="product-btn"><a href="<?= URL::asset('/') ?>" title="Compare"
                                    class="fas fa-compress"></a><button type="button" title="Wishlist"
                                    class="far fa-heart"></button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="center-20"><a href="<?= URL::asset('/') ?>" class="btn btn-inline"><i
                            class="fas fa-eye"></i><span>view all trend</span></a></div>
            </div>
        </div>
    </div>
</section>

<section class="section city-part pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-center-heading">
                    <h2>Top Cities by <span>Ads</span></h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero
                        voluptatum repudiandae veniam maxime tenetur.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-3"><a href="<?= URL::asset('/') ?>" class="city-card"
                    style="background: url(<?= URL::asset('assets/') ?>/images/cities/01.jpg) no-repeat center; background-size: cover">
                    <div class="city-content">
                        <h4>Los Angeles</h4>
                        <p>(25) ads</p>
                    </div>
                </a></div>
            <div class="col-sm-6 col-md-6 col-lg-4"><a href="<?= URL::asset('/') ?>" class="city-card"
                    style="background: url(<?= URL::asset('assets/') ?>/images/cities/02.jpg) no-repeat center; background-size: cover">
                    <div class="city-content">
                        <h4>san francisco</h4>
                        <p>(25) ads</p>
                    </div>
                </a></div>
            <div class="col-sm-6 col-md-6 col-lg-5"><a href="<?= URL::asset('/') ?>" class="city-card"
                    style="background: url(<?= URL::asset('assets/') ?>/images/cities/03.jpg) no-repeat center; background-size: cover">
                    <div class="city-content">
                        <h4>california</h4>
                        <p>(25) ads</p>
                    </div>
                </a></div>
            <div class="col-sm-6 col-md-6 col-lg-5"><a href="<?= URL::asset('/') ?>" class="city-card"
                    style="background: url(<?= URL::asset('assets/') ?>/images/cities/04.jpg) no-repeat center; background-size: cover">
                    <div class="city-content">
                        <h4>new york</h4>
                        <p>(25) ads</p>
                    </div>
                </a></div>
            <div class="col-sm-6 col-md-6 col-lg-4"><a href="<?= URL::asset('/') ?>" class="city-card"
                    style="background: url(<?= URL::asset('assets/') ?>/images/cities/05.jpg) no-repeat center; background-size: cover">
                    <div class="city-content">
                        <h4>manhattan</h4>
                        <p>(25) ads</p>
                    </div>
                </a></div>
            <div class="col-sm-6 col-md-6 col-lg-3"><a href="<?= URL::asset('/') ?>" class="city-card"
                    style="background: url(<?= URL::asset('assets/') ?>/images/cities/06.jpg) no-repeat center; background-size: cover">
                    <div class="city-content">
                        <h4>Baltimore</h4>
                        <p>(25) ads</p>
                    </div>
                </a></div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="center-20"><a href="<?= URL::asset('/') ?>" class="btn btn-inline"><i
                            class="fas fa-eye"></i><span>view all Cities</span></a></div>
            </div>
        </div>
    </div>
</section>




<section class="section category-part  bg-light mt-5  pt-5 pb-5 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-center-heading">
                    <h2>Top Categories by <span>Ads</span></h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero
                        voluptatum repudiandae veniam maxime tenetur.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                <div class="category-card">
                    <div class="category-head"><img src="<?= URL::asset('assets/') ?>/images/category/electronics.jpg"
                            alt="category"><a href="<?= URL::asset('/') ?>" class="category-content">
                            <h4>electronics</h4>
                            <p>(3678)</p>
                        </a></div>
                    <ul class="category-list">
                        <li><a href="#">
                                <h6>television</h6>
                                <p>(34)</p>
                            </a></li>
                        <li><a href="#">
                                <h6>Generetor</h6>
                                <p>(24)</p>
                            </a></li>
                        <li><a href="#">
                                <h6>Washing machine</h6>
                                <p>(12)</p>
                            </a></li>
                        <li><a href="#">
                                <h6>air condition</h6>
                                <p>(19)</p>
                            </a></li>
                        <li><a href="#">
                                <h6>iron</h6>
                                <p>(56)</p>
                            </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                <div class="category-card">
                    <div class="category-head"><img src="<?= URL::asset('assets/') ?>/images/category/gadgets.jpg"
                            alt="category"><a href="<?= URL::asset('/') ?>" class="category-content">
                            <h4>gadgets</h4>
                            <p>(3678)</p>
                        </a></div>
                    <ul class="category-list">
                        <li><a href="#">
                                <h6>computer</h6>
                                <p>(34)</p>
                            </a></li>
                        <li><a href="#">
                                <h6>mobile</h6>
                                <p>(24)</p>
                            </a></li>
                        <li><a href="#">
                                <h6>camera</h6>
                                <p>(12)</p>
                            </a></li>
                        <li><a href="#">
                                <h6>dron</h6>
                                <p>(19)</p>
                            </a></li>
                        <li><a href="#">
                                <h6>airphone</h6>
                                <p>(56)</p>
                            </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                <div class="category-card">
                    <div class="category-head"><img src="<?= URL::asset('assets/') ?>/images/category/furnitures.jpg"
                            alt="category"><a href="<?= URL::asset('/') ?>" class="category-content">
                            <h4>furnitures</h4>
                            <p>(3678)</p>
                        </a></div>
                    <ul class="category-list">
                        <li><a href="#">
                                <h6>dyning table</h6>
                                <p>(34)</p>
                            </a></li>
                        <li><a href="#">
                                <h6>chair</h6>
                                <p>(24)</p>
                            </a></li>
                        <li><a href="#">
                                <h6>sofa</h6>
                                <p>(12)</p>
                            </a></li>
                        <li><a href="#">
                                <h6>tea table</h6>
                                <p>(19)</p>
                            </a></li>
                        <li><a href="#">
                                <h6>dressing table</h6>
                                <p>(56)</p>
                            </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                <div class="category-card">
                    <div class="category-head"><img src="<?= URL::asset('assets/') ?>/images/category/animals.jpg"
                            alt="category"><a href="<?= URL::asset('/') ?>" class="category-content">
                            <h4>animals</h4>
                            <p>(3678)</p>
                        </a></div>
                    <ul class="category-list">
                        <li><a href="#">
                                <h6>dyning table</h6>
                                <p>(34)</p>
                            </a></li>
                        <li><a href="#">
                                <h6>chair</h6>
                                <p>(24)</p>
                            </a></li>
                        <li><a href="#">
                                <h6>sofa</h6>
                                <p>(12)</p>
                            </a></li>
                        <li><a href="#">
                                <h6>tea table</h6>
                                <p>(19)</p>
                            </a></li>
                        <li><a href="#">
                                <h6>dressing table</h6>
                                <p>(56)</p>
                            </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                <div class="category-card">
                    <div class="category-head"><img src="<?= URL::asset('assets/') ?>/images/category/fashions.jpg"
                            alt="category"><a href="<?= URL::asset('/') ?>" class="category-content">
                            <h4>fashions</h4>
                            <p>(3678)</p>
                        </a></div>
                    <ul class="category-list">
                        <li><a href="#">
                                <h6>jeans</h6>
                                <p>(34)</p>
                            </a></li>
                        <li><a href="#">
                                <h6>underware</h6>
                                <p>(24)</p>
                            </a></li>
                        <li><a href="#">
                                <h6>shirt</h6>
                                <p>(12)</p>
                            </a></li>
                        <li><a href="#">
                                <h6>jacket</h6>
                                <p>(19)</p>
                            </a></li>
                        <li><a href="#">
                                <h6>shorts</h6>
                                <p>(56)</p>
                            </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                <div class="category-card">
                    <div class="category-head"><img src="<?= URL::asset('assets/') ?>/images/category/motorbikes.jpg"
                            alt="category"><a href="<?= URL::asset('/') ?>" class="category-content">
                            <h4>motorbikes</h4>
                            <p>(3678)</p>
                        </a></div>
                    <ul class="category-list">
                        <li><a href="#">
                                <h6>dyning table</h6>
                                <p>(34)</p>
                            </a></li>
                        <li><a href="#">
                                <h6>chair</h6>
                                <p>(24)</p>
                            </a></li>
                        <li><a href="#">
                                <h6>sofa</h6>
                                <p>(12)</p>
                            </a></li>
                        <li><a href="#">
                                <h6>tea table</h6>
                                <p>(19)</p>
                            </a></li>
                        <li><a href="#">
                                <h6>dressing table</h6>
                                <p>(56)</p>
                            </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                <div class="category-card">
                    <div class="category-head"><img src="<?= URL::asset('assets/') ?>/images/category/properties.jpg"
                            alt="category"><a href="<?= URL::asset('/') ?>" class="category-content">
                            <h4>properties</h4>
                            <p>(3678)</p>
                        </a></div>
                    <ul class="category-list">
                        <li><a href="#">
                                <h6>dyning table</h6>
                                <p>(34)</p>
                            </a></li>
                        <li><a href="#">
                                <h6>chair</h6>
                                <p>(24)</p>
                            </a></li>
                        <li><a href="#">
                                <h6>sofa</h6>
                                <p>(12)</p>
                            </a></li>
                        <li><a href="#">
                                <h6>tea table</h6>
                                <p>(19)</p>
                            </a></li>
                        <li><a href="#">
                                <h6>dressing table</h6>
                                <p>(56)</p>
                            </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                <div class="category-card">
                    <div class="category-head"><img src="<?= URL::asset('assets/') ?>/images/category/automobiles.jpg"
                            alt="category"><a href="<?= URL::asset('/') ?>" class="category-content">
                            <h4>automobiles</h4>
                            <p>(3678)</p>
                        </a></div>
                    <ul class="category-list">
                        <li><a href="#">
                                <h6>dyning table</h6>
                                <p>(34)</p>
                            </a></li>
                        <li><a href="#">
                                <h6>chair</h6>
                                <p>(24)</p>
                            </a></li>
                        <li><a href="#">
                                <h6>sofa</h6>
                                <p>(12)</p>
                            </a></li>
                        <li><a href="#">
                                <h6>tea table</h6>
                                <p>(19)</p>
                            </a></li>
                        <li><a href="#">
                                <h6>dressing table</h6>
                                <p>(56)</p>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="center-20"><a href="<?= URL::asset('/') ?>" class="btn btn-inline"><i
                            class="fas fa-eye"></i><span>view all categories</span></a></div>
            </div>
        </div>
    </div>
</section>



<section class="intro-part mt-0 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-center-heading">
                    <h2>Do you have something to advertise?</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero
                        voluptatum repudiandae veniam maxime tenetur.</p><a href="<?= URL::asset('/register') ?>"
                        class="btn btn-outline"><i class="fas fa-plus-circle"></i><span>post your ad</span></a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="price-part mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-center-heading">
                    <h2>Best Reliable Pricing Plans</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero
                        voluptatum repudiandae veniam maxime tenetur.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="price-card">
                    <div class="price-head"><i class="flaticon-bicycle"></i>
                        <h3>$00</h3>
                        <h4>Free Plan</h4>
                    </div>
                    <ul class="price-list">
                        <li><i class="fas fa-plus"></i>
                            <p>1 Regular Ad for 7 days</p>
                        </li>
                        <li><i class="fas fa-times"></i>
                            <p>No Credit card required</p>
                        </li>
                        <li><i class="fas fa-times"></i>
                            <p>No Top or Featured Ad</p>
                        </li>
                        <li><i class="fas fa-times"></i>
                            <p>No Ad will be bumped up</p>
                        </li>
                        <li><i class="fas fa-plus"></i>
                            <p>Limited Support</p>
                        </li>
                    </ul>
                    <div class="price-btn"><a href="<?= URL::asset('/') ?>" class="btn btn-inline"><i
                                class="fas fa-sign-in-alt"></i><span>Register Now</span></a></div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="price-card price-active">
                    <div class="price-head"><i class="flaticon-car-wash"></i>
                        <h3>$23</h3>
                        <h4>Standard Plan</h4>
                    </div>
                    <ul class="price-list">
                        <li><i class="fas fa-plus"></i>
                            <p>1 Recom Ad for 30 days</p>
                        </li>
                        <li><i class="fas fa-times"></i>
                            <p>No Featured Ad Available</p>
                        </li>
                        <li><i class="fas fa-times"></i>
                            <p>No Ad will be bumped up</p>
                        </li>
                        <li><i class="fas fa-times"></i>
                            <p>No Top Ad Available</p>
                        </li>
                        <li><i class="fas fa-plus"></i>
                            <p>Basic Support</p>
                        </li>
                    </ul>
                    <div class="price-btn"><a href="<?= URL::asset('/') ?>" class="btn btn-inline"><i
                                class="fas fa-sign-in-alt"></i><span>Register Now</span></a></div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="price-card">
                    <div class="price-head"><i class="flaticon-airplane"></i>
                        <h3>$49</h3>
                        <h4>Premium Plan</h4>
                    </div>
                    <ul class="price-list">
                        <li><i class="fas fa-plus"></i>
                            <p>1 Featured Ad for 60 days</p>
                        </li>
                        <li><i class="fas fa-plus"></i>
                            <p>Access to All features</p>
                        </li>
                        <li><i class="fas fa-plus"></i>
                            <p>With Recommended</p>
                        </li>
                        <li><i class="fas fa-plus"></i>
                            <p>Ad Top Category</p>
                        </li>
                        <li><i class="fas fa-plus"></i>
                            <p>Priority Support</p>
                        </li>
                    </ul>
                    <div class="price-btn"><a href="<?= URL::asset('/') ?>" class="btn btn-inline"><i
                                class="fas fa-sign-in-alt"></i><span>Register Now</span></a></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection