<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class Products extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'slug',
        'price',
        'quantity',
        'content',
        'short_content',
        'thumb',
        'image',
        'status',
        'user_id',
        'cat_id',
        'brand',
        'unit',
        'limit_amount',
        'property',
        'onsale',
        'price_onsale',
        'trend',
        'recommend',
        'deals',
        'time_deal',
        'attr',
    ];
    const IMAGE = 'no-images.jpg';
    const ACTIVE = 1;
    const DISABLE = 0;

    public function order_item(){
        return $this->hasMany(Order_item::class);
    }

    public function votes(){
        return $this->hasMany(Vote::class, 'product_id');
    }

    public function count_vote(){
        $count = 0;
        $total = 0;
        if($this->votes->count() == 0){
            $result = 0;
        }else{
            foreach($this->votes as $item){
                if(!empty($item->level)){
                    $count += $item->level;
                    $total ++;
                }
            }
            if($count == 0){
                $result = 0;
            }else{
                $result = ($count / $total) * 20;
            }
        }
        return $result;
    }

    public function category(){
        return $this->belongsToMany(Category::class, 'category_relationships', 'product_id', 'cat_id');
    }


}
