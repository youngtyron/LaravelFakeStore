@foreach ($categories as $category)
    <p class="category-name-p">{{$delimiter}}{{$category->name}}
      <a class="btn btn-default" href="{{route('admin.category.edit', $category)}}">
        <i class="fa fa-edit"></i>
      </a>
    </p>
    @if (count($category->children) > 0)
       @include('admin.categories.units.list_categories', ['categories' => $category->children, 'delimiter'  => ' - - ' . $delimiter])
    @endif
@endforeach
