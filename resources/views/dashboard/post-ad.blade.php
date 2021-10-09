@extends('layouts.layout2')

@section('title', 'Page Title')

@section('head')
<link rel="stylesheet" href="{{ URL::asset('/assets/css/custom/ad-post.css') }}">
@endsection

@section('content')
@php
use App\Models\category;
use App\Models\Country;
use App\Models\City;
$seg = request()->segment(2);
$cats = category::where('slug', $seg)->firstOrFail();
$countries = Country::all();
$cities = City::all();
@endphp
<section class="adpost-part pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <form method="POST" action="{{ url('post-ad') }}" enctype="multipart/form-data" class="adpost-form">
                    @csrf
                    <input type="text" name="category_id" id="category_id" value="{{ $cats->id }}" hidden>
                    <div class="adpost-card">
                        <div class="row border-bottom pb-3 mb-3">
                            <div class="col-md-6">
                                <div class="">
                                    <h4>Fill in the details</h4>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class=" text-right text-dark">
                                    <img width="20" src="{{URL::asset('storage')."/".$cats->image}}"> {{ $cats->name }}
                                </div>
                            </div>
                        </div>

                        <div class="row " style="margin-top: 2rem">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">

                                @foreach ($cats->attributes as $item)
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group"><label class="form-label">Service Title</label>
                                            <input type="text" value="{{ old('name') }}" required name="name"
                                                minlength="2" class="form-control"
                                                placeholder="Which service do you offer?, start with, I will...">

                                            @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                <div class="row">


                                    <div class="col-lg-12">
                                        <div class="form-group"><label class="form-label">product image</label>
                                            <input type="file" name="images[]" required value="{{ old('images') }}"
                                                accept=".jpeg,.jpg,.png,.gif" class="form-control" multiple>
                                            @error('images')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="form-label">Country</label>
                                            <select name="country_id" required class="form-control  custom-select"
                                                id="countries">
                                                <option selected>Select Country</option>
                                                @foreach ($countries as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('country_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="city_id" class="form-label">City</label>
                                            <select name="city_id" class="form-control  custom-select" required
                                                id="city_id">
                                                <option selected>Select city</option>
                                                @foreach ($cities as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('city_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group"><label class="form-label" for="price">Starting
                                                Price</label><input type="number" class="form-control" id="price"
                                                required name="price" placeholder="Enter your pricing amount">
                                            @error('price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group"><label class="form-label">Service
                                                description</label><textarea class="form-control"
                                                placeholder="Describe your service here" required
                                                value="{{ old('description') }}" name="description"></textarea>
                                            @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-2"></div>
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
                                    class="fas fa-check-circle"></i><span>publish service</span></button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        const countries = $("#countries");
        const cities = JSON.parse('<?php echo json_encode($cities); ?>');
        countries.change(function(event) {
            console.clear()
            alert(cities.length);
            const country_id = event.currentTarget.options.selectedIndex;
            cities.forEach(element => {
                console.log(element);
                if (country_id == element.country_id) {
                    countries.selectedIndex
                }
            });
            console.log(event.currentTarget.options.selectedIndex);

        }); 
    });
</script>