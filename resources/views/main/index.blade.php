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

$is_searching = false;
$key_word = "";
$search_title = "";

if(isset($_GET['search'])){
if(strlen(isset($_GET['search']))>0){
$key_word = trim($_GET['search']);
$is_searching = true;
}
}

if($is_searching){
$products = Product::where('name', 'LIKE', "%$key_word%")->get();
$search_title = "Found ".count($products)." search results for \"".$key_word."\"";
}else{
$products = Product::all();
}
$cities = City::all();

@endphp
 

<section class="inner-section ad-list-part mt-4">
    <div class="container">
        <div class="row content-reverse">
            <div class="col-lg-4 col-xl-3">
                <div class="row">
                    

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
                   

                </div>
            </div>
            <div class="col-lg-8 col-xl-9">

                @if ($is_searching)

                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-filter">
                            <div class="">
                                {{$search_title}}
                            </div>
                            <div class="filter-action">
                                Clear search
                                <a href="/" title="Clear search" class="active ml-2"><i class="fa fa-times"></i></a></div>
                        </div>
                    </div>
                </div>
                @endif

                <div class="row">
                    <div class="col-lg-12">
                        <div class="ad-feature-slider slider-arrow">
                            
                            <div class="feature-card "><a href="#" class="feature-img"><img
                                        src="<?= URL::asset('assets/') ?>/images/product/08.jpg" alt="feature"></a>
                                <div class="cross-inline-badge feature-badge"><span>featured</span><i
                                        class="fas fa-book-open"></i></div><button type="button" class="feature-wish"><i
                                        class="fas fa-heart"></i></button>
                                <div class="feature-content p-2 pl-3 pr-3">
                                    <ol class="breadcrumb feature-category mb-0 mt-0">
                                        <li><span class="flat-badge sale">sale</span></li>
                                        <li class="breadcrumb-item"><a href="#">gadget</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">iphone.</li>
                                    </ol>
                                    <h3 class="feature-title h5 mb-0 mt-0"><a href="ad-details-left.html">Unde eveniet ducimus
                                            nostrum maiores soluta temribus ipsum dolor sit amet.</a></h3>
                                    <div class="feature-meta"><span
                                            class="feature-price">$1150<small>/Negotiable</small></span><span
                                            class="feature-time"><i class="fas fa-clock"></i>56 minute ago</span>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="row ad-standard">



                    @foreach ($products as $item)
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                        <x-product2 :item="$item" />
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