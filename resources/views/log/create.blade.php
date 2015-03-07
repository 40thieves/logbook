@extends('app')

@section('content')

	@if (count($errors) > 0)
		<div>
			<strong>Error</strong>
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<form method="POST" action="/log">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<label for="date">Date</label>
		<input type="date" name="date" id="date">

		<label for="region">Region</label>
		<input type="text" name="region" id="region">

		<label for="members">Members</label>
		<input type="text" name="members" id="members">

		<label for="description">Route Description</label>
		<textarea name="description" id="description"></textarea>

		<label for="leader">Leader?</label>
		<input type="checkbox" name="leader" id="leader">

		<div>
			<p>Status</p>

			<label for="status-easy">Easy</label>
			<input type="radio" name="status" id="status-easy" value="1">
			<label for="status-medium">Medium</label>
			<input type="radio" name="status" id="status-medium" value="2">
			<label for="status-hard">Hard</label>
			<input type="radio" name="status" id="status-hard" value="3">
		</div>
	</form>

@endsection