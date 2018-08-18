<?php


namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $fillable = [];
  protected $guarded = [];

  public static function allInArray(){
    $categories = Category::all();
    $cats = array();
    foreach ($categories as $category) {
      $cats[$category->id] = $category->name;
    }
    return $cats;
  }


  public function image() {
    return  $this->hasOne('Modules\Image\Entities\Image','type_id')->where('type',2);
  }

  public function products() {
    return  $this->hasMany('Modules\Product\Entities\Product');
  }

  public function scopeGetCategory($query,$slug){
    return $query->where('slug',$slug)->first();
  }

  public function scopeGetAllRelatedCategories($query,$slug) {
    return $query->where('head_category_id',$this->getCategory($slug)->id)->get();
  }


  public  function getCategoryIds($slug) {
    $categories = $this->getAllRelatedCategories($slug);
    $id = [];
    foreach($categories as $category) {
      if($cats = $this->getAllRelatedCategories($category->slug)) {
        foreach($cats as $cat) {
          $id[] = $cat->id;
        }
        $id[] = $category->id;
    }
    $id[] = $category->id;
    }
    return $id;
  }

  }
