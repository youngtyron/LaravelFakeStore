@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row" style="margin-top:50px;">
    <form class="form-horizontal" action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}

      {{-- Form include --}}
      @include('admin.products.units.form')

    </form>
  </div>
</div>
@endsection

<script src="{{ asset('js/admin.js') }}"></script>
