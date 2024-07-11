@extends('layout.app')

@section('title')
    show
@endsection


@section('content')
    
<div class="container mt-5 p-2 bg-wite">
    @include('success')
      <div class="card product-card mb-3">
          <div class="row no-gutters">
            <div class="col-md-4">
              {{-- <a href="{{ url("product/$product->id") }}"> --}}
                <img src="{{ asset("subcategories/$subCategory->image") }}" class="card-img rounded product-img" style="width: 175px; " alt="{{ $subCategory->name }}">
              </a>
            </div>
            <div class="col-md-8">
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="product-details">
                  <h5 class="card-title">{{ $subCategory->name }}</h5>
                  {{-- <h5 class="card-title">{{ $product->category->name }}</h5> --}}
                  <p class="card-text">{{ $subCategory->desc }}</p>
                  <p class="card-text">{{ $subCategory->category->desc }}</p>
                 
                </div>
                
                </div>
              </div>
            </div>
          </div>
        </div>
  </div>
@endsection