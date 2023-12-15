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


<div class="container ">
    <div class="row">
        <div class="col-6 w-100">
            <h1 class="m-4">All Data List </h1>
            <table class="table table-dark w-100">
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>CITY</th>

                </tr>
                @foreach ($data as $key =>$value )
                <tr id="container-{{$value->id}}">
                    <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->cityname}}</td>
                </tr>
                @endforeach
            </table>
            <div class="mt-5 container-sm">
                <span class="mb-5">Pagination</span>
                {{-- <div class="mt-3">{{$data->links('pagination::bootstrap-5')}}</div> --}}
                <div class="mt-3">{{$data->links()}}</div>
            </div>
        </div>
    </div>
    <!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
    <a class="btn btn-primary" href="{{route('/')}}">HOME</a>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
