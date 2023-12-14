<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>


<div>
    <!-- No surplus words or unnecessary actions. - Marcus Aurelius -->
    <form action="{{route('addTodo')}}" method="post">
        @csrf
        @method('POST')
        <input type="hidden" name="user_Id" value="{{$user}}">
        <div class="m-3">
            <label for="todo" class="form-label" >Add Todo</label>
            <input type="text" class="form-control"  name="todo" id="todo"/>
        </div>
        <br/>
        <div class="m-3">

            <button type="submit" class="btn btn-primery"  name="addTodo" id="addTodo">
                ADD
            </button>
        </div>

    </form>
</div>

<h1>TODOS</h1>
{{-- {{dump($todos)}} --}}
<div class="">
@foreach ($todos as $key => $value)
    <div class="inline-flex">
        <form action="" method="post">
            <input type="text" name="todo" value="{{$value->todo}}" disabled />
        </form>
        <form action="{{route('showupdateTodo')}}" method="post">
            @csrf
            <input type="text" name="todo_id" value="{{$value->id}}" hidden/>
            <input type="text" name="user_id" value="{{$value->user_id}}" hidden/>
            <input type="text" name="todo" value="{{$value->todo}}" hidden />
            <button type="submit" name="todoEdit" value="Edit">Edit</button>
        </form>
        <form action="{{route('deleteTodo')}}" method="post">
            @csrf
            @method('DELETE')
            <input type="text" name="todo_id" value="{{$value->id}}" hidden/>
            <input type="text" name="user_id" value="{{$value->user_id}}" hidden/>
            <input type="text" name="todo" value="{{$value->todo}}" hidden />
            <button type="submit" name="todoDelete" value="Delete">Delete</button>
        </form>
    </div>
    <br/>
@endforeach
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


