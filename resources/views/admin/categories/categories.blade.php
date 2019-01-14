@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row" style="margin-top:50px;">
    <table class="table table-striped">
  <thead>
    <th>Название</th>
    <th>Количество</th>
    <th class="text-right">Действие</th>
  </thead>
  <tbody>
    @forelse ($categories as $category)
      <tr>
        <td class="category-name {{$category->id}}" name='{{$category->id}}'>
          <p class="category-name-p">{{$category->name}}</p>
        </td>
        <td>{{$category->assortment}}</td>
        <td class="text-right">
          <a class="btn btn-default" href="{{route('admin.category.edit', $category)}}"><i class="fa fa-edit"></i></a>
        </td>
      </tr>
    @empty
      <tr>
        <td colspan="3" class="text-center"><h2>Данные отсутствуют</h2></td>
      </tr>
    @endforelse
  </tbody>
  <tfoot>
    <tr>
      <td colspan="3">
        <ul class="pagination pull-right">
          <a class="btn btn-info" href="{{route('admin.category.create')}}">Добавить категорию <i class="fa fa-plus"></i></a>
        </ul>
      </td>
    </tr>
  </tfoot>
</table>

  </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="{{ asset('js/admin.js') }}"></script>
