<div class="row mb-0 border-bottom pb-2 pt-3 product-card-1 standard pl-2 pr-2 ml-md-2 mr-md-2">
    <div class="col-4"> 
        <img class="img-fluid" src={{$item->get_thumbnail()}} alt="product">
    </div>
    <div class="col-8 pl-0 "> 
        <div class="product-content pl-0   mr-0 pr-0 "> 
            <h2 class="product-title m-0 h6"><a href="<?= URL::asset('/') ?>{{$item->slug}}">{{$item->name}}</a></h2>
            <div class="product-meta  mt-0 border-0   mb-0"><span><i class="fas fa-map-marker-alt"></i>{{$item->country->name}},
                    {{$item->city->name}}</span><span><i
                        class="fas fa-clock"></i>{{$item->created_at->diffForHumans()}}</span></div>
            <div class="product-info mt-2 ">
                <h5 class="product-price h6">${{number_format($item->price)}}<span>/@if ($item->fixed_price)
                        Fixed
                        @else
                        Negotiable
                        @endif</span></h5>
                <div class="product-btn"><a href="{{url($item->slug)}}" title="Compare" class="fas fa-compress"></a><button
                        type="button" title="Wishlist" class="far fa-heart"></button></div>
            </div>
        </div>
    </div>
</div>

{{--
<div class="product-card standard">
    <div class="product-media">
        <div class="product-img"><img src={{$item->get_thumbnail()}} alt="product"></div>
        <div class="cross-vertical-badge product-badge"><i class="fas fa-clipboard-check"></i><span>recommend</span>
        </div>
    </div>
    <div class="product-content">a
        <ol class="breadcrumb product-category">
            <li><i class="fas fa-tags"></i></li>
            <li class="breadcrumb-item"><a href="{{url($item->category->slug)}}">{{$item->category->name}}</a></li>
        </ol>
        <h5 class="product-title"><a href="<?= URL::asset('/') ?>{{$item->slug}}">{{$item->name}}</a></h5>
        <div class="product-meta"><span><i class="fas fa-map-marker-alt"></i>{{$item->country->name}},
                {{$item->city->name}}</span><span><i
                    class="fas fa-clock"></i>{{$item->created_at->diffForHumans()}}</span></div>
        <div class="product-info">
            <h5 class="product-price">${{number_format($item->price)}}<span>/@if ($item->fixed_price)
                    Fixed
                    @else
                    Negotiable
                    @endif</span></h5>
            <div class="product-btn"><a href="{{url($item->slug)}}" title="Compare" class="fas fa-compress"></a><button
                    type="button" title="Wishlist" class="far fa-heart"></button></div>
        </div>
    </div>
</div>
--}}