<?php

namespace App\Http\Livewire;

use App\Models\Country;
use Livewire\Component;

class Statistics extends Component
{
	public $search;

	public $location = true;

	public $locationSort = 'ASC';

	public $locationChecked = false;

	public $newCase = false;

	public $newCaseSort;

	public $newCaseChecked = true;

	public $deaths = false;

	public $deathsSort;

	public $deathsChecked = true;

	public $recovered = false;

	public $recoveredSort;

	public $recoveredChecked = true;

	protected $queryString = [
		'search',
	];

	public function location()
	{
		$this->location = true;
		$this->newCase = false;
		$this->deaths = false;
		$this->recovered = false;

		if ($this->locationChecked)
		{
			$this->locationSort = 'ASC';
			$this->locationChecked = false;
		}
		elseif (!$this->locationChecked)
		{
			$this->locationSort = 'DESC';
			$this->locationChecked = true;
		}

		$this->deathsSort = null;
		$this->newCaseSort = null;
		$this->recoveredSort = null;
	}

	public function newCase()
	{
		$this->newCase = true;
		$this->location = false;
		$this->deaths = false;
		$this->recovered = false;

		if ($this->newCaseChecked)
		{
			$this->newCaseSort = 'ASC';
			$this->newCaseChecked = false;
		}
		elseif (!$this->newCaseChecked)
		{
			$this->newCaseSort = 'DESC';
			$this->newCaseChecked = true;
		}

		$this->locationSort = null;
		$this->deathsSort = null;
		$this->recoveredSort = null;
	}

	public function deaths()
	{
		$this->newCase = false;
		$this->location = false;
		$this->deaths = true;
		$this->recovered = false;

		if ($this->deathsChecked)
		{
			$this->deathsSort = 'ASC';
			$this->deathsChecked = false;
		}
		elseif (!$this->deathsChecked)
		{
			$this->deathsSort = 'DESC';
			$this->deathsChecked = true;
		}

		$this->newCaseSort = null;
		$this->locationSort = null;
		$this->recoveredSort = null;
	}

	public function recovered()
	{
		$this->newCase = false;
		$this->location = false;
		$this->deaths = false;
		$this->recovered = true;

		if ($this->recoveredChecked)
		{
			$this->recoveredSort = 'ASC';
			$this->recoveredChecked = false;
		}
		elseif (!$this->recoveredChecked)
		{
			$this->recoveredSort = 'DESC';
			$this->recoveredChecked = true;
		}

		$this->newCaseSort = null;
		$this->locationSort = null;
		$this->deathsSort = null;
	}

	public function render()
	{
		return view('livewire.statistics', [
			'countries' => Country::search($this->search)
				->when($this->location, function ($query) {
					return $query->orderBy('country->' . app()->getLocale(), $this->locationSort);
				})
				->when($this->newCase, function ($query) {
					return $query->orderBy('confirmed', $this->newCaseSort);
				})
				->when($this->deaths, function ($query) {
					return $query->orderBy('deaths', $this->deathsSort);
				})
				->when($this->recovered, function ($query) {
					return $query->orderBy('recovered', $this->recoveredSort);
				})
				->get(),
			'locationSort'  => $this->locationSort,
			'newCaseSort'   => $this->newCaseSort,
			'deathsSort'    => $this->deathsSort,
			'recoveredSort' => $this->recoveredSort,
		]);
	}
}
