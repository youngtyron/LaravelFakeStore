@foreach ($categories as $category_list)

  <option value="{{$category_list->id or ""}}">
    {{$category_list->name or ""}}
  </option>
@endforeach
