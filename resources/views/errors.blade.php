@if ($errors->any())

@foreach ($errors->all() as $error )
    
<div class=" text-center alert alert-danger">{{$error}}</div>
@endforeach
    
@endif