
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Show Users</title>
</head>
<body class="container">
    <a class="btn btn-success" href="{{route('/')}}">Home</a>
    <div class="container">
        <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">password</th>
                <th scope="col">delete</th>
                <th scope="col">edit</th>
                <th scope="col">ADD</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($data as $value)

            <tr>
                <th scope="row">{{$value->id}}</th>
                <td>{{$value->username}}</td>
                <td>{{$value->useremail}}</td>
                <td>{{$value->userpassword}}</td>
                <td><a class="btn btn-danger" href="{{route('deleteuser',$value->id)}}">DELETE</a></td>
                <td><a class="btn btn-danger" href="{{route('edituser',$value->id)}}">Edit</a></td>
            </tr>
            @endforeach
            <tr>
                <th><a href="{{route('adduserform')}}">Add User</a></th>
            </tr>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
