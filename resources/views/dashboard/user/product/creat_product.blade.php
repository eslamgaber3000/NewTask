@extends('layout.app')




@section('title')
create product
@endsection

@section('content')


<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Add New Product</h2>

        </div>

        <div class="pull-right">

            {{-- <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a> --}}

        </div>

    </div>

</div>

     

{{-- @if ($errors->any())

    <div class="alert alert-danger">

        <strong>Whoops!</strong> There were some problems with your input.<br><br>

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif --}}

     

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">

    @csrf

    

     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Name:</strong>

                <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Name">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Detail:</strong>

                <input type="number" name="qty" class="form-control" value="{{old('qty')}}" placeholder="quantity">
               

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>price</strong>

                <input type="text" name="price" class="form-control" value="{{old('price')}}" placeholder="price">
               

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Image:</strong>

                <input type="file" name="image" class="form-control" placeholder="image">

            </div>

        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>category</strong>

                <select name="category_id" id="" class="form-control">

                    @foreach ($categories as $category )
                        
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
               

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center my-3">

                <button type="submit" class="btn btn-primary">Submit</button>

        </div>

    </div>

     

</form>

@endsection

