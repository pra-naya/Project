@props(['recipe'])



<h2>{{$recipe->title}}</h2>
<div>
    <img src="{{ asset('storage/RecipeImages/'.$recipe->image) }}"  alt="..." style="width: 45vw;" > 
</div>
<div class="my-3">Recipe by: <a href="/?user={{$recipe->user->id}}"> {{$recipe->user->name}}</a></div>
{{-- <div class="mt-5 "> --}}
    <div class="my-3">
        {{$recipe->description}}
    </div>
    <p class="my-4">Nutritional Values: {{$recipe->n_value}}</p>
    <div class="my-4 d-flex justify-content-between ">
        <div>

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
        <div class="print btn btn-secondary"><i class="fa fa-print" aria-hidden="true"></i>
 Print</div>
</div>
