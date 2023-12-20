
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUDusers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body class="">
<div class="container">
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
    {{-- {{dump($data)}} --}}
    <table class="table table-bordered border-primary table-dark table-striped">
        <thead>
            <tr class="table-info">
              <th scope="col">id</th>
              <th scope="col">name</th>
              <th scope="col">email</th>
              <th scope="col">city</th>
              <th scope="col">age</th>
              <th scope="col">update</th>
              <th scope="col">delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $key =>$value)

            <tr>
              <th scope="row">{{$value->id}}</th>
              <td>{{$value->username}}</td>
              <td>{{$value->useremail}}</td>
              <td>{{$value->usercity}}</td>
              <td>{{$value->userage}}</td>
              <td><a class="btn btn-primary" href="rout"></a></td>
              <td><a class="btn btn-primary" href="rout"></a></td>
            </tr>
            @endforeach
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
