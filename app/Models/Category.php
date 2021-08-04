<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

//class Category extends Model

class Category extends Model implements TranslatableContract
{
    //use HasFactory;

    use HasFactory, Translatable;

    protected $table = 'categories';

    protected $guarded = [];

    public $translatedAttributes = ['name'];

    public function articles()
    {
        return $this->hasMany(Article::class, 'category_id', 'id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

//     protected static function boot()
// {
//     parent::boot();

//     // auto-sets values on creation
//     static::creating(function ($query) {
//         $query->status = $query->status ?? true;
//     });
// }
}
