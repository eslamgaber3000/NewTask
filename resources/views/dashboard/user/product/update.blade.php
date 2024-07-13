@extends("layout.app")

@section('title')
    update product
@endsection

@section('content')
   
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.all') }}"> Back</a>
        </div>
    </div>
</div>
 


<form action="{{url("product/edit/$product->id")}}" method="POST" enctype="multipart/form-data"> 
    @csrf
    @method('PUT')
 
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Name">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>quantity:</strong>
                <input type="text" name="qty" value="{{ $product->qty }}" class="form-control" placeholder="quantity">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>price:</strong>
                <input type="text" class="form-control" value="{{ $product->price }}" name="price" placeholder="price">
            </div>
        </div>


         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control" placeholder="image">
                <img src="{{asset("products/$product->image")}}" width="100px">
            </div>
        </div> 

        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>category</strong>

                <select name="category_id" id="" class="form-control">
                <option value="{{$product->category->id}}">{{$product->category->name}}</option>

                    @foreach ($categories as $category )
                        
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
               

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
 
</form>
@endsection


