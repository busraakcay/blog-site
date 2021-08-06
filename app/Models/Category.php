<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract; // #### ekle
use Astrotomic\Translatable\Translatable; // ##### ekle

//class Category extends Model

class Category extends Model implements TranslatableContract
{
    //use HasFactory; 

    use HasFactory, Translatable; // ##### ekle

    protected $table = 'categories';

    protected $guarded = [];

    public $translatedAttributes = ['name']; // ##### ekle

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

// public static function bootTranslatable(): void 
//  { 
//      static::saved(function (Category $category) { 
//          /* @var Translatable $model */ 
//          return $category->saveTranslations(); 
//      }); 
//  }
}
