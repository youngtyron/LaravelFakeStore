@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row" style="margin-top:50px;">
    <form class="form-horizontal" action="{{route('admin.category.update', $category)}}" method="post">
      <input type="hidden" name="_method" value="put">
      {{ csrf_field() }}

      {{-- Form include --}}
      @include('admin.categories.units.form')

    </form>
  </div>
</div>
@endsection
