@props(['recipe'])



<h2>{{$recipe->title}}</h2>
<div>
    <img src="https://images.pexels.com/photos/3926123/pexels-photo-3926123.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="..." class="ratio ratio-9x16 h-100 w-50 mx-auto ">
    <!-- <img src="{{ asset('storage/RecipeImages/'.$recipe->image) }}"  alt="..." style="width: 45vw;" > -->
</div>
<div class="my-3">Recipe by: <a href="/?user={{$recipe->user->id}}"> {{$recipe->user->name}}</a></div>
{{-- <div class="mt-5 "> --}}
    <div class="my-3">
        {{$recipe->description}}
    </div>
    <p class="my-3">Nutritional Values: {{$recipe->n_value}}</p>
    <div class="my-3">
        Tags:
        @php
            $tags = $recipe->tag->pluck('name')->toArray();
            $tagsLink = [];
            foreach ($tags as $tag) {
                        $link = "<a href=' /?tag=".$tag."' class=' bg-success badge text-decoration-none ' >".$tag."</a>";
                        array_push($tagsLink, $link);
                    }
                    
                    echo implode(' , ', $tagsLink);
        @endphp
        </div>
{{-- </div> --}}