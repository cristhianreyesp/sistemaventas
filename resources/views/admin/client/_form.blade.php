
<div class="form-row">
    <div class="form-group col-md-6">
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" required>
        </div>
    </div>
    <div class="form-group col-md-6">
        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId">
            <small id="helpId" class="form-text text-muted">Este campo es opcional.</small>
        </div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="dni">DNI</label>
            <input type="number" class="form-control" name="dni" maxlength="8" id="dni" aria-describedby="helpId" required>
        </div>
    </div>
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="ruc">RUC</label>
            <input type="number" class="form-control" name="ruc" id="ruc" maxlength="11" aria-describedby="helpId">
            <small id="helpId" class="form-text text-muted">Este campo es opcional.</small>
        </div>
    </div>
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="phone">Teléfono \ Celular</label>
            <input type="number" class="form-control" name="phone" id="phone" maxlength="9" aria-describedby="helpId">
            <small id="helpId" class="form-text text-muted">Este campo es opcional.</small>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="address">Dirección</label>
    <input type="text" class="form-control" name="address" id="address" aria-describedby="helpId">
    <small id="helpId" class="form-text text-muted">Este campo es opcional.</small>
</div>
@section('scripts')
  {!! Html::script('melody/js/bt-maxLength.js') !!}
@endsection