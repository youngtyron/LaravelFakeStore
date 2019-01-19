@foreach ($categories as $category_list)

  <option value="{{$category_list->id or ""}}"
    @isset($product->id)

      @if ($product->category_id == $category_list->id)
        selected=""
      @endif

    @endisset>
    {{$category_list->name or ""}}
  </option>
@endforeach
