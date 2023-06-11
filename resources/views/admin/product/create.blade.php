@extends('layouts.admin')
@section('title','Registrar producto')
@section('styles')
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Registro de productos
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de productos</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de productos</h4>
                    </div>
                    {!! Form::open(['route'=>'products.store', 'method'=>'POST','files' => true]) !!}
                   
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="provider_id">Proveedor</label>
                                <select class="form-control" name="provider_id" id="provider_id">
                                @foreach ($providers as $provider)
                                    <option value="{{$provider->id}}">{{$provider->name}}</option>
                                @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="brand_id">Marca</label>
                                <select class="form-control" name="brand_id" id="brand_id">
                                @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                                </select>
                        </div>



                        <div class="form-group col-md-6">
                            <label for="category_id">Categoría</label>
                                <select class="form-control" name="category_id" id="category_id">
                                <option value="">Selecione Categoria</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="subcategory_id">Sub categoria</label>
                                <select class="form-control" name="subcategory_id" id="subcategory_id" disable>
                                 <option value="">Selecione Sub Categoria</option>
                                </select>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="sell_price">Precio de venta</label>
                            <input type="number" name="sell_price" id="sell_price" class="form-control" aria-describedby="helpId" required>
                        </div>
                    </div>

                    <div class="card-body">
                        <h4 class="card-title d-flex">Imagen de producto
                          <small class="ml-auto align-self-end">
                            <a href="dropify.html" class="font-weight-light" target="_blank">Seleccionar Archivo</a>
                          </small>
                        </h4>
                        <input type="file"  name="picture" id="picture" class="dropify" />
                    </div>

                     <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                     <a href="{{route('products.index')}}" class="btn btn-light">
                        Cancelar
                     </a>
                     {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
{!! Html::script('melody/js/dropify.js') !!}
<script>

$(function() {
        $("#category_id").on('change', onSelectCategoryChange);
    });

function onSelectCategoryChange() {
    var category_id = $(this).val();

    if (!category_id) {
        $('#subcategory_id').html('<option value="">Seleccione Nivel </option>');
        return;
    }
    
//ajax
    $.get('/api/category/'+category_id+'/subcategories',function(data) {
        var html_select = '<option value="">Seleccione Sub Categoria </option>';
        for (var i=0; i<data.length; ++i)
            html_select += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
           
            $('#subcategory_id').html(html_select);
    });
 }
</script>
@endsection




