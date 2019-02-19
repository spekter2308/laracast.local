<?php

namespace App;

use App\Events\ProjectCreated;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	/*protected $fillable = [
		'title',
		'description',
	];*/

	protected $guarded = [];

	protected $dispatchesEvents = [
		'created' => ProjectCreated::class
	];

	public function tasks()
	{
		return $this->hasMany(Task::class);
	}

	public function addTask($task)
	{
		return $this->tasks()->create($task);
	}

	public function owner()
	{
		return $this->belongsTo(User::class);
	}

}
