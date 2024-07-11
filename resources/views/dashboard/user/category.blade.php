@extends('layout.app')

@section('content')



@include('errors')
@include('success')


<form method="post" action="{{route('category.make')}}" enctype="multipart/form-data">

    @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">name</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" name="cat_name" placeholder="your name">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">descripthion</label>
     <textarea   class="form-control" id="exampleFormControlInput1" placeholder="enter descripthion"  name="desc" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">image</label>
      <input type="file" class="form-control" name="image" id="">
    </div>
    <div class="form-group m-3">
        <button type="submit" class="btn btn-info">create category</button>
    </div>
  </form>
    @endsection

    @section('title')
    category
    @endsection