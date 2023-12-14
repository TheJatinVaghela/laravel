<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<div>
    <!-- The only way to do great work is to love what you do. - Steve Jobs -->
    <h1>UPDATE IT HERE OR <a href="{{route('todo',$data->user_id)}}">CLICK</a>HERE TO GO BACK</h1>
    <form action="{{route('yesUpdateTodo')}}" method="post">
        @csrf
        @method('PUT')
            <div class="mb-3">
                <input type="text" name="todo_id" value="{{$data->todo_id}}" hidden/>
                <input type="text" name="user_id" value="{{$data->user_id}}" hidden/>
                <label for="userTodo" class="form-label">todo :- </label>
                <input type="text" class="form-control" name="todo" id="userTodo" value="{{$data->todo}}"/>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

