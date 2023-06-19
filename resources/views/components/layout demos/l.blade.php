<nav>
    <ul>
      <li><strong>RecipeHub</strong></li>
    </ul>
    <ul>
        @auth
        <li>
            <form method="POST" action="/logout">
            @csrf
            {{-- <button class="nav-link">Logout</button> --}}
            <button >Logout</button>
            </form>
        </li>
        <li role="list" dir="rtl">
            <a href="#" aria-haspopup="listbox">Dropdown</a>
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