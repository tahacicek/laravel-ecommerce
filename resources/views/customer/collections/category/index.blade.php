@extends('layouts.app')
@section('title', 'Tüm Kategoriler')
@section('content')


            <div class="slider">
                <button id="prev" class="btn">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                </button>
                <div class="card-content">
                    <!-- Card -->
                    @forelse ($categories as $category)

                    <div class=" col-md-4">
                        <div class="cards">
                            <h4>4.5</h4>
                            <i class="fa fa-heart" aria-hidden="true"></i>
                            <a class="text-dark" target="_blank" href="{{ url("/kategori/" . $category->slug) }}">
                                <div class="card-img">
                                    <img src="{{ asset($category->image) }}"
                                        alt="">
                                    <img class="blur"
                                        src="{{ asset($category->image) }}"
                                        alt="">
                                </div>
                                <div class="card-text">
                                    <h2>{{ $category->name }}</h2>
                                    <p>{{$category->description}}
                                    <p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Card End -->
                    @empty
                    <div class="card">
                        <h4>4.5</h4>
                        <i class="fa fa-heart" aria-hidden="true"></i>
                        <div class="card-img">
                            <img src="https://images.unsplash.com/photo-1666829211276-976426e9bdf2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNHx8fGVufDB8fHx8&auto=format&fit=crop&w=500&q=60"
                                alt="">
                            <img class="blur"
                                src="https://images.unsplash.com/photo-1666829211276-976426e9bdf2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNHx8fGVufDB8fHx8&auto=format&fit=crop&w=500&q=60"
                                alt="">
                        </div>
                        <div class="card-text">
                            <h2>Yok</h2>
                            <p>I show you how to make a card group easily and very functional with the use of flexbox and
                                its magic and JavaScript.
                            <p>
                        </div>
                    </div>
                    @endforelse








                </div>
                <button id="next" class="btn">
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </button>
            </div>



@endsection
