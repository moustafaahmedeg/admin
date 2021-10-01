<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * 
 * @property int $id
 * @property string $name_ar
 * @property string $name_en
 * @property float $price
 * @property int $quantity
 * @property string $photo
 * @property string $detials_ar
 * @property string $detials_en
 * @property bool $status
 * @property int $subcategory_id
 * @property int $brand_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Brand $brand
 * @property Subcategory $subcategory
 *
 * @package App\Models
 */
class Product extends Model
{
	protected $table = 'products';

	protected $casts = [
		'price' => 'float',
		'quantity' => 'int',
		'status' => 'int',
		'subcategory_id' => 'int',
		'brand_id' => 'int'
	];

	protected $fillable = [
		'name_ar',
		'name_en',
		'price',
		'quantity',
		'photo',
		'detials_ar',
		'detials_en',
		'status',
		'subcategory_id',
		'brand_id'
	];


	public $timestamps = false;

	public function brand()
	{
		return $this->belongsTo(Brand::class);
	}

	public function subcategory()
	{
		return $this->belongsTo(Subcategory::class);
	}


	public function getPhotoAttribute($value) {
		return asset('/storage/' . $value);
	}
}
