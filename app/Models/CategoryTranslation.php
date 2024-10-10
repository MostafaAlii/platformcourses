<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    use HasFactory;
    protected $table = 'categories_translation';
    protected $fillable = ['name','description','category_id','locale'];
    public $timestamps = false;


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    

}
