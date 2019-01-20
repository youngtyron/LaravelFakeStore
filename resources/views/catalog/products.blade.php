@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="links">
        <p id="category-id" name="{{$category_id}}"></p>
        <table class='products-table'>
        </table>
      </div>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="{{ asset('js/products.js') }}"></script>
