
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Qr-Show Mark</title>

</head>
<body>
    <center>
        <div class="container mt-4" >
            <div class="row w-80 justify-content-center " >
                <!--form method="POST" action=""-->
                @foreach ($marks as $mark)
                    <table class="table table-striped table-hover border border-dark">
                        <thead style="font-family: var(--bs-body-font-family);" class="fs-5 ">
                            <tr>
                                <th >Name: {{auth()->user()->name}}</th>
                                <th >Regester Number: {{auth()->user()->regno}}</th>
                                <th >Semester: {{$semester}}</th>
                                <th class="text-center" colspan="2">Exam: {{$mark->exam}}</th>
                            </tr>

                            <tr>
                                <th colspan="2">Subject</th>
                                <th colspan="2" class="text-center">Marks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    @foreach ($subjects as  $key=>$subject )
                                        <h6>{{$subject->name}}</h6>
                                    @endforeach
                                </td>
                                <td colspan="2" class="text-center">

                                    <h6 >{{$mark->mark1}}</h6>
                                    <h6 >{{$mark->mark2}}</h6>
                                    <h6>{{$mark->mark3}}</h6>
                                    <h6>{{$mark->mark4}}</h6>
                                    <h6>{{$mark->mark5}}</h6>
                                    <h6>{{$mark->mark6}}</h6>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                @endforeach
            </div>
        </div>
    </center>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>


