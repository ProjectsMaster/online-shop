@section('title')
Кошик
@endsection
	
	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="/" class="link">home</a></li>
					<li class="item-link"><span>Cart</span></li>
				</ul>
			</div>
			<div class=" main-content-area">
				@if (Cart::instance('cart')->count() > 0)
				<div class="wrap-iten-in-cart">
					@if (Session::has('success_message'))
						<div class="alert alert-success">
							<strong>Success</strong>
							{{Session::get('success_message')}}
						</div>
					@endif
					@if (Cart::count())
						<h3 class="box-title">Products Name</h3>
						<ul class="products-cart">
							@foreach (Cart::content() as $item)
								<li class="pr-cart-item">
									<div class="product-image">
										<figure><img src="{{asset('assets/images/products')}}/{{$item->model->image}}" alt="{{$item->model->name}}"></figure>
									</div>
									<div class="product-name">
										<a class="link-to-product" 
										   href="{{route('product.details',['slug'=>$item->model->slug])}}">
											{{$item->model->name}}
										</a>
									</div>
									<div class="price-field produtc-price"><p class="price">{{$item->model->regular_price}} грн</p></div>
									<div class="quantity">
										<div class="quantity-input">
											<input type="text" name="product-quatity" value="{{$item->qty}}" data-max="120" pattern="[0-9]*" >									
											<a class="btn btn-increase"
											   wire:click.prevent="increaseQuantity('{{$item->rowId}}')"></a>
											<a class="btn btn-reduce"
											   wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"></a>
										</div>
									</div>
									<div class="price-field sub-total"><p class="price">{{$item->subtotal}}</p></div>
									<div class="delete">
										<a class="btn btn-delete" title="Натисніть для видалення"
										   wire:click.prevent="delete('{{$item->rowId}}')">
											<span>Видалити із кошика</span>
											<i class="fa fa-times-circle" aria-hidden="true"></i>
										</a>
									</div>
								</li>
							@endforeach
						</ul>
					@else
						<h4 style="color: red">Немає товарів у кошику</h4>
						<hr>
					@endif
				</div>

				<div class="summary">
					<div class="order-summary">
						<h4 class="title-box">Загальна інформація</h4>
						<p class="summary-info"><span class="title">Вартість</span><b class="index">{{Cart::subtotal()}} грн</b></p>
						<p class="summary-info"><span class="title">Податок</span><b class="index">{{Cart::tax()}} грн</b></p>
						<p class="summary-info"><span class="title">Доставка</span><b class="index">Безкоштовна</b></p>
						<p class="summary-info total-info "><span class="title">Всього</span><b class="index">{{Cart::total()}} грн</b></p>
					</div>
					<div class="checkout-info">
						<label class="checkbox-field">
							<input class="frm-input " name="have-code" id="have-code" value="" type="checkbox"><span>I have promo code</span>
						</label>
						<a class="btn btn-checkout" wire:click.prevent="checkout">Перейти до замовлення</a>
						<a class="link-to-shop" href="shop.html">Продовжити покупки<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
					</div>
					<div class="update-clear">
						<a class="btn btn-clear"
						   wire:click.prevent="deleteAll()">
							Очистити кошик
						</a>
						<a class="btn btn-update" href="#">Оновити кошик</a>
					</div>
				</div>
				@else
					<div class="text-center" style="padding-bottom: 30px">
						<h2>Ваш кошик є порожнім!</h2>
						<h4>Додайте товари до Вашого кошику зараз</h4>
						<a href="/shop" class="btn btn-success" style="margin-top: 25px">
							Перейти до каталогу
						</a>
					</div>
				@endif

				<div class="wrap-show-advance-info-box style-1 box-in-site">
					<h3 class="title-box">Most Viewed Products</h3>
					<div class="wrap-products">
						<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{ asset('assets/images/products/digital_4.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item new-label">new</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{ asset('assets/images/products/digital_17.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item sale-label">sale</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{ asset('assets/images/products/digital_15.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item new-label">new</span>
										<span class="flash-item sale-label">sale</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{ asset('assets/images/products/digital_1.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item bestseller-label">Bestseller</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{ asset('assets/images/products/digital_21.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{ asset('assets/images/products/digital_3.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item sale-label">sale</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{ asset('assets/images/products/digital_4.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item new-label">new</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{ asset('assets/images/products/digital_5.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item bestseller-label">Bestseller</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>
						</div>
					</div><!--End wrap-products-->
				</div>

			</div><!--end main content area-->
		</div><!--end container-->

	</main>