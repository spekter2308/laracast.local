@extends('layout')

@section('content')
	<h1 class="title">Main page for project</h1>

	<div class="navbar-item has-dropdown is-hoverable">
		<a class="navbar-link is-arrowless">
			Project controller menu for edit
		</a>
		<div class="navbar-dropdown">
			@foreach ($projects as $project)
				<a class="navbar-item" href="/projects/{{ $project->id }}">
					{{ $project->title }}
				</a>
			@endforeach
				<a class="button is-link" href="/projects/create">Create new project</a>
		</div>
	</div>

@endsection