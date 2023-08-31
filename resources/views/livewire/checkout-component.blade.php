@section('title')
Замовлення
@endsection
	
	<main id="main" class="main-site">

		<div class="container">
			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="/" class="link">home</a></li>
					<li class="item-link"><span>Checkout</span></li>
				</ul>
			</div>
			<div class="main-content-area">
				<form>
				<div class="row">
					<div class="col-md-12">
						<div class="wrap-address-billing">
							<h3 class="box-title">Форма доставки 1</h3>
							<div class="billing-address">
								<p class="row-in-form">
									<label for="fname">Ім'я:<span>*</span></label>
									<input id="fname" type="text" name="fname" value="" placeholder="Ваше ім'я"
										wire:model="firstname">
								</p>
								<p class="row-in-form">
									<label for="lname">Прізвище:<span>*</span></label>
									<input id="lname" type="text" name="lname" value="" placeholder="Ваше прізвище"
										wire:model="lastname">
								</p>
								<p class="row-in-form">
									<label for="email">Пошта:</label>
									<input id="email" type="email" name="email" value="" placeholder="Ваша пошта"
										wire:model="email">
								</p>
								<p class="row-in-form">
									<label for="phone">Телефон:<span>*</span></label>
									<input id="phone" type="number" name="phone" value="" placeholder="Ваш телефон"
										wire:model="mobile">
								</p>
								<p class="row-in-form">
									<label for="zip-code">Індекс:<span>*</span></label>
									<input id="zip-code" type="number" name="zip-code" value="" placeholder="Поштовий код"
										wire:model="zipcode">
								</p>
								<p class="row-in-form">
									<label for="country">Країна<span>*</span></label>
									<input id="country" type="text" name="country" value="" placeholder="Країна"
										wire:model="country">
								</p>
								<p class="row-in-form">
									<label for="province">Область<span>*</span></label>
									<input id="province" type="text" name="province" value="" placeholder="Область"
										wire:model="province">
								</p>						
								<p class="row-in-form">
									<label for="city">Місто:<span>*</span></label>
									<input id="city" type="text" name="city" value="" placeholder="Місто"
										wire:model="city">
								</p>
								<p class="row-in-form">
									<label for="line1">Адреса-1:<span>*</span></label>
									<input id="line1" type="text" name="line1" value="" placeholder="Адреса-1"
										wire:model="line1">
								</p>
								<p class="row-in-form">
									<label for="line2">Адреса-2:</label>
									<input id="line2" type="text" name="line2" value="" placeholder="Адреса-2"
										wire:model="line2">
								</p>
								<p class="row-in-form fill-wife">							
									<label class="checkbox-field">
										<input name="different-add" id="different-add" value="1" 
											type="checkbox" wire:model="ship_to_different">
										<span>Доставити на різні адреси?</span>
									</label>
								</p>
							</div>
						</div>		
					</div>
					@if ($ship_to_different)
						<div class="col-md-12">
							<div class="wrap-address-billing">
								<h3 class="box-title">Форма доставки 2</h3>
								<div class="billing-address">
									<p class="row-in-form">
										<label for="fname">Ім'я:<span>*</span></label>
										<input id="fname" type="text" name="fname" value="" placeholder="Ваше ім'я">
									</p>
									<p class="row-in-form">
										<label for="lname">Прізвище:<span>*</span></label>
										<input id="lname" type="text" name="lname" value="" placeholder="Ваше прізвище">
									</p>
									<p class="row-in-form">
										<label for="email">Пошта:</label>
										<input id="email" type="email" name="email" value="" placeholder="Ваша пошта">
									</p>
									<p class="row-in-form">
										<label for="phone">Телефон:<span>*</span></label>
										<input id="phone" type="number" name="phone" value="" placeholder="Ваш телефон">
									</p>
									<p class="row-in-form">
										<label for="zip-code">Індекс:<span>*</span></label>
										<input id="zip-code" type="number" name="zip-code" value="" placeholder="Поштовий код">
									</p>
									<p class="row-in-form">
										<label for="country">Країна<span>*</span></label>
										<input id="country" type="text" name="country" value="" placeholder="Країна">
									</p>						
									<p class="row-in-form">
										<label for="city">Місто:<span>*</span></label>
										<input id="city" type="text" name="city" value="" placeholder="Місто">
									</p>
									<p class="row-in-form">
										<label for="add">Адреса:<span>*</span></label>
										<input id="add" type="text" name="add" value="" placeholder="Ваша адреса">
									</p>								
								</div>
							</div>		
						</div>
					@endif
				</div>				
				<div class="summary summary-checkout">
					<div class="summary-item payment-method">
						<h4 class="title-box">Методи оплати</h4>
						<p class="summary-info"><span class="title">Check / Money order</span></p>
						<p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
						<div class="choose-payment-methods">
							<label class="payment-method">
								<input name="payment-method" id="payment-method-bank" value="code" type="radio">
								<span>Оплата при отриманні</span>
								<span class="payment-desc">Замовте доставку із оплатою при отриманні</span>
							</label>
							<label class="payment-method">
								<input name="payment-method" id="payment-method-visa" value="card" type="radio">
								<span>Банківська карта</span>
								<span class="payment-desc">Замовте доставку із оплатою через банківську карту</span>
							</label>
							<label class="payment-method">
								<input name="payment-method" id="payment-method-paypal" value="cash" type="radio">
								<span>Оплата готівкою</span>
								<span class="payment-desc">Замовте доставку із оплатою готівкою</span>								
							</label>
						</div>
						<p class="summary-info grand-total"><span>Загальна вартість</span> <span class="grand-total-price">$0.00</span></p>
						<a href="thankyou.html" class="btn btn-medium">Розмістіть замовлення зараз</a>
					</div>
					<div class="summary-item shipping-method">
						<h4 class="title-box f-title">Методи доставки</h4>
						<p class="summary-info"><span class="title">Flat Rate</span></p>
						<p class="summary-info"><span class="title">Fixed $0.00</span></p>						
					</div>
				</div>	
				</form>			
			</div>
		</div>

	</main>