
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>ADD Users</title>
</head>
<body class="container">
    <div class="container">
        <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
        <center>

            <h1>Add User Form</h1>
        </center>

        <form class="m-5" action="{{route('adduser')}}" method="POST">
            @csrf
            @method('POST')
                <div class="mb-3 input-group">
                    <label class="form-label" for="username">Name
                        <input class="form-control" type="text" name="username" id="username" value="" >
                    </label>
                </div>
                <div class="mb-3 input-group">
                    <label class="form-label" for="useremail">Email
                        <input class="form-control" type="text" name="useremail" id="useremail" value="" >
                    </label>
                </div>
                <div class="mb-3 input-group">
                    <label class="form-label" for="userpassword">Password
                        <input class="form-control" type="text" name="userpassword" id="userpassword" value="" >
                    </label>
                </div>
                <button class="btn btn-primary" type="submit">ADD</button>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
