@extends('layouts.app') @section('content')
<div class="content">
	<div class="title m-b-md">
		<p style="color: green; font-size: 15px;">{!! session('mssg') !!}</p>
		Products
	</div>
</div>
<div class="lesson">
	@foreach($products as $product)
	<div>
		<a href="{{ route('products.show', $product->id) }}"><button class="button2">{{ $product->name }}</button></a>
	</div>
	@endforeach
</div>

</div>
@endsection
