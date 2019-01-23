<div class="left-catalog-box">
  <ul class="list-group left-catalog-group">
    <li class="list-group-item active left-catalog-title">Каталог</li>
    @foreach ($categories as $category)
      @if ($category->parent_id==0)
        <li class="list-group-item left-catalog-elem">{{$category->name}}</li>
      @endif
    @endforeach
  </ul>
</div>



<!-- <script src="{{ asset('js/leftblock.js') }}"></script> -->
