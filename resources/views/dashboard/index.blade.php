@extends('layouts.layout2')

@section('title', 'Page Title')

@section('head')
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/custom/my-ads.css') }}">
@endsection

@section('content')
    @php
    use Illuminate\Support\Facades\Auth;
    use App\Models\Product;
    $user_id = Auth::id();
    $products = Product::where('user_id', $user_id)->get();
    @endphp
    <section class="myads-part">
        <div class="container">
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
                                <option selected>all ads</option>
                                <option value="3">booking ads</option>
                                <option value="2">rental ads</option>
                                <option value="1">sale ads</option>
                            </select></div>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($products as $item)
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="product-card">
                            <div class="product-media">
                                <div class="product-img"><img src="{{$item->get_thumbnail()}}"
                                        alt="{{$item->get_thumbnail()}}"></div>
                                <div class="cross-vertical-badge product-badge"><i class="fas fa-fire"></i><span>top
                                        niche</span></div>
                                <div class="product-type"><span class="flat-badge booking">new</span></div>
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
                                <h5 class="product-title"><a href="ad-details-left.html">{{ $item->name }}</a></h5>
                                <div class="product-meta"><span><i
                                            class="fas fa-map-marker-alt"></i>{{ $item->category->name }},
                                        {{ $item->category->name }}</span><span><i
                                            class="fas fa-clock"></i>{{ $item->updated_at }}</span></div>
                                <div class="product-info">
                                    <h5 class="product-price">${{ $item->price }}<span>/starting price</span></h5>
                                    <div class="product-btn">
                                        <a href="#" title="Delete" class="fas fa-trash text-danger"></a><button
                                            type="button" title="Edit" class="far fa-edit"></button>
                                    </div>
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
    </section>
@endsection
