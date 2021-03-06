<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Task;
use App\Project;

class ProjectTasksController extends Controller
{
	public function update(Task $task)
	{
		\request()->has('completed') ? $task->complete() : $task->incomplete();

		return back();
	}

	public function store(Project $project)
	{
		$validated = \request()->validate([
			'description' => 'required'
		]);
		$project->addTask($validated);

		return back();
	}
}
