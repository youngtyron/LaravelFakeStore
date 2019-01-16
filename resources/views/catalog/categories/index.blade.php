@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

      @foreach ($categories as $category)
        @if(count($category->children)>0)
          <p><a href="{{route('catalog.show', $category)}}">{{$category->name}}</a></p>
        @else
          <p><a href="{{route('catalog.products_category', $category->id)}}">{{$category->name}}</a></p>
        @endif
      @endforeach

    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="{{ asset('js/categories.js') }}"></script>
