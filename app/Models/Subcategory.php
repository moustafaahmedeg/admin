<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Subcategory
 * 
 * @property int $id
 * @property string $name_ar
 * @property string $name_en
 * @property string $photo
 * @property bool $status
 * @property int $categories_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Category $category
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
class Subcategory extends Model
{
	protected $table = 'subcategories';

	protected $casts = [
		'status' => 'bool',
		'categories_id' => 'int'
	];

	protected $fillable = [
		'name_ar',
		'name_en',
		'photo',
		'status',
		'categories_id'
	];

	public function category()
	{
		return $this->belongsTo(Category::class, 'categories_id');
	}

	public function products()
	{
		return $this->hasMany(Product::class);
	}
}
