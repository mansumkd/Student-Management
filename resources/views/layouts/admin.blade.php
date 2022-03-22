<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College|Admin Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="{{ asset('js/register.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>




    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">

</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline mt-3"><h2><b>Hi,{{Auth::user()->name}}</b>
                        </h2>
                        </span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start topnav " id="menu">
                        <li>
                            <a href="{{route('notifications')}}" class="nav-link px-0 align-middle {{(\Request::route()->getName() == 'notifications') ? 'active' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill text-light" viewBox="0 0 16 16">
                                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                                  </svg><span class="ms-1 d-none d-sm-inline"><b>Notifications</b></span></a>

                        </li>
                        <li>
                            <a href="{{route('students-list')}}"  class="nav-link px-0 align-middle {{(\Request::route()->getName() == 'students-list') ? 'active' : '' }}">
                                <svg class="text-light" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                                  </svg><span class="ms-1 d-none d-sm-inline"><b>Students</b></span> </a>

                        </li>
                        <li>
                            <a href="{{route('staffs-list')}}" class="nav-link px-0 align-middle {{(\Request::route()->getName() == 'staffs-list') ? 'active' : '' }}">
                                <svg class="text-light" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                                  </svg></i> <span class="ms-1 d-none d-sm-inline"><b>Staffs</b></span></a>
                        </li>
                        <li>
                            <a href="{{route('parents-list')}}" class="nav-link px-0 align-middle {{(\Request::route()->getName() == 'parents-list') ? 'active' : '' }}">
                                <svg class="text-light" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                                  </svg></i> <span class="ms-1 d-none d-sm-inline"><b>Parents</b></span></a>
                        </li>


                        <li>
                            <a href="{{ route('add-exam')}}" class="nav-link px-0 align-middle {{(\Request::route()->getName() == 'add-exam') ? 'active' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus text-light" viewBox="0 0 16 16">
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                  </svg><span class="ms-1 d-none d-sm-inline"><b>Add Exam</b></span></a>

                        </li>


                        <li>
                            <a href="{{ route('register-user')}}" class="nav-link px-0 align-middle {{(\Request::route()->getName() == 'register-user') ? 'active' : '' }}">
                                <svg class="text-light" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                  </svg><span class="ms-1 d-none d-sm-inline"><b>Add New Member</b></span></a>

                        </li>

                        <li>
                            <a href="{{ route('add-subjects')}}" class="nav-link px-0 align-middle {{(\Request::route()->getName() == 'add-subjects') ? 'active' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-file-plus" viewBox="0 0 16 16">
                                    <path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5V6z"/>
                                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                                </svg>
                                <span class="ms-1 d-none d-sm-inline"><b>Add Subjects</b></span>
                            </a>

                        </li>


                    </ul>
                    <hr>
                    <div class="dropdown pb-4">
                        <a href="#" class="d-flex align-items-center text-white bg-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                            <span class="d-none d-sm-inline mx-1">{{Auth::user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark bg-dark text-small shadow">

                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><form action="{{ route('logout')}}" method="POST" class="dropdown-item">
                                @csrf
                            <button class="btn text-light fw-bold" type="submit">SignOut</button>
                            </form></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col py-3 button">
                @yield('index')
                @yield('students')
                @yield('staffs')
                @yield('parents')
                @yield('register')
                @yield('notification')
                @yield('add-notification')
                @yield('add-exam')
                @yield('studentedit')
                @yield('staffedit')
                @yield('parentedit')
                @yield('add-subjects')
            </div>


        </div>


</body>


</html>
