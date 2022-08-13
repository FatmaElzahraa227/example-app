@extends("layouts.apppp")
@section('content')

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>email</th>
                <th>posts number</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th>{{$user['id']}}</th>
                <td> <a href="{{route('users.edit',['id'=>$user['id']])}}">{{$user['name']}}</a></td>
                <td>{{$user['email']}}</td>
                <td>{{$user['posts_count']}}</td>
                <td>
                    <a class="btn btn-primary" href="{{route('users.edit',['id'=>$user['id']])}}">Edit</a>
                    <form method="post" action="{{route('users.destroy',['id'=>$user['id']])}}">
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