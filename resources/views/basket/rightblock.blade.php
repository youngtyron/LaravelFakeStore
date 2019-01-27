<div class="basket-div">
  <i class="fas fa-shopping-cart fa-3x"></i>
  @if ($writeTovar==1)
    <p class='rightblock-basket-counter'>{{$num_in_basket}} товар в корзине</p>
  @elseif ($writeTovar==2)
    <p class='rightblock-basket-counter'>{{$num_in_basket}} товара в корзине</p>
  @else
    <p class='rightblock-basket-counter'>{{$num_in_basket}} товаров в корзине</p>
  @endif
  <a href="{{route('basket.show')}}">Перейти в корзину</a>
</div>
