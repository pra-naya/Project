<x-layout>
    <div class="container mt-5">
        @if (!$recipes)
            <p>No Recipes Found</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Recipe</th>
                        <th colspan="2" class="text-center"><center>Action</center></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recipes as $recipe)
                        <tr>
                            <td><a href="/recipes/{{$recipe->id}}" class="text-decoration-none">{{$recipe->title}}</a></td>
                            <td>
                                {{-- <a href="/recipes/{{$recipe->id}}/edit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square" ></i></a> --}}
                                <center><button class="btn btn-primary btn-transparent align-center" style="background-color: transparent; border: none;">
                                    <a href="/recipes/{{$recipe->id}}/edit"><i class="fa-solid fa-pen-to-square" style="color: #0d6efd;"></i></a>
                                </button></center>
                                
                            </td>
                            <td>
                                <form method="POST" action="/recipes/{{$recipe->id}}">
                                    @csrf
                                    @method('DELETE')
                                    {{-- <button type="submit" class="btn btn-danger btn-transparent"><i class="fa-sharp fa-solid fa-trash" ></i></button> --}}
                                    <center><button type="submit" class="btn btn-danger btn-transparent" style="background-color: transparent; border: none;">
                                        <i class="fa-sharp fa-solid fa-trash" style="color: #0d6efd;"></i>
                                    </button></center>
                                    
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-layout>
