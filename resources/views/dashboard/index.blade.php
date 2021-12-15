@php
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
if(isset($_GET['delete'])){
$delete = (int)($_GET['delete']);
if($delete>0){

$model = Product::find($delete);
if($model!=null){
$model->delete();
}
header('Location: '.url('dashboard'));
die();
}
}
@endphp
@extends('layouts.layout')

@section('title', 'Page Title')

@section('head')
<link rel="stylesheet" href="{{ URL::asset('/assets/css/custom/my-ads.css') }}">
<link rel="stylesheet" href="{{ url('vendor/laravel-admin/sweetalert2/dist/sweetalert2.css')}}">
@endsection

@section('content')
@php
$user_id = Auth::id();
$products = Product::where('user_id', $user_id)->get();
@endphp


@include('layouts.dashboard-header');
<section class="myads-part">
    <div class="container">

        @if (count($products)<1) <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 ">
                    <div class="card dash-header-card pt-0">
                        <div class="card-body text-center">

                            <img src="<?= URL::asset('assets/') ?>/images/empty-box.png" width="120"
                                alt="empty-box.png">

                            <h2 class="h4 text-center mt-4">You don't have any service yet.</h2>
                            <p class="text-center">Click the "Post servicee" now button to post your service.</p>
                            <a href="<?= URL::asset('/post-ad') ?>" class="btn btn-inline mt-4 mb-2 post-btn"><i
                                    class="fas fa-plus-circle"></i><span>post your service</span></a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @else




    <div class="row">
        @foreach ($products as $item)
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
            <div class="product-card">
                <div class="product-media">
                    <div class="product-img"><img src="{{$item->get_thumbnail()}}" alt="{{$item->get_thumbnail()}}">
                    </div>
                     
                </div>
                <div class="product-content">
                    
                    <h5 class="product-title"><a href="{{ url($item->slug) }}">{{ $item->name }}</a></h5>
                    <div class="product-meta"><span><i class="fas fa-map-marker-alt"></i>{{ $item->category->name }},
                            {{ $item->category->name }}</span><span><i class="fas fa-clock"></i>{{ $item->updated_at
                            }}</span></div>
                    <div class="product-info">
                        <h5 class="product-price">${{ $item->price }}<span>/starting price</span></h5>
                        <div class="product-btn">
                            <a href="javascript:;" data-id="{{$item->id}}" title="Delete"
                                class="fas fa-trash text-danger delete"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
    </div>
</section>
@endsection

@section('foot')
<script src="{{ url('vendor/laravel-admin/sweetalert2/dist/sweetalert2.min.js') }} " type="text/javascript"></script>
<script>
    window.addEventListener('DOMContentLoaded', (event) => {

        $url = '<?= url('dashboard') ?>?delete=';
        $('.delete').unbind('click').click(function() {

            var id = $(this).data('id');
            Swal.fire({
                title: 'Are you sure you want to delete this product?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Delete product',
                denyButtonText: `Don't delete product`,
            }).then((result) => { 
                if(result.value){
                    window.location.href = $url+id; 
                }
                
            });

            


        });

    });

</script>
@endsection