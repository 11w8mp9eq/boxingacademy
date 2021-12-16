@extends('layouts.app') @section('content')
<div class="content">

	<!-- Page title -->
	<div class="title m-b-md">{{ $product->name }}</div>
	
	<!-- Page contents for guest -->
	@guest
	<div class="product">
		<div class="image">
			<img src="/img/{{ $product->img }}">
		</div>
		<div class="description">{{ $product->description }}</div>
		<div class="order">
			<a href="{{ route('login') }}">{{ __('Login') }}</a> to buy a
			product.
		</div>
		
		<!-- Page contents for logged in users -->
		@else
		<div class="product">
	
			<!-- Image section -->
			<div class="image">
				<img src="/img/{{ $product->img }}">
			</div>
			
			<!-- Description section -->
			<div class="description">{{ $product->description }}</div>
			
			<!-- Order input data section -->
			<div class="order">
				<div class="container">
					<form action="/products" method="POST">
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
								<label for="address">Address</label>
							</div>
							<div class="col-75">
								<textarea id="address" name="address"
									placeholder="Write your address.." style="height: 50px"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-25">
								<label for="price">Price</label>
							</div>
							<div class="col-76">{{ $product->price }}</div>
						</div>
						<input type="hidden" name="product" id="product"
							value="{{ $product->name }}" /> <br> <input type="submit"
							value="Buy a product">
					</form>



				</div>
			</div>

		</div>
		@endguest
	</div>

	@endsection