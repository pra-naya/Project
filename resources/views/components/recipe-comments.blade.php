@props(['comments', 'recipe_id'])

<div class="p-2" style="background-color: #f0f0f0">
<h3>Comments:</h3>
<div>
    <form action="/comments" method="POST">
        @csrf
        <div>
            <input type="hidden" name="recipe_id" value="{{$recipe_id}}">
        </div>
    
        <div class="mb-3">
            @auth
                <label for="data" class="form-label">Comment as <strong>{{auth()->user()->name}}</strong></label>
                <input type="text" class="form-control" name="data" placeholder="Leave a Comment" required>
                <button type="submit" class="btn mt-1" style="background-color: #2b3035; color: white">Post</button>	
                @endauth
                @guest    
                <label class="form-label">You must <a href="/login">login</a> to comment</label>
                <input type="text" class="form-control" placeholder="Leave a Comment" disabled>
                <button type="submit" class="btn  mt-1" disabled>Post</button>	
            @endguest
        </div>
      
    </form>
</div>

<div class="mt-3">
    @foreach ($comments as $comment)
        <p>
            <strong>{{$comment->user->name}}</strong><br>
            {{$comment->data}}
            @php
                if ($comment->user->id == auth()->id()) {
                    echo '
                    <form action="/comments/'.$comment->id.'/delete" method="POST">
                        '.csrf_field().'
                        '.method_field('delete').'
                        <button role="button">Delete</button>
                    </form>
                    ';
                }
            @endphp
        </p>
    @endforeach
</div>
</div>