<x-layout>
    <div class="container">

        <h2 class="my-4">Edit Recipe</h2>
        <form method="POST" action="/recipes/{{$recipe->id}}">
            
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$recipe->title}}">
                @error('title')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{$recipe->description}}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tags" class="form-label">Tags:</label>
                {{-- <input type="text" class="form-control" id="tags" name="tags" value="{{ implode(', ', $selectedTags) }}"> --}}
                <input type="text" class="form-control" id="tags" name="tags" value="{{ implode(', ', $tags->pluck('name')->toArray()) }}">
                @error('tags')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
    
            <div class="mb-3">
                <label for="n_value" class="form-label">Nutritional Value:</label>
                <input type="text" class="form-control" id="n_value" name="n_value" value="{{$recipe->n_value}}">
            </div>
    
            <div class="mb-3">
                <label for="ingredients" class="form-label">Ingredients:</label>
                <textarea class="form-control" id="ingredients" name="ingredients" rows="5">{{$recipe->ingredients}}</textarea>
                @error('ingredients')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="steps" class="form-label">Steps:</label>
                <textarea class="form-control" id="steps" name="steps" rows="5">{{$recipe->steps}}</textarea>
                @error('steps')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
    
            <button type="submit" class="btn btn-primary">Save Changes</button>	
    
        </form>
    </div>
</x-layout>