<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="D:\picocss\pico-1.5.10\css\pico.min.css">

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> --}}
    
    <title>RecipeHub</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">

            <h1><a class="navbar-brand" href="/">RecipeHub</a></h1>
            <ul>
            @auth
                <li class="nav-item">
                    <form method="POST" action="/logout">
                    @csrf
                    <button class="nav-link">Logout</button>
                </form>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/abc">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/recipes/create">Post Recipe</a>
                </li>
            @endauth
            @guest
                <li class="nav-item"><a class="nav-link" href="/login"> Login</a></li>
                <li class="nav-item"><a class="nav-link" href="/register"> Register</a></li>
            @endguest
            </ul>

        </div>
    </nav>

    {{$slot}}


    

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> --}}

</body>
</html>