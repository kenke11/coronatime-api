<?php

namespace Tests\Unit;

use Illuminate\Console\Scheduling\Event;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdatingStatisticTest extends TestCase
{
	use RefreshDatabase;

	/**
	 * @test
	 */
	public function avaliable_in_the_scheduler()
	{
		$schedule = app()->make(Schedule::class);

		$events = collect($schedule->events())->filter(function (Event $event) {
			return stripos($event->command, 'command:update-statistics');
		});

		if ($events->count() == 0)
		{
			$this->fail('No events found');
		}

		$events->each(function (Event $event) {
			$this->assertEquals('0 0 * * *', $event->expression);
		});
	}
}
