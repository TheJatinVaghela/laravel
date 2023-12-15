<div>
    <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
    {{-- {{dump($data->name)}} --}}

</div>

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
                    <th>DETAIL</th>

                </tr>
                @foreach ($data as $key =>$value )
                <tr id="container-{{$value->id}}">
                    <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->description}}</td>
                </tr>
                @endforeach
            </table>
            {{-- <style>
                svg {
                    width: clamp(2% , 3% + 2rem , 10%);
                }
            </style> --}}
            <div class="mt-5 container-sm">
                {{-- link for reffrence https://laravel.com/docs/10.x/pagination#paginator-instance-methods --}}
                {{-- {{$data->links()}} --}}
                {{$data->links('pagination::bootstrap-5')}}

                <span>Totoal :- {{$data->currentPage()}}</span>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <a class="btn btn-primary" href="{{route("/")}}">home</a>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
