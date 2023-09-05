<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $table = 'subcategories';
    protected $fillable = [
        'naziv',
        'opis',
    ];

    public function products()
    {
        return $this->hasMany(Category::class);
    }
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
