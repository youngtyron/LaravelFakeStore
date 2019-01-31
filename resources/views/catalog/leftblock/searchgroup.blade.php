<div class="">
  <form class="form-group left-search-form" action="" method="get">
    <input class="price-range" type="range" min="{{$min}}" max="{{$max}}" value='{{$max}}' step="100" oninput="MaxPriceIndicate()">
    <p class="max-price">{{$max}}</p>
    @foreach($brands as $brand)
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="brand" id = "{{$brand}}" value="{{$brand}}">
        <label class="form-check-label" for="{{$brand}}">
          {{$brand}}
        </label>
      </div>
    @endforeach
    <button type="button" class="btn btn-light" onclick="SearchRequest()">Искать</button>
  </form>
</div>


<script src="{{ asset('js/searchgroup.js') }}"></script>
