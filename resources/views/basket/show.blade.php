
@extends('layouts.app')

@section('content')
  <p>Всего товаров в корзине: {{$num_in_basket}}</p>
  <ul class="list-group">
    @forelse ($basket->products as $product)
      <li class="list-group-item">
        <p>
          <img src='{{$product->image}}' class="basket-image"/>
          {{$product->brand}} {{$product->model}}
          <i class="fas delete-from-basket fa-times fa-2x" name="{{$product->id}}"></i>
          </i>
        </p>
      </li>
    @empty
      <p>Вы не добавили ни одного товара</p>
    @endforelse
  </ul>


  @if ($basket->count_sum()>0)
    <p>Итого:{{$basket->count_sum()}} р.</p>
  @endif

  @if ($basket->count_sum()>0)
  <form action="{{ route ('basket.order')}}" method="post">
    {{ csrf_field() }}
    <button type="submit" class="btn btn-info">Оформить заказ</button>
  </form>
  @endif

@endsection
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="{{ asset('js/basket.js') }}"></script>
