@props(['recipe'])

<div class="container d-flex py-1" style="background-color: #f0f0f0" >
    <div >
        {{-- <img src="https://images.pexels.com/photos/3926123/pexels-photo-3926123.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"  alt="..." style="width: 45vw;" > --}}
        <img src="{{ asset('storage/RecipeImages/'.$recipe->image) }}"  alt="..." style="width: 45vw;" >
    </div>
    <div class="mt-5 mx-5">
        <h2>{{$recipe->title}}</h2>
        
        <div class="my-4">
            {{$recipe->description}}
        </div>

        <div class="my-4">Recipe by: <a href="/?user={{$recipe->user->id}}"> {{$recipe->user->name}}</a></div>
        
        <div class="my-4">
            {{-- <x-recipe-tags :tags="$recipe->tag" />    --}}
            Tagged with: 
            {{-- {{ implode(', ', $recipe->tag->pluck('name')->toArray()) }}  --}}
            @php
                $tags = $recipe->tag->pluck('name')->toArray();
                $tagsLink = [];
                foreach ($tags as $tag) {
                    // $link = "<a href='/?tag='".$tag."'>".$tag."</a>";
                    $link = "<a href='/?tag=".$tag."'  >".$tag."</a>";
                    array_push($tagsLink, $link);
                }
                
                echo implode(', ', $tagsLink);
            @endphp
        </div>
        
        <p class="my-4">Nutritional Values: {{$recipe->n_value}}</p>
        
    </div>
</div>