@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      @foreach ($categories as $category)
        <p>{{$category->name}}</p>
      @endforeach
    </div>
</div>
@endsection
