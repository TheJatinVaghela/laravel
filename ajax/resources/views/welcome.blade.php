<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <form action="{{route('add')}}" enctype="multipart/form-data" method="POST" id="addpost">
        @csrf
        @method("POST")
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputname1" class="form-label">name</label>
          <input type="name" name="name" class="form-control" id="exampleInputname1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

      <hr>

      <ol class="list-group list-group-numbered">
        <li class="list-group-item d-flex justify-content-between align-items-start">
          <div class="ms-2 me-auto">
              <h4 id="email-A"></h4>
              <div id="name-A" class="fw-bold"></div>
          </div>
          <span class="badge bg-primary rounded-pill">14</span>
        </li>
      </ol>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $('#addpost').on('submit',function(event){
                event.preventDefault();

                jQuery.ajax({
                    url:"{{route('add')}}",
                    data:jQuery("#addpost").serialize(),
                    type:"POST",

                    success:function(result){
                        // on success do somthing

                        jQuery('#addpost')[0].reset();
                        $('#email-A').append(result.data[0].email);
                        $('#name-A').append(result.data[0].name);
                        console.log(result);
                    }
                });
            });
        });
    </script>
</body>
</html>
