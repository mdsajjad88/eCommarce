<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>creating</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
    <div class="conteiner">
        <div class="row">
            <div class="col-4">
                <div>
                    <img src="{{url('image/tshirt.jpeg')}}" height="160px" width="150px" alt="">
                </div>
            </div>
            <div class="col-4">
                <h2 class="text-center">Ajax Operation </h2>
                <hr>
                @if(Session::has('success'))
                <p class="alert alert-success">{{Session::get('success')}}</p>
                @endif
                <form action="" enctype="multipart/form-data" id="myform" method="post">
                   @csrf
                    <div>
                        <label for="">Enter Your Name </label>
                        <input type="text" required name="name" class="form-control" placeholder="Example Mr. John Abraham">
                    </div>
                    <div>
                        <label for="">Enter Your G-mail Address </label>
                        <input type="email" required name="email" placeholder="Example john@gmail.com" class="form-control">
                        @error('email')
                        <p class="alert alert-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="">Select Your Gender </label> <br>
                        <input type="radio" required name="gender" value="Male"> Male
                        <input type="radio" required name="gender" value="Female">Female
                        <input type="radio" required name="gender" value="Others">Others
                    </div>
                    <div>
                        <label for="">Select Your Last Degree</label>
                        <select name="degree"  id="" class="form-control">
                            <option required value="">Select One</option>
                            <option required value="SSC">S.S.C</option>
                            <option required value="HSC">H.S.C </option>
                            <option required value="BSC">B.S.C</option>
                            <option required value="MSc">M.Sc </option>
                        </select>
                    </div>
                    <div>
                        <label for="">Choose Your Photo</label>
                        <input type="file" required class="form-control" name="photo">
                    </div>
                    <div>
                        <br>
                        <input type="submit" value="Submit" id="submit" class="btn btn-success form-control">
                    </div>
                    <div>
                        <div id="output"></div>
                    </div>
                </form>
            </div>
            <div class="col-4">
                @php 
                $users = DB::table('ajaxes')->get();
                @endphp
                @foreach($users as $user)
               
                <img src="{{Storage::url($user->photo)}}" height="100px" width="100px" alt="20000">
                @endforeach
                <div id="showing">

                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
            $("#myform").submit(function(e) {
                e.preventDefault();
                var form = $('#myform')[0];
                var data = new FormData(form);


                $.ajax({
                    type: "post",
                    url: "{{route('datapost')}}",
                    data:data,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                    $('#myform').trigger('reset');
                        //console.log(data.result);
                        $("#output").append('<p class="alert alert-success">'+data.result+'</p>');
                        response.data.forEach(function(data) {
                    $('#showing').append('<img src={{Storage::url('+$data.photo+')}} height="100px" width="100px" alt="20000">');
                });
                    },
                    error: function(e) {
                        console.log(e.responseText);
                    }
                });
            });

        });
    </script>
</body>

</html>