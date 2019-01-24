<div class="subcategories">
  @foreach($category->children as $child)
    @if ($child->is_last == 0)
      <li class="list-group-item children-left-li left-catalog-elem" name="{{$child->id}}">{{$child->name}}</li>
    @else
      <li class="list-group-item children-left-li left-catalog-elem linker" name="{{$child->id}}">{{$child->name}}</li>
    @endif
    @if (count($child->children) > 0)
      @include('catalog.leftblock.units.categories', ['category' => $child])
    @endif
  @endforeach
</div>
