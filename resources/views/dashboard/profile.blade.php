@php
use App\Models\category;
$cats = category::all();
@endphp

@extends('layouts.layout2')

@section('title', 'Page Title')

@section('head')
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/custom/ad-post.css') }}">
@endsection

@section('content')
    <section class="adpost-part">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 ">
                    <form class="adpost-form">
                        <div class="adpost-card">
                            <div class="adpost-title">
                                <h3 class="text-secondary text-center mb-3">STEP 1/2</h3>
                                <h3>profile</h3>
                            </div>
                            <ul class="adpost-plan-list">
                                @foreach ($cats as $item)
                                    <li>
                                        <div class="adpost-plan-content">
                                            <h6>{{ $item->name }} </h6>
                                            <p>{{ $item->description }}</p>
                                        </div>
                                        <div class="adpost-plan-meta">
                                            <a href="{{ url("post-ad/".$item->slug) }}" class="btn btn-outline"><span>Select</span></a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
