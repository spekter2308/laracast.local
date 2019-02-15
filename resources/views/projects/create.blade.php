@extends('layout')

@section('content')

	<h1 class="title">Create a new project</h1>

	<form method="POST" action="/projects">
		@csrf

		<div class="field">
			<div class="control">
				<input type="text" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" name="title" placeholder="Project title" value="{{ old('title') }}" required>
			</div>
		</div>

		<div class="field">
			<div class="control">
				<textarea name="description" class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}" placeholder="Project description" required>{{ old('description') }}</textarea>
			</div>
		</div>

		<div class="field">
			<div class="control">
				<button type="submit" class="button is-link">Create Project</button>
			</div>
		</div>

		@include('errors')

	</form>
@endsection
