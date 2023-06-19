<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'description', 'author', 'tags', 'n_value', 'ingredients', 'steps'];

    public function scopeFilter($query, array $filters) {
        if($filters['tag'] ?? false) {
            $tag = $filters['tag'];
            $query->whereHas('tag', function ($query) use ($tag) {
                $query->where('name', $tag);
            });

        }                                                       

        if ($filters['search'] ?? false) {
            $searchTerm = request('search');
        
            $query->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $searchTerm . '%')
                    ->orWhereHas('tag', function ($query) use ($searchTerm) {
                        $query->where('name', 'like', '%' . $searchTerm . '%');
                    })            
                    ->orWhereHas('user', function ($query) use ($searchTerm) {
                        $query->where('name', 'like', '%' . $searchTerm . '%');
                    });
            })
            ->orderByRaw("CASE 
                WHEN title LIKE '%" . $searchTerm . "%' THEN 1
                WHEN description LIKE '%" . $searchTerm . "%' THEN 2
                ELSE 3
                END");
        }
        

        if($filters['user'] ?? false) {
            $query->where('user_id', 'like', request('user'));
        }
    }

    // Relationship to User
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship to Comment
    public function comment() {
        return $this->hasMany(Comment::class, 'recipe_id');
    }

    // Relationship to Tag
    public function tag() {
        return $this->belongsToMany(Tag::class, 'recipes_tags');
    }

    // Relationship to Rating
    public function rating() {
        return $this->hasMany(Rating::class, 'recipe_id');
    }
}
