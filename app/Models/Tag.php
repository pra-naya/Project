<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    // Relationship to Recipe
    public function recipe () {
        return $this->belongsToMany(Recipe::class, 'recipes_tags');
    }
}
