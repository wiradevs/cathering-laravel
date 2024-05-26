<li><a href="{{url('/cart')}}"><i class="fas fa-utensils animated infinite pulse delay-5s"></i> Pesanan
   <span class="badge animated infinite tada delay-5s">{{ $cart->totalProduct() > 0 ?'' .$cart->totalProduct() . '' : ''}}</span>
</a></li>
