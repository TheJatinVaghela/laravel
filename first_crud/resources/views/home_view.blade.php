<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div>

    <!-- The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk -->
    <form action="{{route('addTodo')}}" method="get">
        @csrf
        {{-- @method('POST') --}}
        <div class="mb-3">
            <label for="userName" class="form-label">Name :- </label>
            <input type="text" class="form-control" name="userName" id="userName"/>
        </div>
        <br>
        <div class="mb-3">
            <label for="userEmail" class="form-label">Email :- </label>
            <input type="text" class="form-control" name="userEmail" id="userEmail"/>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
