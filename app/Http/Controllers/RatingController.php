<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    // Store Rating
    public function store(Request $request) {

        // if(Auth::check()){
        //     $user_rating = Rating::where('user_id', auth()->id())->where('recipe_id', $request->recipe_id)->first();

        //     if($user_rating){
        //         $user_rating->delete();
        //     }

        //     Rating::create([
        //         'value' => $request->value,
        //         'recipe_id' => $request->recipe_id,
        //         'user_id' => auth()->id()
        //     ]);
        // }
        $user_rating = null;
        if(Auth::check()){
            $user_rating = Rating::where('user_id', auth()->id())->where('recipe_id', $request->recipe_id)->first();

            if($user_rating){
                $user_rating->delete();
            }

            $user_rating = Rating::create([
                'value' => $request->value,
                'recipe_id' => $request->recipe_id,
                'user_id' => auth()->id()
            ]);
        }
        
        $recipe_ratings = [
            'avg_rating' => round(Rating::avg('value'), 2),
            'user_rating' => $user_rating->value,
            'count' => Rating::count()
        ];
        
        // dd($recipe_ratings);

        return response()->json($recipe_ratings);
        // return response('Test');
    }
}
