@extends('layouts.app')
@section('title', 'Ana Sayfa')
@section('content')
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

    <div class="carousel-inner">
        @foreach ($sliders as $key => $slider)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
            @if ($slider->image)
            <img src="{{ asset($slider->image) }}" class="d-block w-100" alt="...">
            @endif
            {{-- <div class="carousel-caption d-none d-md-block">
              <h5>{{ $slider->title }}</h5>
              <p>{{ $slider->description }}</p>
            </div> --}}
            <div class="carousel-caption d-none d-md-block">
                <div class="custom-carousel-content">
                    <div class="col-md-4">

                            <h1>
                                {{ $slider->title }}
                            </h1>
                            <p>
                                <div class="col-md-12">
                                    {{ $slider->description }}
                                </div>
                            </p>
                    </div>
                    <div>
                        <a href="#" class="btn btn-slider">
                       <i class="fa fa-shopping-bag" aria-hidden="true"></i>     Get Now
                        </a>
                    </div>
                </div>
            </div>
          </div>



        @endforeach


    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
@endsection
