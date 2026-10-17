<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Feature extends Model
{
    protected $fillable = ['title', 'description', 'status'];

    public function prototypeScreens(): BelongsToMany
    {
        return $this->belongsToMany(PrototypeScreen::class);
    }
}