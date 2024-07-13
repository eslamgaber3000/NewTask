@extends('layout.app')


@section("title")


all products
@endsection



@section("content")


     

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>all products </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>
    
 @include('success')
     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $loop->iteration  }}</td>
            <td><img src="{{asset("products/$product->image") }}" width="100px"></td>
            {{-- {{dd()}} --}}
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->qty }}</td>


            <td>
                <form action="{{ route('product.destroy',$product->id) }}" method="POST">
     
                    <a class="btn btn-info" href="{{ url("product/show/$product->id") }}">Show</a>
      
                    <a class="btn btn-primary" href="{{ route('product.edit',$product->id) }}">Edit</a>
     
                    @csrf 
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                 </form> 
            </td> 
        </tr>
        @endforeach
    </table>
    
    {{-- {!! $products->links() !!} --}}
        
@endsection

