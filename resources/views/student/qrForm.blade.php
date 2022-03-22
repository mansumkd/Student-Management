
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <title>Qr-Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>

  <center>
    <div class="container mt-5" >
        <div class="row w-100 justify-content-center " >
            <!--form method="POST" action=""-->
                <table class="table table-striped table-hover border border-dark">
                    <tbody style="font-family: var(--bs-body-font-family);" class="fs-5 ms-5">
                        <tr>
                            <td>Name</td>
                            <td >{{$student->name}}</td>
                        </tr>
                        <tr>
                            <td>Branch</td>
                            <td >{{$student->branch}}</td>
                        </tr>
                        <tr>
                            <td>Regester Number</td>
                            <td>{{$student->regno}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$student->email}}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{$student->phone}}</td>
                        </tr>
                        <tr>
                            <td>Parent-Name</td>
                            <td>{{$parent->name}}</td>
                        </tr>
                        <tr>
                            <td>Parent-Email</td>
                            <td>{{$parent->email}}</td>
                        </tr>
                        <tr>
                            <td>Parent-Phone</td>
                            <td>{{$parent->phone}}</td>
                        </tr>

                    </tbody>
                </table>
            <!--/form-->
            <div class="row">
                <div class="col-lg-4 ms-5">
                    <form method="POST" action="">
                         <div class="button">
                            <button type="button" class="btn btn-primary" style="width: 180px;">
                                <a href="{{route('/show-markfirst')}}"class="text-white text-decoration-none" type="submit">
                                    Show Mark
                                </a>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 ms-5">
                    <div class="button">
                        <button type="button" class="btn btn-primary" style="width: 180px;">
                            <a href="/qrForm/{{$student->id}}" class="text-white text-decoration-none">
                                Download-Resume
                            </a>
                        </button>
                  </div>
                </div>
            </div>

      </div>
  </div>
  </center>

  </body>
  </html>

