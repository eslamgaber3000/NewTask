@extends('layout.app')

@section('content')

@include('success')
@include('errors')


<form method="post" action="{{url("dashboard/update/$subCategory->id")}}" enctype="multipart/form-data">
@method('PUT')
    @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">name</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" name="sub_name" value="{{$subCategory->name}}" placeholder="your name">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">descripthion</label>
     <textarea   class="form-control" id="exampleFormControlInput1" placeholder="enter descripthion"  name="sub_desc" id="" cols="30" rows="10">{{$subCategory->desc}}</textarea>
    </div>
    <div class="form-group my-3">
     
    <select name="category_id"   class="form-control" id="">
      @foreach ($categories as $category )
        
      <option value="{{ $category->id}}">{{ $category->name}}</option>
      @endforeach
    </select>
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">image</label>
      <input type="file" class="form-control" id="exampleFormControlInput1" name="image" placeholder="your name">
    </div>
    
    <div class="form-group">
      <label for="exampleFormControlInput1">old Image</label>
     <input type="image" src="{{asset("subCategories/$subCategory->image")}}" class="w-25"  alt="">
    </div>

    <div class="form-group m-3">
        <button type="submit" class="btn btn-info">update sub</button>
    </div>
  </form>
    @endsection

    @section('title')
    edit sub
    @endsection