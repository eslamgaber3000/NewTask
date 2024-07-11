@extends('layout.app')

@section('title')
    Home
@endsection



@section('content')

<div class="table-responsive table-responsive-sm">
    <table class="table table-sm my-custom-padding">
      <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Desc...</th> 
      <th scope="col"> belongs to category</th> 
      <th scope="col">action</th> 
  
    </tr>
  </thead>
  <tbody>
    @foreach ($subCategories as $subCategory)
    <tr>
      <th scope="col">{{$loop->iteration}}</th>
      <td>{{ $subCategory->name }}</td> 
      <td>{{ Str::limit($subCategory->desc, 20) }}...</td>
     <td><a href="#">{{$subCategory->category->name}}</a></td>
      
      <td>
        <a href="{{url("dashboard/show/$subCategory->id")}}" class="btn btn-sm btn-info">
          <i class="fas fa-edit "></i> show </a>
      </td>
    </tr>
    @endforeach
  </tbody>
  </table>
  </div>
    
@endsection
