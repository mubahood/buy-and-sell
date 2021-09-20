@extends('layouts.layout2')

@section('title', 'Page Title')

@section('head')
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/custom/ad-post.css') }}">
@endsection

@section('content')
    @php
    use App\Models\category;
    $seg = request()->segment(2);
    $cats = category::where('slug', $seg)->firstOrFail();
    @endphp
    <section class="adpost-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <form method="POST" action="{{ url('post-ad') }}" enctype="multipart/form-data" class="adpost-form">
                        @csrf
                        <input type="text" name="category_id" id="category_id" value="{{ $cats->id }}" hidden>
                        <div class="adpost-card">
                            <div class="adpost-title">
                                <h3>Creating a new Ad in {{ $cats->name }}</h3>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group"><label class="form-label">Property Title</label>
                                        <input type="text" value="{{ old('name') }}" name="name"  minlength="2"
                                            class="form-control" placeholder="Type your property title here">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group"><label class="form-label">product image</label>
                                        <input type="file" name="images[]" value="{{ old('images') }}"
                                            accept=".jpeg,.jpg,.png,.gif" class="form-control" multiple >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group"><label class="form-label">Product
                                            Category</label><select class="form-control  custom-select">
                                            <option selected>Select Category</option>
                                            <option value="1">property</option>
                                            <option value="2">electronics</option>
                                            <option value="3">automobiles</option>
                                        </select></div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group"><label class="form-label">Price</label><input
                                            type="number" class="form-control" name="price"
                                            placeholder="Enter your pricing amount">
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <ul class="form-check-list">
                                            <li><label class="form-label">price condition</label></li>
                                            <li><input type="radio" value="{{ old('price_condition') }}"
                                                    name="price_condition" class="form-check" id="fix-check"><label
                                                    for="fix-check" class="form-check-text">fixed</label></li>
                                            <li><input type="radio" value="{{ old('price_condition') }}"
                                                    name="price_condition" class="form-check" id="nego-check"><label
                                                    for="nego-check" class="form-check-text">negotiable</label></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <ul class="form-check-list">
                                            <li><label class="form-label">ad category</label></li>
                                            <li><input type="radio" value="{{ old('ad_category') }}" name="ad_category" class="form-check" id="sale-check"><label
                                                    for="sale-check"  class="form-check">sale</label></li>
                                            <li><input type="radio"  value="{{ old('ad_category') }}" name="ad_category" class="form-check"  id="rent-check"><label for="rent-check"
                                                    class=" ">rent</label></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <ul class="form-check-list">
                                            <li><label class="form-label">product condition</label></li>
                                            <li><input type="radio" value="{{ old('product_category') }}" name="product_category" class="form-check" id="use-check"
                                                    name="condition"><label for="use-check"
                                                    class="form-check-text  ">used</label></li>
                                            <li><input type="radio"  value="{{ old('product_category') }}" name="product_category" class="form-check" id="new-check"><label
                                                    for="new-check" class="form-check-text  ">new</label></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group"><label class="form-label">ad
                                            description</label><textarea class="form-control"
                                            placeholder="Describe your message" name="description" value="{{ old('description') }}" name="description" ></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="adpost-card pb-2">
                            <div class="adpost-agree">
                                <div class="form-group"><input type="checkbox" class="form-check"></div>
                                <p>Send me Trade Email/SMS Alerts for people looking to buy mobile handsets in www By
                                    clicking "Post", you agree to our <a href="#">Terms of Use</a>and <a href="#">Privacy
                                        Policy</a>and acknowledge that you are the rightful owner of
                                    this item and using Trade to find a genuine buyer.</p>
                            </div>
                            <div class="form-group text-right"><button class="btn btn-inline"><i
                                        class="fas fa-check-circle"></i><span>published your ad</span></button></div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="account-card alert fade show">
                        <div class="account-title">
                            <h3>Safety Tips</h3><button data-dismiss="alert">close</button>
                        </div>
                        <ul class="account-card-text">
                            <li>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit debitis odio perferendis
                                    placeat at aperiam.</p>
                            </li>
                            <li>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit debitis odio perferendis
                                    placeat at aperiam.</p>
                            </li>
                            <li>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit debitis odio perferendis
                                    placeat at aperiam.</p>
                            </li>
                            <li>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit debitis odio perferendis
                                    placeat at aperiam.</p>
                            </li>
                            <li>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit debitis odio perferendis
                                    placeat at aperiam.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
