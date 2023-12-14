<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>add CRUD user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <h1 class="text-uppercase fw-bold text-center mt-5">Update User Form</h1>
    <form class="container mt-5" action="{{route('form_update_cruduser')}}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <input type="hidden" name="user_id" value="{{$value->id}}">
            <input type="hidden" name="user_created_at" value="{{$value->created_at}}">
            <div class="mb-3 col">
                <label for="name" class="form-label fw-bold">Name :- </label>
                <input name="user_name" type="text" class="form-control" value="{{$value->name}}" aria-describedby="willrememberyou_name"/>
                <div id="willrememberyou_name" class="form-text">We Will Know</div>
            </div>
            <div class="mb-3 col">
                <label for="email" class="form-label fw-bold">Email :- </label>
                <input name="user_email" type="email" class="form-control" value="{{$value->email}}" aria-describedby="willrememberyou_email"/>
                <div id="willrememberyou_email" class="form-text">We Will Not Share Email</div>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label for="city" class="form-label fw-bold">City :- </label>
                <input name="user_city" type="city" class="form-control" value="{{$value->city}}" aria-describedby="willrememberyou_city"/>
                <div id="willrememberyou_city" class="form-text">We Will know where you live</div>
            </div>
            <div class="mb-3 col">
                <label for="age" class="form-label fw-bold">Age :- </label>
                <input name="user_age" type="age" class="form-control" value="{{$value->age}}" aria-describedby="willrememberyou_age"/>
                <div id="willrememberyou_age" class="form-text">We Will know where you live</div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary fw-bold">Update User</button>
    </form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
