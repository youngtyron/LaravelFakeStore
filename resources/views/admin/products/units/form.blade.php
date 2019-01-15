<div class="form-group">
  <label for="">Бренд</label>
  <input type="text" class="form-control" name="brand" placeholder="Бренд товара" value="{{$product->brand or ""}}" required>
</div>

<div class="form-group">
  <label for="">Модель</label>
  <input type="text" class="form-control" name="model" placeholder="Модель товара" value="{{$product->model or ""}}" required>
</div>

<div class="form-group">
  <label for="">Цена</label>
  <input type="text" class="form-control" name="price" placeholder="Цена товара" value="{{$product->model or ""}}" required>
</div>

<div class="form-group">
  <label for="">Количество</label>
  <input class="form-control" type="text" name="assortment" placeholder="Количество товара" value="{{$product->assortment or ""}}" required="">
</div>

<div class="form-group">
  <label for="">Характеристики</label>
  <textarea class="form-control" name="characteristic" rows="3" value="{{$product->characteristic or ""}}" required=""></textarea>
</div>

<div class="form-group">
  <label for="">Описание</label>
  <textarea class="form-control" name="summary" rows="3" value="{{$product->summary or ""}}" required=""></textarea>
</div>



<hr />

<input class="btn btn-info" type="submit" value="Сохранить">
