<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    // Relationship to Recipe
    public function recipe() {
    return $this->belongsTo(Recipe::class, 'recipe_id');
    }
        
    // Relationsip to User
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
