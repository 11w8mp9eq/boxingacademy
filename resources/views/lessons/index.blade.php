@extends('layouts.app') @section('content')
<div class="content">

	<!-- Page title -->
	<div class="title m-b-md">
		<p style="color: green; font-size: 15px;">{!! session('mssg') !!}</p>
		Lessons
	</div>
	
	<!-- Displaying lessons -->
	<div class="lesson">
		@foreach($lessons as $lesson)
		<div>
			<a href="{{ route('lessons.show', $lesson->id)}}" ><button class="button2">{{ $lesson->subject }}</button></a>
		</div>
		@endforeach
	</div>
</div>
@endsection
