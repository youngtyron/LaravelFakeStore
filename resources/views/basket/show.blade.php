
@extends('layouts.app')

@section('content')
  <p>Всего товаров в корзине: {{$num_in_basket}}</p>
  <ul class="list-group">
    @forelse ($basket->products as $product)
      <li class="list-group-item">
        <p><img src='{{$product->image}}' class="basket-image"/>{{$product->brand}} {{$product->model}}</p>
      </li>
    @empty
      <p>Вы не добавили ни одного товара</p>
    @endforelse
  </ul>

  <p>Итого:{{$basket->count_sum()}} р.</p>

  <form action="{{ route ('basket.order')}}" method="post">
    {{ csrf_field() }}
    <button type="submit" class="btn btn-info">Оформить заказ</button>
  </form>

@endsection
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
