@extends('layouts.layout')

@section('title', 'Page Title')

@section('sidebar')
@parent

<p>This is appended to the master sidebar.</p>
@endsection

@section('content')




@php
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\City;
$products = Product::all();
$cities = City::all();
@endphp

<aside class="sidebar-part">
    <div class="sidebar-body">
        <div class="sidebar-header"><a href="index-2.html" class="sidebar-logo"><img
                    src="<?= URL::asset('assets/') ?>/images/logo.png" alt="logo"></a><button class="sidebar-cross"><i
                    class="fas fa-times"></i></button></div>
        <div class="sidebar-content">
            <div class="sidebar-profile"><a href="#" class="sidebar-avatar"><img
                        src="<?= URL::asset('assets/') ?>/images/avatar/01.jpg" alt="avatar"></a>
                <h4><a href="#" class="sidebar-name">Jackon Honson</a></h4><a href="ad-post.html"
                    class="btn btn-inline sidebar-post"><i class="fas fa-plus-circle"></i><span>post your
                        ad</span></a>
            </div>
            <div class="sidebar-menu">
                <ul class="nav nav-tabs">
                    <li><a href="#main-menu" class="nav-link active" data-toggle="tab">Main Menu</a></li>
                    <li><a href="#author-menu" class="nav-link" data-toggle="tab">Author Menu</a></li>
                </ul>
                <div class="tab-pane active" id="main-menu">
                    <ul class="navbar-list">
                        <li class="navbar-item"><a class="navbar-link" href="index-2.html">Home</a></li>
                        <li class="navbar-item navbar-dropdown"><a class="navbar-link"
                                href="#"><span>Categories</span><i class="fas fa-plus"></i></a>
                            <ul class="dropdown-list">
                                <li><a class="dropdown-link" href="category-list.html">category list</a></li>
                                <li><a class="dropdown-link" href="category-details.html">category details</a></li>
                            </ul>
                        </li>
                        <li class="navbar-item navbar-dropdown"><a class="navbar-link" href="#"><span>Advertise
                                    List</span><i class="fas fa-plus"></i></a>
                            <ul class="dropdown-list">
                                <li><a class="dropdown-link" href="ad-list-column3.html">ad list column 3</a></li>
                                <li><a class="dropdown-link" href="ad-list-column2.html">ad list column 2</a></li>
                                <li><a class="dropdown-link" href="ad-list-column1.html">ad list column 1</a></li>
                            </ul>
                        </li>
                        <li class="navbar-item navbar-dropdown"><a class="navbar-link" href="#"><span>Advertise
                                    details</span><i class="fas fa-plus"></i></a>
                            <ul class="dropdown-list">
                                <li><a class="dropdown-link" href="ad-details-grid.html">ad details grid</a></li>
                                <li><a class="dropdown-link" href="ad-details-left.html">ad details left</a></li>
                                <li><a class="dropdown-link" href="ad-details-right.html">ad details right</a></li>
                            </ul>
                        </li>
                        <li class="navbar-item navbar-dropdown"><a class="navbar-link" href="#"><span>Pages</span><i
                                    class="fas fa-plus"></i></a>
                            <ul class="dropdown-list">
                                <li><a class="dropdown-link" href="about.html">About Us</a></li>
                                <li><a class="dropdown-link" href="compare.html">Ad Compare</a></li>
                                <li><a class="dropdown-link" href="cities.html">Ad by Cities</a></li>
                                <li><a class="dropdown-link" href="price.html">Pricing Plan</a></li>
                                <li><a class="dropdown-link" href="user-form.html">User Form</a></li>
                                <li><a class="dropdown-link" href="404.html">404</a></li>
                            </ul>
                        </li>
                        <li class="navbar-item navbar-dropdown"><a class="navbar-link" href="#"><span>blogs</span><i
                                    class="fas fa-plus"></i></a>
                            <ul class="dropdown-list">
                                <li><a class="dropdown-link" href="blog-list.html">Blog list</a></li>
                                <li><a class="dropdown-link" href="blog-details.html">blog details</a></li>
                            </ul>
                        </li>
                        <li class="navbar-item"><a class="navbar-link" href="contact.html">Contact</a></li>
                    </ul>
                </div>
                <div class="tab-pane" id="author-menu">
                    <ul class="navbar-list">
                        <li class="navbar-item"><a class="navbar-link" href="dashboard.html">Dashboard</a></li>
                        <li class="navbar-item"><a class="navbar-link" href="profile.html">Profile</a></li>
                        <li class="navbar-item"><a class="navbar-link" href="ad-post.html">Ad Post</a></li>
                        <li class="navbar-item"><a class="navbar-link" href="my-ads.html">My Ads</a></li>
                        <li class="navbar-item"><a class="navbar-link" href="setting.html">Settings</a></li>
                        <li class="navbar-item navbar-dropdown"><a class="navbar-link"
                                href="bookmark.html"><span>bookmark</span><span>0</span></a></li>
                        <li class="navbar-item navbar-dropdown"><a class="navbar-link"
                                href="message.html"><span>Message</span><span>0</span></a></li>
                        <li class="navbar-item navbar-dropdown"><a class="navbar-link"
                                href="notification.html"><span>Notification</span><span>0</span></a></li>
                        <li class="navbar-item"><a class="navbar-link" href="user-form.html">Logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="sidebar-footer">
                <p>All Rights Reserved By <a href="#">Classicads</a></p>
                <p>Developed By <a href="https://themeforest.net/user/mironcoder">Mironcoder</a></p>
            </div>
        </div>
    </div>
</aside>
<nav class="mobile-nav">
    <div class="container">
        <div class="mobile-group"><a href="index-2.html" class="mobile-widget"><i
                    class="fas fa-home"></i><span>home</span></a><a href="user-form.html" class="mobile-widget"><i
                    class="fas fa-user"></i><span>join me</span></a><a href="ad-post.html"
                class="mobile-widget plus-btn"><i class="fas fa-plus"></i><span>Ad Post</span></a><a
                href="notification.html" class="mobile-widget"><i
                    class="fas fa-bell"></i><span>notify</span><sup>0</sup></a><a href="message.html"
                class="mobile-widget"><i class="fas fa-envelope"></i><span>message</span><sup>0</sup></a></div>
    </div>
</nav>

<section class="inner-section ad-list-part mt-4">
    <div class="container">
        <div class="row content-reverse">
            <div class="col-lg-4 col-xl-3">
                <div class="row">
                    <div class="col-md-6 col-lg-12">
                        <div class="product-widget">
                            <h6 class="product-widget-title">Filter by Price</h6>
                            <form class="product-widget-form">
                                <div class="product-widget-group"><input type="text" placeholder="min - 00"><input
                                        type="text" placeholder="max - 1B"></div><button type="submit"
                                    class="product-widget-btn"><i class="fas fa-search"></i><span>search</span></button>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-12">
                        <div class="product-widget">
                            <h6 class="product-widget-title">filter by category</h6>
                            <form class="product-widget-form">
                                <div class="product-widget-search"><input type="text" placeholder="search"></div>
                                <ul class="product-widget-list product-widget-scroll">
                                    <li class="product-widget-dropitem"><button type="button"
                                            class="product-widget-link"><i class="fas fa-tags"></i>electronics (234)
                                        </button>
                                        <ul class="product-widget-dropdown">
                                            <li><a href="#">mixer (56)</a></li>
                                            <li><a href="#">freez (78)</a></li>
                                            <li><a href="#">LED tv (78)</a></li>
                                        </ul>
                                    </li>
                                    <li class="product-widget-dropitem"><button type="button"
                                            class="product-widget-link"><i class="fas fa-tags"></i>automobiles (767)
                                        </button>
                                        <ul class="product-widget-dropdown">
                                            <li><a href="#">private car (56)</a></li>
                                            <li><a href="#">motorbike (78)</a></li>
                                            <li><a href="#">truck (78)</a></li>
                                        </ul>
                                    </li>
                                    <li class="product-widget-dropitem"><button type="button"
                                            class="product-widget-link"><i class="fas fa-tags"></i>properties (456)
                                        </button>
                                        <ul class="product-widget-dropdown">
                                            <li><a href="#">free land (56)</a></li>
                                            <li><a href="#">apartment (78)</a></li>
                                            <li><a href="#">shop (78)</a></li>
                                        </ul>
                                    </li>
                                    <li class="product-widget-dropitem"><button type="button"
                                            class="product-widget-link"><i class="fas fa-tags"></i>fashion (356)
                                        </button>
                                        <ul class="product-widget-dropdown">
                                            <li><a href="#">jeans (56)</a></li>
                                            <li><a href="#">t-shirt (78)</a></li>
                                            <li><a href="#">jacket (78)</a></li>
                                        </ul>
                                    </li>
                                    <li class="product-widget-dropitem"><button type="button"
                                            class="product-widget-link"><i class="fas fa-tags"></i>gadgets (768)
                                        </button>
                                        <ul class="product-widget-dropdown">
                                            <li><a href="#">computer (56)</a></li>
                                            <li><a href="#">mobile (78)</a></li>
                                            <li><a href="#">drone (78)</a></li>
                                        </ul>
                                    </li>
                                    <li class="product-widget-dropitem"><button type="button"
                                            class="product-widget-link"><i class="fas fa-tags"></i>furnitures (977)
                                        </button>
                                        <ul class="product-widget-dropdown">
                                            <li><a href="#">chair (56)</a></li>
                                            <li><a href="#">sofa (78)</a></li>
                                            <li><a href="#">table (78)</a></li>
                                        </ul>
                                    </li>
                                    <li class="product-widget-dropitem"><button type="button"
                                            class="product-widget-link"><i class="fas fa-tags"></i>hospitality (124)
                                        </button>
                                        <ul class="product-widget-dropdown">
                                            <li><a href="#">jeans (56)</a></li>
                                            <li><a href="#">t-shirt (78)</a></li>
                                            <li><a href="#">jacket (78)</a></li>
                                        </ul>
                                    </li>
                                    <li class="product-widget-dropitem"><button type="button"
                                            class="product-widget-link"><i class="fas fa-tags"></i>agriculture (565)
                                        </button>
                                        <ul class="product-widget-dropdown">
                                            <li><a href="#">jeans (56)</a></li>
                                            <li><a href="#">t-shirt (78)</a></li>
                                            <li><a href="#">jacket (78)</a></li>
                                        </ul>
                                    </li>
                                </ul><button type="submit" class="product-widget-btn"><i
                                        class="fas fa-broom"></i><span>Clear Filter</span></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-12">
                        <div class="product-widget">
                            <h6 class="product-widget-title">Filter by cities</h6>
                            <form class="product-widget-form">
                                <div class="product-widget-search"><input type="text" placeholder="Search"></div>
                                <ul class="product-widget-list product-widget-scroll">
                                    <li class="product-widget-item">
                                        <div class="product-widget-checkbox"><input type="checkbox" id="chcek9">
                                        </div><label class="product-widget-label" for="chcek9"><span
                                                class="product-widget-text">Los Angeles</span><span
                                                class="product-widget-number">(95)</span></label>
                                    </li>
                                    <li class="product-widget-item">
                                        <div class="product-widget-checkbox"><input type="checkbox" id="chcek10">
                                        </div><label class="product-widget-label" for="chcek10"><span
                                                class="product-widget-text">San Francisco</span><span
                                                class="product-widget-number">(82)</span></label>
                                    </li>
                                    <li class="product-widget-item">
                                        <div class="product-widget-checkbox"><input type="checkbox" id="chcek11">
                                        </div><label class="product-widget-label" for="chcek11"><span
                                                class="product-widget-text">California</span><span
                                                class="product-widget-number">(1t)</span></label>
                                    </li>
                                    <li class="product-widget-item">
                                        <div class="product-widget-checkbox"><input type="checkbox" id="chcek12">
                                        </div><label class="product-widget-label" for="chcek12"><span
                                                class="product-widget-text">Manhattan</span><span
                                                class="product-widget-number">(46)</span></label>
                                    </li>
                                    <li class="product-widget-item">
                                        <div class="product-widget-checkbox"><input type="checkbox" id="chcek13">
                                        </div><label class="product-widget-label" for="chcek13"><span
                                                class="product-widget-text">Baltimore</span><span
                                                class="product-widget-number">(24)</span></label>
                                    </li>
                                    <li class="product-widget-item">
                                        <div class="product-widget-checkbox"><input type="checkbox" id="chcek14">
                                        </div><label class="product-widget-label" for="chcek14"><span
                                                class="product-widget-text">Avocados</span><span
                                                class="product-widget-number">(34)</span></label>
                                    </li>
                                    <li class="product-widget-item">
                                        <div class="product-widget-checkbox"><input type="checkbox" id="chcek15">
                                        </div><label class="product-widget-label" for="chcek15"><span
                                                class="product-widget-text">new york</span><span
                                                class="product-widget-number">(82)</span></label>
                                    </li>
                                    <li class="product-widget-item">
                                        <div class="product-widget-checkbox"><input type="checkbox" id="chcek16">
                                        </div><label class="product-widget-label" for="chcek16"><span
                                                class="product-widget-text">Houston</span><span
                                                class="product-widget-number">(45)</span></label>
                                    </li>
                                    <li class="product-widget-item">
                                        <div class="product-widget-checkbox"><input type="checkbox" id="chcek17">
                                        </div><label class="product-widget-label" for="chcek17"><span
                                                class="product-widget-text">Chicago</span><span
                                                class="product-widget-number">(19)</span></label>
                                    </li>
                                </ul><button type="submit" class="product-widget-btn"><i
                                        class="fas fa-broom"></i><span>Clear Filter</span></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-12">
                        <div class="product-widget">
                            <h6 class="product-widget-title">Filter by popularity</h6>
                            <form class="product-widget-form">
                                <div class="product-widget-search"><input type="text" placeholder="Search"></div>
                                <ul class="product-widget-list product-widget-scroll">
                                    <li class="product-widget-item">
                                        <div class="product-widget-checkbox"><input type="checkbox" id="chcek9">
                                        </div><label class="product-widget-label" for="chcek9"><span
                                                class="product-widget-text">laptop</span><span
                                                class="product-widget-number">(68)</span></label>
                                    </li>
                                    <li class="product-widget-item">
                                        <div class="product-widget-checkbox"><input type="checkbox" id="chcek10">
                                        </div><label class="product-widget-label" for="chcek10"><span
                                                class="product-widget-text">camera</span><span
                                                class="product-widget-number">(78)</span></label>
                                    </li>
                                    <li class="product-widget-item">
                                        <div class="product-widget-checkbox"><input type="checkbox" id="chcek11">
                                        </div><label class="product-widget-label" for="chcek11"><span
                                                class="product-widget-text">television</span><span
                                                class="product-widget-number">(34)</span></label>
                                    </li>
                                    <li class="product-widget-item">
                                        <div class="product-widget-checkbox"><input type="checkbox" id="chcek12">
                                        </div><label class="product-widget-label" for="chcek12"><span
                                                class="product-widget-text">by cycle</span><span
                                                class="product-widget-number">(43)</span></label>
                                    </li>
                                    <li class="product-widget-item">
                                        <div class="product-widget-checkbox"><input type="checkbox" id="chcek13">
                                        </div><label class="product-widget-label" for="chcek13"><span
                                                class="product-widget-text">bike</span><span
                                                class="product-widget-number">(57)</span></label>
                                    </li>
                                    <li class="product-widget-item">
                                        <div class="product-widget-checkbox"><input type="checkbox" id="chcek14">
                                        </div><label class="product-widget-label" for="chcek14"><span
                                                class="product-widget-text">private car</span><span
                                                class="product-widget-number">(67)</span></label>
                                    </li>
                                    <li class="product-widget-item">
                                        <div class="product-widget-checkbox"><input type="checkbox" id="chcek15">
                                        </div><label class="product-widget-label" for="chcek15"><span
                                                class="product-widget-text">air condition</span><span
                                                class="product-widget-number">(98)</span></label>
                                    </li>
                                    <li class="product-widget-item">
                                        <div class="product-widget-checkbox"><input type="checkbox" id="chcek16">
                                        </div><label class="product-widget-label" for="chcek16"><span
                                                class="product-widget-text">apartment</span><span
                                                class="product-widget-number">(45)</span></label>
                                    </li>
                                    <li class="product-widget-item">
                                        <div class="product-widget-checkbox"><input type="checkbox" id="chcek17">
                                        </div><label class="product-widget-label" for="chcek17"><span
                                                class="product-widget-text">watch</span><span
                                                class="product-widget-number">(76)</span></label>
                                    </li>
                                </ul><button type="submit" class="product-widget-btn"><i
                                        class="fas fa-broom"></i><span>Clear Filter</span></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-12">
                        <div class="product-widget">
                            <h6 class="product-widget-title">Filter by type</h6>
                            <form class="product-widget-form">
                                <ul class="product-widget-list">
                                    <li class="product-widget-item">
                                        <div class="product-widget-checkbox"><input type="checkbox" id="chcek1">
                                        </div><label class="product-widget-label" for="chcek1"><span
                                                class="product-widget-type sale">sales</span><span
                                                class="product-widget-number">(15)</span></label>
                                    </li>
                                    <li class="product-widget-item">
                                        <div class="product-widget-checkbox"><input type="checkbox" id="chcek2">
                                        </div><label class="product-widget-label" for="chcek2"><span
                                                class="product-widget-type rent">rental</span><span
                                                class="product-widget-number">(25)</span></label>
                                    </li>
                                    <li class="product-widget-item">
                                        <div class="product-widget-checkbox"><input type="checkbox" id="chcek3">
                                        </div><label class="product-widget-label" for="chcek3"><span
                                                class="product-widget-type booking">booking</span><span
                                                class="product-widget-number">(35)</span></label>
                                    </li>
                                </ul><button type="submit" class="product-widget-btn"><i
                                        class="fas fa-broom"></i><span>Clear Filter</span></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-12">
                        <div class="product-widget">
                            <h6 class="product-widget-title">Filter by rating</h6>
                            <form class="product-widget-form">
                                <ul class="product-widget-list">
                                    <li class="product-widget-item">
                                        <div class="product-widget-checkbox"><input type="checkbox" id="chcek4">
                                        </div><label class="product-widget-label" for="chcek4"><span
                                                class="product-widget-star"><i class="fas fa-star"></i><i
                                                    class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                    class="fas fa-star"></i><i class="fas fa-star"></i></span><span
                                                class="product-widget-number">(45)</span></label>
                                    </li>
                                    <li class="product-widget-item">
                                        <div class="product-widget-checkbox"><input type="checkbox" id="chcek5">
                                        </div><label class="product-widget-label" for="chcek5"><span
                                                class="product-widget-star"><i class="fas fa-star"></i><i
                                                    class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                    class="fas fa-star"></i><i class="far fa-star"></i></span><span
                                                class="product-widget-number">(55)</span></label>
                                    </li>
                                    <li class="product-widget-item">
                                        <div class="product-widget-checkbox"><input type="checkbox" id="chcek6">
                                        </div><label class="product-widget-label" for="chcek6"><span
                                                class="product-widget-star"><i class="fas fa-star"></i><i
                                                    class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                    class="far fa-star"></i><i class="far fa-star"></i></span><span
                                                class="product-widget-number">(65)</span></label>
                                    </li>
                                    <li class="product-widget-item">
                                        <div class="product-widget-checkbox"><input type="checkbox" id="chcek7">
                                        </div><label class="product-widget-label" for="chcek7"><span
                                                class="product-widget-star"><i class="fas fa-star"></i><i
                                                    class="fas fa-star"></i><i class="far fa-star"></i><i
                                                    class="far fa-star"></i><i class="far fa-star"></i></span><span
                                                class="product-widget-number">(75)</span></label>
                                    </li>
                                    <li class="product-widget-item">
                                        <div class="product-widget-checkbox"><input type="checkbox" id="chcek8">
                                        </div><label class="product-widget-label" for="chcek8"><span
                                                class="product-widget-star"><i class="fas fa-star"></i><i
                                                    class="far fa-star"></i><i class="far fa-star"></i><i
                                                    class="far fa-star"></i><i class="far fa-star"></i></span><span
                                                class="product-widget-number">(85)</span></label>
                                    </li>
                                </ul><button type="submit" class="product-widget-btn"><i
                                        class="fas fa-broom"></i><span>Clear Filter</span></button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-8 col-xl-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-filter">
                            <div class="filter-show"><label class="filter-label">Show :</label><select
                                    class="custom-select filter-select">
                                    <option value="1">12</option>
                                    <option value="2">24</option>
                                    <option value="3">36</option>
                                </select></div>
                            <div class="filter-short"><label class="filter-label">Short by :</label><select
                                    class="custom-select filter-select">
                                    <option selected>default</option>
                                    <option value="3">trending</option>
                                    <option value="1">featured</option>
                                    <option value="2">recommend</option>
                                </select></div>
                            <div class="filter-action"><a href="ad-list-column3.html" title="Three Column"><i
                                        class="fas fa-th"></i></a><a href="ad-list-column2.html" title="Two Column"><i
                                        class="fas fa-th-large"></i></a><a href="ad-list-column1.html"
                                    title="One Column" class="active"><i class="fas fa-th-list"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ad-feature-slider slider-arrow">
                            <div class="feature-card"><a href="#" class="feature-img"><img
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
                                    <h3 class="feature-title"><a href="ad-details-left.html">Unde eveniet ducimus
                                            nostrum maiores soluta temporibus ipsum dolor sit amet.</a></h3>
                                    <div class="feature-meta"><span
                                            class="feature-price">$1200<small>/Monthly</small></span><span
                                            class="feature-time"><i class="fas fa-clock"></i>56 minute ago</span>
                                    </div>
                                </div>
                            </div>
                            <div class="feature-card"><a href="#" class="feature-img"><img
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
                                    <h3 class="feature-title"><a href="ad-details-left.html">Unde eveniet ducimus
                                            nostrum maiores soluta temporibus ipsum dolor sit amet.</a></h3>
                                    <div class="feature-meta"><span
                                            class="feature-price">$800<small>/perday</small></span><span
                                            class="feature-time"><i class="fas fa-clock"></i>56 minute ago</span>
                                    </div>
                                </div>
                            </div>
                            <div class="feature-card"><a href="#" class="feature-img"><img
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
                                    <h3 class="feature-title"><a href="ad-details-left.html">Unde eveniet ducimus
                                            nostrum maiores soluta temporibus ipsum dolor sit amet.</a></h3>
                                    <div class="feature-meta"><span
                                            class="feature-price">$1150<small>/Negotiable</small></span><span
                                            class="feature-time"><i class="fas fa-clock"></i>56 minute ago</span>
                                    </div>
                                </div>
                            </div>
                            <div class="feature-card"><a href="#" class="feature-img"><img
                                        src="<?= URL::asset('assets/') ?>/images/product/06.jpg" alt="feature"></a>
                                <div class="cross-inline-badge feature-badge"><span>featured</span><i
                                        class="fas fa-book-open"></i></div><button type="button" class="feature-wish"><i
                                        class="fas fa-heart"></i></button>
                                <div class="feature-content">
                                    <ol class="breadcrumb feature-category">
                                        <li><span class="flat-badge sale">sale</span></li>
                                        <li class="breadcrumb-item"><a href="#">automobile</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">cycle</li>
                                    </ol>
                                    <h3 class="feature-title"><a href="ad-details-left.html">Unde eveniet ducimus
                                            nostrum maiores soluta temporibus ipsum dolor sit amet.</a></h3>
                                    <div class="feature-meta"><span
                                            class="feature-price">$455<small>/fixed</small></span><span
                                            class="feature-time"><i class="fas fa-clock"></i>56 minute ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ad-standard">

                    @php
                    $i = 0;
                    @endphp
                    @foreach ($products as $item)
                    @php
                    $i++;
                    if($i>50){
                    break;
                    }
                    @endphp
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="product-card standard">
                            <div class="product-media">
                                <div class="product-img"><img src={{$item->get_thumbnail()}}
                                        alt="product"></div>
                                <div class="cross-vertical-badge product-badge"><i
                                        class="fas fa-clipboard-check"></i><span>recommend</span></div>
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
                                    <li class="breadcrumb-item"><a href="#">Luxury</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">resort</li>
                                </ol>
                                <h5 class="product-title"><a href="<?= URL::asset('/') ?>{{$item->slug}}">{{$item->name}}</a></h5>
                                <div class="product-meta"><span><i class="fas fa-map-marker-alt"></i>Uttara,
                                        Dhaka</span><span><i class="fas fa-clock"></i>30 min ago</span></div>
                                <div class="product-info">
                                    <h5 class="product-price">$1590<span>/per week</span></h5>
                                    <div class="product-btn"><a href="compare.html" title="Compare"
                                            class="fas fa-compress"></a><button type="button" title="Wishlist"
                                            class="far fa-heart"></button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

 
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-pagection">
                            <p class="page-info">Showing 12 of 60 Results</p>
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#"><i
                                            class="fas fa-long-arrow-alt-left"></i></a></li>
                                <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">...</li>
                                <li class="page-item"><a class="page-link" href="#">67</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i
                                            class="fas fa-long-arrow-alt-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection