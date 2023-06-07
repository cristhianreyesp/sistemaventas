<div class="form-group">
  <label for="name">Nombre</label>
  <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>
</div>
<div class="form-group">
  <label for="description">Descripción</label>
  <textarea class="form-control" name="description" id="description" rows="3"></textarea>
</div>
<div class="form-group">
  <label for="category_id">Categoría</label>
    <select class="form-control" name="category_id" id="category_id">
      @foreach ($categories as $category)
      <option value="{{$category->id}}">{{$category->name}}</option>
      @endforeach
    </select>
</div>