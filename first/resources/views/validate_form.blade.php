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

    {{-- {{dump($page)}} --}}
        {{-- @if ($errors->any())
          <div class="mt-3 alert alert-primary container" role="alert">
              <ul class="list-group list-unstyled">
                    @foreach ($errors->all() as $value)
                    <li class="">{{$value}}</li>
                    @endforeach
                </ul>
          </div>
        </>
        @endif --}}


    @switch($page)
        @case('add')
        <h1 class="text-uppercase fw-bold text-center mt-5">ADD User Form</h1>
            <form class="container mt-5" action="{{route('addvalidateuser')}}" method="post">
                @csrf
                @method('post')
                <div class="row">
                    <div class="mb-3 col">

                        @error('username')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                        <br/>
                        <label for="name" class="form-label fw-bold">Name :- </label>
                        <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" aria-describedby="willrememberyou_name"/>
                        <div id="willrememberyou_name" class="form-text">We Will Know</div>
                    </div>
                    <div class="mb-3 col">

                        @error('useremail')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                        <br/>
                        <label for="email" class="form-label fw-bold">Email :- </label>
                        <input name="useremail" type="email" class="form-control @error('useremail') is-invalid @enderror" aria-describedby="willrememberyou_email"/>
                        <div id="willrememberyou_email" class="form-text">We Will Not Share Email</div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        @error('usercity')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                        <br/>
                        <label for="city" class="form-label fw-bold">City :- </label>
                        <input name="usercity" type="city" class="form-control @error('usercity') is-invalid @enderror" aria-describedby="willrememberyou_city"/>
                        <div id="willrememberyou_city" class="form-text">We Will know where you live</div>
                    </div>
                    <div class="mb-3 col">
                        @error('userage')
                        <span class="text-danger">
                                {{$message}}
                        </span>
                        @enderror
                        <br/>
                        <label for="age" class="form-label fw-bold">Age :- </label>
                        <input name="userage" type="number" class="form-control @error('userage') is-invalid @enderror" aria-describedby="willrememberyou_age"/>
                        <div id="willrememberyou_age" class="form-text">We Will know where you live</div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary fw-bold">add User</button>
            </form>
            @break
        @case('update')
        <h1 class="text-uppercase fw-bold text-center mt-5">Update User Form</h1>
            @if($data)

                <form class="container mt-5" action="{{route('updatevalidateuser')}}" method="post">
                    @csrf
                    @method('PUT')
                    @foreach ($data as $data)
                        <div class="row">
                            <input type="hidden" name="user_id" value="{{$data->id}}">
                            <input type="hidden" name="user_created_at" value="{{$data->created_at}}">
                            <div class="mb-3 col">
                                <label for="name" class="form-label fw-bold">Name :- </label>
                                <input name="username" type="text" class="form-control" value="{{$data->username}}" aria-describedby="willrememberyou_name"/>
                                <div id="willrememberyou_name" class="form-text">We Will Know</div>
                            </div>
                            <div class="mb-3 col">
                                <label for="email" class="form-label fw-bold">Email :- </label>
                                <input name="useremail" type="email" class="form-control" value="{{$data->useremail}}" aria-describedby="willrememberyou_email"/>
                                <div id="willrememberyou_email" class="form-text">We Will Not Share Email</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col">
                                <label for="city" class="form-label fw-bold">City :- </label>
                                <input name="usercity" type="city" class="form-control" value="{{$data->usercity}}" aria-describedby="willrememberyou_city"/>
                                <div id="willrememberyou_city" class="form-text">We Will know where you live</div>
                            </div>
                            <div class="mb-3 col">
                                <label for="age" class="form-label fw-bold">Age :- </label>
                                <input name="userage" type="age" class="form-control" value="{{$data->userage}}" aria-describedby="willrememberyou_age"/>
                                <div id="willrememberyou_age" class="form-text">We Will know where you live</div>
                            </div>
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary fw-bold">Update User</button>
                </form>
            @endif
            @break
        @case('delete')
            <h1 class="text-uppercase fw-bold text-center mt-5">DELETE User Form</h1>

            <div class="container">

                <form action="{{route('deletevalidateuser')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="row">
                        <input type="hidden" name="user_id" value="{{$data[0]->id}}">
                        <h1>YOU REALLY WANT TO DELETE {{$data[0]->username}} ???  </h1>
                        <button type="submit" class="btn btn-primary fw-bold">YES</button>
                    </div>
                </form>
            </div>
            @break

        @default

    @endswitch

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
