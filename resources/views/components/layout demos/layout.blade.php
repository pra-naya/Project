<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="D:\picocss\pico-1.5.10\css\pico.min.css"> --}}

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <script src="https://kit.fontawesome.com/b1960b074d.js" crossorigin="anonymous"></script>

    <title>RecipeHub</title>
</head>
<body>
    <main class="container">
        {{-- <nav class="border-2-black">
            <ul>
                <li><h1><a href="/">RecipeHub</a></h1></li>
            </ul>
            <ul>
            @auth
                <li>
                    <form method="POST" action="/logout">
                    @csrf
                    <button >Logout</button>
                    </form>
                </li>
                <li>
                    <a role="button" href="/abc">Profile</a>
                </li>
                <li>
                    <a role="button" href="/recipes/create">Post Recipe</a>
                </li>
            @endauth
            @guest
                <li><a href="/login"> Login</a></li>
                <li><a href="/register"> Register</a></li>
            @endguest
            </ul>

        </nav> --}}

        <nav>
            <ul>
              <li><h1><a href="/">RecipeHub</a></h1></li>
            </ul>
            <ul>
                @auth
                <li>
                    <form method="POST" action="/logout">
                    @csrf
                    {{-- <button class="nav-link">Logout</button> --}}
                    <button style="height: 2em">Logout</button>
                    </form>
                </li>
                <li role="list" dir="rtl">
                    <a href="#" aria-haspopup="listbox">{{auth()->user()->name}}</a>
                    <ul role="listbox">
                      <li><a role="button" href="/abc">Profile</a></li>
                      <li><a role="button" href="/recipes/create">Post Recipe</a></li>
                    </ul>
                  </li>
            @endauth
            @guest
                <li><a href="/login"> Login</a></li>
                <li><a href="/register"> Register</a></li>
            @endguest
        
        
                </ul>
              </li>
            </ul>
          </nav>


    {{$slot}}


    

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> --}}
    </main>
</body>
</html>