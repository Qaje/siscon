<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','barcode','cost','price','stock',
    'alerts','image','category_id',
    'mark_id','industry_id','modelies_id',
	'type_id','texture_color_id','size_id',
	'plant_color_id','sole_color_id',
	'sole__types_id',
	'covering__types_id',
	'covering_material_id'];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function getImagenAttribute()
    {	
    	 if($this->image == null)
    	 	return 'noimg.jpg';

    	if(file_exists('storage/products/'. $this->image))
    		return $this->image;
    	else
    		return 'noimg.jpg';
    }
}
