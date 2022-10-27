@extends('layouts.app')

@section('title')
{{ $category->meta_title }}
@endsection

@section('meta_keyword')
{{ $category->meta_keyword }}
@endsection

@section('meta_description')
{{ $category->meta_description }}
@endsection

@section('content')
    <div class="row">
        <livewire:customer.product.index :category="$category" :products="$products" />
        </div>
    </div>
</div>

@endsection
