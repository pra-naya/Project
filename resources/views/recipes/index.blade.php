<x-layout>

    <div class="m-5">
        @if (count($recipes) == 0)
            <p>No Recipes Found</p>
        @else
            <div class="my-2">
                @if ($filter)
                    {{ $filter }}
                @else
                    <h2>New Recipes</h2>
                @endif
                
            </div>
        @endif
    
    
        <div class="row">
            
            @foreach ($recipes as $recipe)
                <div class="col-3 my-2">
                    <x-recipe-card :recipe="$recipe" />
                </div>
            @endforeach

    
        </div>
        </div>
    
        {{-- <div>
            {{$recipes->links()}}
        </div> --}}

    </div>
    

</x-layout>