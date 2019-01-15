    <div class="form-group">
      <label for="">Название</label>
      <input type="text" class="form-control" name="name" placeholder="Заголовок категории" value="{{$category->name or ""}}" required>
    </div>

    <div class="form-group">
    <label for="">Родительская категория</label>
      <select class="form-control" name="parent_id">
        <option value="0">-- без родительской категории --</option>
        @include('admin.categories.units.option_categories', ['categories' => $categories])
      </select>
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

    <input class="btn btn-info" type="submit" value="Сохранить">
