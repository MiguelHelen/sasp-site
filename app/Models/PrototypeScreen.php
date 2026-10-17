<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PrototypeScreen extends Model
{
    protected $fillable = ['title', 'route', 'description', 'image_path', 'display_order'];

    public function features(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class);
    }

    /**
     * URL pública da imagem, com espaços e acentos codificados.
     * Uso nas views: $screen->image_url
     */
    protected function imageUrl(): Attribute
    {
        return Attribute::get(function () {
            if (! $this->image_path) {
                return null;
            }

            $encoded = implode('/', array_map('rawurlencode', explode('/', $this->image_path)));

            return asset($encoded);
        });
    }
}