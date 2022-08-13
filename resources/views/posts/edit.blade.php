@extends('layouts.appp')
@section('form')
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
@if($errors->any())
<div class="alert alert-danger">

  {{ implode('', $errors->all(':message')) }}
</div>
@endif
    <form action="{{route('posts.update',['id'=>$post['id']])}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">title</label>
    <input type="text" class="form-control" name="title" id="name" aria-describedby="emailHelp" value="{{$post['title']}}"></input>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">body</label>
    <input type="text" class="form-control" name="body" id="exampleInputPassword1" value="{{$post['body']}}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
    </form>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
@endsection