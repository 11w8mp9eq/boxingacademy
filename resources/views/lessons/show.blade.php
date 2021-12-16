@extends('layouts.app') @section('content')
<div class="content">

	<!-- Page title -->
	<div class="title m-b-md">{{ $lesson->subject }}</div>

	<!-- Page contents for guest -->
	@guest
	<div class="lesson">
		<div class="image">
			<img src="/img/{{ $lesson->img }}">
		</div>
		<div class="description">{{ $lesson->description }}</div>
		<div class="enrollment">
			<a href="{{ route('login') }}">{{ __('Login') }}</a> to sign up for
			the lesson.
		</div>
		
		<!-- Page contents for logged in users -->
		@else
		<div class="lesson">
	
			<!-- Image section -->
			<div class="image">
				<img src="/img/{{ $lesson->img }}">
			</div>
			
			<!-- Description section -->
			<div class="description">{{ $lesson->description }}</div>
			
			<!-- Enrollement input data section -->
			<div class="enrollment">
				<div class="container">
					<form action="/lessons" method="POST">
						@csrf
						<div class="row">
							<div class="col-25">
								<label for="name">Name</label>
							</div>
							<div class="col-75">
								<input type="text" name="name" id="name"
									value="{{ Auth::user()->name }}" required>
							</div>
						</div>
						<div class="row">
							<div class="col-25">
								<label for="email">E-mail</label>
							</div>
							<div class="col-75">
								<input type="text" name="email" id="email"
									value="{{ Auth::user()->email }}" required>
							</div>
						</div>
						<div class="row">
							<div class="col-25">
								<label for="type">Level</label>
							</div>
							<div class="col-75">
								<select name="level" id="level">
									<option value="Beginner">Beginner</option>
									<option value="Intermediate">Intermediate</option>
									<option value="Professional">Professional</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-25">
								<label for="remarks">Remarks</label>
							</div>
							<div class="col-75">
								<textarea id="remarks" name="remarks"
									placeholder="Write something.." style="height: 50px"></textarea>
							</div>
						</div>
						<br> <input type="hidden" name="subject" id="subject"
							value="{{ $lesson->subject }}" /> <input type="submit"
							value="Buy a lesson">
					</form>
				</div>
			</div>

			@endguest

		</div>
	</div>
	@endsection