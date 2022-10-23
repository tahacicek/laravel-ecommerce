@extends('layouts.app')
@section('title', 'Ana Sayfa')
@section('content')
        <div class="main">
            <header>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Shop</a></li>
                    <li><a href="#">Accessories</a></li>
                    <li>
                        <h1>Ecommerce</h1>
                    </li>
                    <li><a href="#">Collections</a></li>
                    <li><a href="#">Brands</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </header>
            <div class="cd-slider">
                <ul>
                    @foreach ($sliders as $key => $slider)
                        <li>
                            <div class="image" style="background-image:url({{ asset($slider->image) }});"></div>
                            <div class="content">
                                <h1>{{ $slider->description }}</h1>
                                <a href="#">{!! $slider->title !!}</a>
                                <div>
                                    <a href="#" class="btn btn-slider">
                                       <i class="fa fa-shopping-bag" aria-hidden="true"></i> Get Now
                                    </a>
                                </div>
                            </div>

                        </li>
                    @endforeach
                </ul>
            </div>
            <!--/.cd-slider-->
        </div>
@endsection
