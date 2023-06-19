<x-layout>
    <div class="container">

        <h2 class="my-4">Create a New Recipe</h2>
        <form method="POST" action="/recipes">
            
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                @error('title')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{old('description')}}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="tags" class="form-label">Tags:</label>
                <input type="text" class="form-control" id="tags" name="tags" value="{{old('tags')}}">
                @error('tags')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="n_value" class="form-label">Nutritional Value:</label>
                <input type="text" class="form-control" id="n_value" name="n_value" value="{{old('n_value')}}">
            </div>
    
            <div class="mb-3">
                <label for="ingredients" class="form-label">Ingredients:</label>
                <textarea class="form-control" id="ingredients" name="ingredients" rows="5">{{old('ingredients')}}</textarea>
                @error('ingredients')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="steps" class="form-label">Steps:</label>
                <textarea class="form-control" id="steps" name="steps" rows="5">{{old('steps')}}</textarea>
                @error('steps')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
    
            <button type="submit" class="btn btn-primary">Post</button>	
    
        </form>
    </div>
</x-layout>