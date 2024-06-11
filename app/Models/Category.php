<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    /**
     * Get all of the fotos for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fotos(): HasMany
    {
        return $this->hasMany(Foto::class);
    }
}
