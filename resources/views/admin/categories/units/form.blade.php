
    <div class="form-group">
      <label for="">Название</label>
      <input type="text" class="form-control" name="name" placeholder="Заголовок категории" value="{{$category->name or ""}}" required>
    </div>

    <div class="form-group">
      <label for="">Количество</label>
      <input class="form-control" type="text" name="assortment" placeholder="Высчитывается автоматически" value="{{$category->assortment or ""}}" readonly="">
    </div>

    <div class="form-group">
      <label for="">Избражение</label>
      <input type="file" name="image" value="{{$category->image or ""}}">
    </div>

    <hr />
<!-- 
    <h4 class="text-center">Параметры товаров</h4>

    <div class="form-inline">
        <label for="">Параметр 1</label>
        <input type="text" class="form-control" name="1" placeholder="" value="" required>

        <button type="button" class="btn btn-success">Добавить значение</button>

    </div> -->

    <input class="btn btn-info" type="submit" value="Сохранить">
