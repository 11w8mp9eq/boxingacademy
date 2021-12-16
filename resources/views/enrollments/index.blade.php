@extends('layouts.app') @section('content')
<div class="content">

	<!-- Page title -->
	<div class="title m-b-md">
		<p style="color: green;">{{ session('mssg') }}</p>
		Enrollments
	</div>

	<!-- Table title -->
	Number of students in individual lessons

	<!-- Table contents -->
	<table class="table table-sm">
		<thead>
			<tr>
				<th>Subject</th>
				<th>Level</th>
				<th>Students</th>
			</tr>
		</thead>
		<tbody>

			<tr>
				<td>Attack</td>
				<td>Beginner</td>
				<td>{{ $attackBeginner }}</td>
			</tr>
			<tr>
				<td>Attack</td>
				<td>Intermediate</td>
				<td>{{ $attackIntermediate }}</td>
			</tr>
			<tr>
				<td>Attack</td>
				<td>Professional</td>
				<td>{{ $attackProfessional }}</td>
			</tr>
			<tr>
				<td>Defensive</td>
				<td>Beginner</td>
				<td>{{ $defensiveBeginner }}</td>
			</tr>
			<tr>
				<td>Defensive</td>
				<td>Intermediate</td>
				<td>{{ $defensiveIntermediate }}</td>
			</tr>
			<tr>
				<td>Defensive</td>
				<td>Professional</td>
				<td>{{ $defensiveProfessional }}</td>
			</tr>
			<tr>
				<td>Footwork</td>
				<td>Beginner</td>
				<td>{{ $footworkBeginner }}</td>
			</tr>
			<tr>
				<td>Footwork</td>
				<td>Intermediate</td>
				<td>{{ $footworkIntermediate }}</td>
			</tr>
			<tr>
				<td>Footwork</td>
				<td>Professional</td>
				<td>{{ $footworkProfessional }}</td>
			</tr>


		</tbody>
	</table>
	
	<!-- Table title -->
	All enrollments
	
	<!-- Table contents -->
	<table class="table table-sm">
		<thead>
			<tr>

				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Subject</th>
				<th>Level</th>
				<th>Created At</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>

			@foreach($enrollments as $enrollment)
			<tr>
				<td>{{ $enrollment->id }}</td>
				<td>{{ $enrollment->name }}</td>
				<td>{{ $enrollment->email }}</td>
				<td>{{ $enrollment->subject }}</td>
				<td>{{ $enrollment->level }}</td>
				<td>{{ $enrollment->created_at }}</td>
				<td><form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST">
						@csrf
						@method('DELETE')
						<button>Delete</button>
					</form></td>
			</tr>
			@endforeach

		</tbody>
	</table>


</div>
@endsection
