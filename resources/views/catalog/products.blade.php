@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

      @foreach($products as $product)
        <p>{{$product->brand}} {{$product->model}}</p>
          @if($product->image)
              <img src="{{asset ('/storage/'.$product->image)}}" alt="{{$product->image}}">
          @endif
      @endforeach

    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
