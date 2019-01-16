@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row" style="margin-top:50px;">

       @forelse ($categories as $category)
           <p class="category-name-p">{{$category->name}}
             <a class="btn btn-default" href="{{route('admin.category.edit', $category)}}">
               <i class="fa fa-edit"></i>
             </a>
           </p>
           @if (count($category->children) > 0)
              @include('admin.categories.units.list_categories', ['categories' => $category->children, 'delimiter'  => ' - - ' . $delimiter])
           @endif
       @empty
           <p class="text-center">Данные отсутствуют</p>
       @endforelse
           <a class="btn btn-info" href="{{route('admin.category.create')}}">Добавить категорию <i class="fa fa-plus"></i></a>
           <a class="btn btn-success" href="{{route('admin.product.create')}}">Добавить товар <i class="fa fa-plus"></i></a>



  </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="{{ asset('js/admin.js') }}"></script>
