<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
	use HasFactory, HasTranslations;

	public $translatable = ['country'];

	protected $guarded = [];

	public function scopeSearch($query, $term)
	{
		$term = "%$term%";
		$query->where(function ($query) use ($term) {
			$query->where('country->' . app()->getLocale(), 'like', $term);
		});
	}
}
