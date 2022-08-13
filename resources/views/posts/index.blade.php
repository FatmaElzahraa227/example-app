@extends("layouts.appp")
@section('content')
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
    <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>title</th>
            <th>body</th>
            <th>owner name</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <th>{{$post['id']}}</th>    
            <td> <a href="{{route('posts.edit',['id'=>$post['id']])}}">{{$post['title']}}</a></td>
            <td>{{$post['body']}}</td>
            <td>{{$post['user']['name']}}</td>
            <td>
                <a class="btn btn-primary" href="{{route('posts.edit',['id'=>$post['id']])}}">Edit</a>
                <form method="post" action="{{route('posts.destroy',['id'=>$post['id']])}}">
                    @method('DELETE')
                    @csrf 
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>

@endsection