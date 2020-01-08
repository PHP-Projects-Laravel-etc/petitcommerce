<?php


namespace Modules\Category\Entities;
use Cache;
use Illuminate\Support\Facades\Redis as Lredis;
use Illuminate\Database\Eloquent\Model;

/**
* @mixin \Eloquent
* @package Modules\Category\Entities
 */

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

    /**
     * @param $query
     * @param $slug
     *
     * @return mixed
     */
    public function scopeGetCategory($query,$slug){
    return $query->where('slug',$slug)->first();
  }

    /**
     * @param $query
     * @param $slug
     *
     * @return mixed
     */
    public function scopeGetAllRelatedCategories($query,$slug) {
    return $query->where('head_category_id',$this->getCategory($slug)->id)->get();
  }


  public  function getCategoryIds($slug,$cache_name) {

    $id = Cache::rememberForever(/**
     * @return array
     */ $cache_name,function() use($slug){
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
  });
    return $id;
  }

  }
