<x-layout>
    <div class="container">

        <h2 class="my-4">Create a New Recipe</h2>
        <form method="POST" action="/recipes" enctype="multipart/form-data">
            
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" placeholder="Name of your dish">
                @error('title')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="A short description of your dish">{{old('description')}}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="tags" class="form-label">Tags:</label>
                <input type="text" class="form-control" id="tags" name="tags" value="{{old('tags')}}" placeholder="Example: italian, pizza ...">
                @error('tags')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="n_value" class="form-label">Nutritional Value (per serving):</label>
                <input type="text" class="form-control" id="n_value" name="n_value" value="{{old('n_value')}}" placeholder="Example: Protein: 5 gms, Carbohydrate: 10gms ...">
            </div>
    
            <div class="mb-3">
                <label for="ingredients" class="form-label">Ingredients (with measurements):</label>
                <textarea class="form-control" id="ingredients" name="ingredients" rows="5" placeholder="Example: 2 cups Flour, 1/2 tsp Salt, 1/2 tsp Baking powder ...">{{old('ingredients')}}</textarea>
                @error('ingredients')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="steps" class="form-label">Steps:</label>
                <textarea class="form-control" id="steps" name="steps" rows="5" placeholder="Steps to prepare your dish">{{old('steps')}}</textarea>
                @error('steps')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image:</label>
                <input type="file" class="form-control" id="image" name="image" value="{{old('image')}}">
                @error('image')
                    <div class="invalid-feedback">{{$message}}</div>
                    @dd($message)
                @enderror
            </div>
    
            <button type="submit" class="btn btn-primary">Post</button>	
    
        </form>
    </div>
</x-layout>