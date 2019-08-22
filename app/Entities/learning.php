<?php

namespace App\Entities;

use App\Series;
use Redis;

trait Learning
{
	public function completeLesson($lesson)
	{

		Redis::sadd("user:{$this->id}:series:{$lesson->series->id}", $lesson->id);
	}
	//
	public function percentageCompletedForSeries($series)
	{
		$numberOfLessonsInSeries = $series->lessons->count();
		$numberOfCompletedLessons = $this->getNumberOfCompletedLessonsForASeries($series);

		return ($numberOfCompletedLessons / $numberOfLessonsInSeries) * 100;
	}
	//
	public function getNumberOfCompletedLessonsForASeries($series)
	{
		return count($this->getCompletedLessonsForASeries($series));
	}
	//
	public function getCompletedLessonsForASeries($series)
	{
		return Redis::smembers("user:{$this->id}:series:{$series->id}");
	}
	public function hasStartedSeries($series)
	{
		return $this->getNumberOfCompletedLessonsForASeries($series) > 0;
	}
	public function getCompletedLessons($series)
	{
		// 1, 2, 4
		return Lesson::whereIn(
			'id',
			$this->getCompletedLessonsForASeries($series)
		)->get();
	}

	//104

	public function hasCompleteLesson($lesson)
	{
		return in_array($lesson->id, $this->getCompletedLessonsForASeries($lesson->series));
	}

	public function seriesBeingWatched()
	{
		$keys = Redis::keys("user:{$this->id}:series:*");
		$seriesIds = [];
		foreach ($keys as $key) :
			$seriesId = explode(':', $key)[3];
			array_push($seriesId, $seriesId);
		endforeach;
		$seriesCollection = collect($seriesIds);
		return $seriesCollection->map(function ($id) {
			return Series::find($id);
		});
	}
}
