@props(['recipe'])

{{-- @dd($recipe->image) --}}


<a href="/recipes/{{$recipe['id']}}">
<div class="card">
    {{-- <img src="https://images.pexels.com/photos/3926123/pexels-photo-3926123.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="card-img-top" alt="..." > --}}
    <img src="{{ asset('storage/RecipeImages/'.$recipe->image) }}"  class="card-img-top" alt="..."  >
    <div class="card-body">
      <h5 class="card-title">{{Str::limit($recipe->title, 25)}}</h5>
      <p class="card-text">{{$recipe->user->name}}</p>

    </div>
</div>
</a>
