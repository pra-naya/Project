<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Recipe;
use App\Models\Comment;
use App\Models\Rating;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class RecipeController extends Controller
{
    // Show All Recipes
    public function index(Request $request)
    {
        $recipes = Recipe::Latest()
            ->filter($request->only(['tag', 'search', 'user']))
            ->get();
        $filter = null;
    
        if ($request->has('tag')) {
            $filter = 'Recipes with tag: ' . $request->input('tag');
        } elseif ($request->has('search')) {
            $filter = 'Search Results for: ' . $request->input('search');
        } elseif ($request->has('user')) {
            $user = User::findOrFail($request->input('user'));
            $filter = 'Recipes by: ' . $user->name;
        }
    
        return view('recipes.index', compact('recipes', 'filter'));
    }
    

    // Show Single Recipe
    public function show(Recipe $recipe) {
        $recipe = $recipe->with('user')->findOrFail($recipe->id);
        $comments = Comment::latest()->where('recipe_id', $recipe->id)->with('user')->get();
        $tags = $recipe->tags;

        $recipe_ratings = [
            'avg_rating' => round(Rating::avg('value'), 2),
            'count' => Rating::count()
        ];

        
        // dd($avg_rating);
        // dd($comments);

        if(Auth::check()) {
            $user_id = auth()->id();
            $recipe = Recipe::findOrFail($recipe->id);

            $rating = $recipe->rating()->where('user_id', $user_id)->value('value');

        }
        else{
            $rating = null;
        }

        // dd($rating);

        return view('recipes.show', [
            'recipe' => $recipe,
            'comments' => $comments,         
            'tags' => $tags,
            'recipe_ratings' => $recipe_ratings,
            'user_rating' => $rating
        ]);
    }

    // Show Recipes of the Logged in User
    public function abc() {
        $recipe = auth()->user()->recipe;
        return view('recipes.user')->with('recipes', $recipe);
    }

    // Show Create Form
    public function create() {
        return view('recipes.create');
    }

    // Store Recipe Data
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required', 
            'description' => 'required',
            'n_value' => 'required',
            'ingredients' => 'required',
            'steps' => 'required',
            'image' => ['required', 'image'],
        ]);

        // $imgPath = $request->image->store('RecipeImages', 'public');
        // dd(public_path("storage\\{$imgPath}"));

        // $file = Input::file($imgPath);
        // Image::make($file->getRealPath())->fit('200', '200')->save();
        
        $imgName = auth()->id().'_'.$formFields['title'].'.jpg';
        $imgPath = 'D:\RecipeHub\storage\app\public\RecipeImages\\'.$imgName;

        // $image = Image::make(public_path("storage\\{$imgPath}"))->fit('200', '200');
        $image = Image::make($request->file('image')->getRealPath())->fit('569', '375');
        // dd($image);
        $image->save($imgPath);

        // dd($request->image);


        // $image = Image::make($request->image)->fit('200', '200');
        // $image->save(public_path("storage\\{$imgName}"));

        $formFields['image'] = $imgName;
        
        $tags = $request->validate([                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
            'tags' => ' required'
        ]);

        $formFields['user_id'] = auth()->id();

        // dd($formFields['tags']);
        $recipe = Recipe::create($formFields);

        
        $tags = explode(',', $tags['tags']);

        foreach($tags as $tag) {
            if(ctype_space($tag[0])){
                $tag = substr($tag, 1);
            }

            $tagExists = Tag::where('name', $tag)->exists();
            
            if ($tagExists) {
                // dd($tags);
                $tag = Tag::where('name', $tag)->first();
            }
            else{
                $tag = Tag::create([
                    'name' => ucfirst($tag)
                ]);

            }
            
            $recipe->tag()->attach($tag->id);
            // dd($tag);

        }



        return redirect('/'); 
    }

    // Show Edit Form
    public function edit(Recipe $recipe) {
        $tags = $recipe->tag;
        // dd($tags);

        return view('recipes.edit', [
            'recipe' => $recipe,
            'tags' => $tags
        ]);

    }

    // Update Recipe Data
    public function update(Request $request, Recipe $recipe) {
        $formFields = $request->validate([
            'title' => 'required', 
            'description' => 'required',
            // 'tags' => 'required',
            'n_value' => 'required',
            'ingredients' => 'required',
            'steps' => 'required',
        ]);

        $recipe->update($formFields);

        $tagNames = $request->validate([
            'tags' => ' required'
        ]);

        $tagNames = explode(',', $tagNames['tags']);

        $tags = [];

        foreach($tagNames as $tag) {
            if(ctype_space($tag[0])){
                $tag = substr($tag, 1);
            }

            $tagExists = Tag::where('name', $tag)->exists();
            
            if ($tagExists) {
                // dd($tags);
                $tag = Tag::where('name', $tag)->first();
                $tag = $tag->id;
            }
            else{
                $tag = Tag::create([
                    'name' => ucfirst($tag)
                ]);
                $tag = $tag->id;
            }

            array_push($tags, $tag);
        }

        $recipe->tag()->sync($tags);

        // return back(); 
        return redirect('/recipes/'.$recipe->id); 
    }

    // Delete Recipe
    public function destroy(Recipe $recipe) {

        $recipe->delete();

        // return redirect('/');
        return back();
    }
}
