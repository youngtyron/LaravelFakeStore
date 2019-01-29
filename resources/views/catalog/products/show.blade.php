@extends('layouts.app')

@section('content')
@include('search.form')

    {{ csrf_field() }}

      <p id="product-id" name="{{$product->id}}"></p>
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
      @else
        <button type="button" class="btn btn-warning buy-button">В корзину</button>
      @endif


@endsection
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="{{ asset('js/one-product.js') }}"></script>
