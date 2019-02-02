@extends('layouts.app')

@section('content')

  @foreach($bookings as $booking)
    <p>{{$booking}}</p>
  @endforeach

@endsection
