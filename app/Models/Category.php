<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * 
 * @property int $id
 * @property string $name_ar
 * @property string $name_en
 * @property string $photo
 * @property bool $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Subcategory[] $subcategories
 *
 * @package App\Models
 */
class Category extends Model
{
	protected $table = 'categories';

	protected $casts = [
		'status' => 'bool'
	];

	protected $fillable = [
		'name_ar',
		'name_en',
		'photo',
		'status'
	];

	public function subcategories()
	{
		return $this->hasMany(Subcategory::class, 'categories_id');
	}
}
