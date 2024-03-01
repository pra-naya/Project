<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/b1960b074d.js" crossorigin="anonymous"></script>

  <meta name="csrf-token" content="{{ csrf_token() }}">


  <style>
    .print {
      /* /* font-size: 14px; */
      font-weight: bold;

      /* letter-spacing: 1px; */
      /* line-height: 130%; */
      /* height: 50px; */
      padding: 5px 30px;
      background-color: #ededed;
      border-radius: 100px;
      color: #000;
    }

    .star {
      border: 0;
      background-color: white;
      font-size: 30pt;
      color: #cccccc;
    }

    .star:hover {
      /* font-color: yellow; */
      color: #ff9800;
    }
  </style>

  <title>RecipeHub</title>
</head>

<body>

  <nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary sticky-top" data-bs-theme="dark">
    <div class="container">
      <a class="navbar-brand" href="/">RecipeHub</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          @auth

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{auth()->user()->name}}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/recipes/create">New Recipe</a></li>
              <li><a class="dropdown-item" href="/abc">Profile</a></li>
              <li class="nav-item">
                {{-- <a class="nav-link active" href="#">Logout</a> --}}
                <form method="POST" action="/logout">
                  @csrf
                  {{-- <button class="nav-link">Logout</button> --}}
                  <button class="dropdown-item">Logout</button>
                </form>
              </li>
              {{-- <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
            </ul>
          </li>
          @endauth

          @guest
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/register">Sign up</a>
          </li>
          @endguest

        </ul>

        <form class="d-flex" action="/" method="GET" role="search">
          <input class="form-control me-2" type="search" placeholder="Search Recipes" aria-label="Search" name="search">
          <button class="btn btn-outline-light" type="submit">Search</button>
        </form>

      </div>
    </div>
  </nav>



  {{$slot}}




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>