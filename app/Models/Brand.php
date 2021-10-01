<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Brand
 * 
 * @property int $id
 * @property string $name_ar
 * @property string $name_en
 * @property string $photo
 * @property bool $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
class Brand extends Model
{
	protected $table = 'brands';

	protected $casts = [
		'status' => 'bool'
	];

	protected $fillable = [
		'name_ar',
		'name_en',
		'photo',
		'status'
	];

	public function products()
	{
		return $this->hasMany(Product::class);
	}
}
