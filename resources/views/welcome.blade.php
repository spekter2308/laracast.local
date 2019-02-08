@extends('layout')

@section('title', 'Home')


@section('content')
	<h1>My {{ $foo ?? 'hello' }} website {{ $fo ?? 'hello2'}}</h1>

	<ul>
		@foreach($tasks as $task)
			<li>{{ $task }} </li>
		@endforeach
	</ul>
@endsection
