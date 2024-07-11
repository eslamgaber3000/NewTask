@extends('layout.app')

@section("title")
    login
@endsection


@section("content")
@include('errors')
<div class="row m-5">

    <form class="w-100" action="{{route('user.login')}}" method="post">
        @csrf
        <label for="">Email</label>
        
        <input type="text" name="email" id=""> 
        
        <label for="email">password</label>   
        <input type="password" name="password" id="">  
        <button type="submit"class="btn btn-success">login</button>  
    </form> 
</div>

@endsection
 