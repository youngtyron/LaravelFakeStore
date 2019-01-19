@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <p>{{$product->brand}} {{$product->model}}</p>
      <p>Цвет: {{$product->color}}</p>
      @if ($product->assortment>0)
        <p class="in-stock">В наличии</p>
      @else
        <p class="out-of-stock">Товара нет в наличии</p>
      @endif

      <p>Цена: {{$product->price}} рублей</p>

      @if (Auth::user()->is_admin)
        <a class="btn btn-info" href="{{route ('catalog.product.edit', $product->id)}}">Редактировать</a>
      @endif

    </div>

</div>
@endsection
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
