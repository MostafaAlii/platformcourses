<?php
namespace App\Models;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends BaseModel implements TranslatableContract {
    use HasFactory , Translatable, SoftDeletes;
    protected $table = 'categories';
    // 2. To add translation methods
    protected $fillable =['parent'];
    // 3. To define which attributes needs to be translated
    public $translatedAttributes = ['name','description'];


    public function details() {
        return $this->hasMany(CategoryTranslation::class);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent');
    }

    // Get the children categories
    public function children()
    {
        return $this->hasMany(Category::class, 'parent');
    }

    public function translating($locale = null) {
        $locale = $locale ?? app()->getLocale();
        // Return the translation where the locale matches
        return $this->details()->where('locale', $locale)->first();
    }

}
