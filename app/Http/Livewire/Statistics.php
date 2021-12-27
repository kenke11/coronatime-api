<?php

namespace App\Http\Livewire;

use App\Models\Country;
use Livewire\Component;

class Statistics extends Component
{
	public $search;

	protected $queryString = [
		'search',
	];

	public function render()
	{
		return view('livewire.statistics', [
			'countries' => Country::search($this->search)
				->get(),
		]);
	}
}
