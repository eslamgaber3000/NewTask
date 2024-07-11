@extends('layout.app')

@section('content')

@if (session()->has('success'))

<div class="alert alert-success text-center">{{  session()->get('success')     }}</div>

@endif
@include('errors')


<form method="post" action="{{route('subcategory.make')}}" enctype="multipart/form-data">

    @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">name</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" name="sub_name" placeholder="your name">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">descripthion</label>
     <textarea   class="form-control" id="exampleFormControlInput1" placeholder="enter descripthion"  name="sub_desc" id="" cols="30" rows="10"></textarea>
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

    <div class="form-group m-3">
        <button type="submit" class="btn btn-info">add sub</button>
    </div>
  </form>
    @endsection

    @section('title')
      sub category
    @endsection