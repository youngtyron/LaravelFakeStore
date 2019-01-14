@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row" style="margin-top:50px;">
        <!-- <div class="col-xs-4">
          <div class="card mb-4 box-shadow">
          <div class="card-header text-center">
            <h4 class="my-0 font-weight-normal">Категории</h4>
          </div>
          <div class="card-body text-center">

            <button type="button" class="btn btn-lg btn-block btn-outline-primary">Перейти</button>
          </div>
        </div>
        </div>
        <div class="col-xs-4">
          <div class="card mb-4 box-shadow">
          <div class="card-header text-center">
            <h4 class="my-0 font-weight-normal">Товары</h4>
          </div>
          <div class="card-body text-center">

            <button type="button" class="btn btn-lg btn-block btn-outline-primary">Перейти</button>
          </div>
        </div>
        </div>
        <div class="col-xs-4">
          <div class="card mb-4 box-shadow">
          <div class="card-header text-center">
            <h4 class="my-0 font-weight-normal">Заказы</h4>
          </div>
          <div class="card-body text-center">

            <button type="button" class="btn btn-lg btn-block btn-outline-primary">Перейти</button>
          </div>
        </div>
        </div> -->
        <a href="{{ route('admin.categories') }}">Категории</a>
        <a href="#">Товары</a>

  </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<!-- <script src="{{ asset('js/categories.js') }}"></script> -->
