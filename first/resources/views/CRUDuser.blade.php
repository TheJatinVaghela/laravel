<!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUDusers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-6">
            <h1 class="m-4">All CRUDusers List </h1>
            <table class="table table-dark">
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>DETAIL</th>
                    <th>DELETE</th>
                    <th ><a class="btn btn-danger" href="{{route('all_delete_crudusers')}}">All DELETE</a></th>
                    <th ><a class="btn btn-success" href="{{route('add_cruduser')}}">Add user</a></th>
                </tr>
                @foreach ($crudusers as $key =>$value )
                <tr id="container-{{$value->id}}">
                    <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td><a class="btn btn-info" href="{{route("crudusers_singleUser",$value->id)}}">Details</a></td>
                    <td ><a class="btn btn-danger" href="{{route("delete_crudusers",$value->id)}}">delete</a></td>
                    <td ><a class="btn btn-warning" href="{{route("update_crudusers",$value->id)}}">update</a></td>
                    <td ><a class="btn btn-warning" href="{{route("fromupdate_crudUser",$value->id)}}">form update</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

<a href="{{route("insert_crudusers")}}">Add Users</a>
{{-- <a href="{{route("update_crudusers")}}">update Users</a> --}}
{{-- <a href="{{route("delete_crudusers")}}">delete Users</a> --}}


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

