@extends('layouts.app') @section('content')
<div class="content">

	<!-- Page title -->
	<div class="title m-b-md">
		<p style="color: green;">{{ session('mssg') }}</p>
		Orders
	</div>
	
	<!-- Table title -->
	Urgency of orders
	
	<!-- Table contents -->
	<table class="table table-sm">
		<thead>
			<tr>

				<th>Product</th>
				<th>Urgent</th>
				<th>Moderate</th>
				<th>New</th>
			</tr>
		</thead>
		<tbody>

			@foreach($times as $time)
			<tr>
				<td>{{ $time->product }}</td>
				<td>{{ $time->Urgent }}</td>
				<td>{{ $time->Moderate }}</td>
				<td>{{ $time->New}}</td>
			</tr>
			@endforeach

		</tbody>
	</table>

	<!-- Table title -->
	All orders

	<!-- Table contents -->
	<table class="table table-sm">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Address</th>
				<th>Product</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			@foreach($orders as $order)
			<tr>
				<td>{{ $order->id }}</td>
				<td>{{ $order->name }}</td>
				<td>{{ $order->address}}</td>
				<td>{{ $order->product}}</td>
				<td><form action="{{ route('orders.destroy', $order->id) }}" method="POST">
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
