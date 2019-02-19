<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\ProjectCreated;

class ProjectsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		//$projects = Project::where('owner_id', auth()->id())->get(); //select * from projects where owner_id = id

		//dump($projects);
		return view('projects.index', [
			'projects' => auth()->user()->projects
		]);
	}

	public function create()
	{
		return view('projects.create');
	}

	public function show(Project $project)
	{
		//abort_unless(auth()->user()->owns($project), 403);
		//abort_if($project->owner_id !== auth()->id(), 403);

		//$this->authorize('update', $project);
		return view('projects.show', compact('project'));
	}

	public function edit(Project $project)
	{
		return view('projects.edit', compact('project'));
	}

	public function update(Project $project)
	{
		$project->update($this->validateProject());

		return redirect('/projects/'.$project->id);
	}

	public function store()
	{
		$validated = $this->validateProject();

		$validated['owner_id'] = auth()->id();

		Project::create($validated);

		return redirect('/projects');
	}

	public function destroy(Project $project)
	{
		$project->delete();
		return redirect('/projects');
	}

	protected function validateProject()
	{
		return \request()->validate([
			'title' => 'required|min:3|max:100',
			'description' => 'required|min:3',
		]);
	}
}
