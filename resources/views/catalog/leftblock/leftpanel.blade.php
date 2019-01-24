<div class="left-catalog-box">
  <ul class="list-group left-catalog-group">
    <li class="list-group-item active left-catalog-title">Каталог</li>
      @foreach ($categories as $category)
        @if ($category->parent_id==0)
          @if ($category->is_last==0)
            <li class="list-group-item parent-catalog-li left-catalog-elem" name="{{$category->id}}">{{$category->name}}</li>
          @else
            <li class="list-group-item parent-catalog-li left-catalog-elem linker" name="{{$category->id}}">{{$category->name}}</li>
          @endif
          @include('catalog.leftblock.units.categories', ['category' => $category])
        @endif
      @endforeach
  </ul>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="{{ asset('js/leftblock.js') }}"></script>
