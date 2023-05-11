<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>College project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-dark navbar-expand-sm bg-dark">
        
        <a class="navbar-brand " href="#">Estudiante</a>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{route('logout');}}" class="nav-link">Logout</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('courses.create');}}" class="nav-link">Register Course</a>
                </li>

                <li class="nav-item">
                    <a href="{{route('courses.index')}}" class="nav-link">Notas</a>
                </li>

            </ul>
    </nav>
    <div class="container" style="margin-top: 10px">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>