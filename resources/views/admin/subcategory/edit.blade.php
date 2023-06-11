@extends('layouts.admin')
@section('title','Editar categoría')
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
            Editar categoría
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('subcategories.index')}}">Categorías</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar categoría</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Editar Sub categoría</h4>
                    </div>
                    {!! Form::model($subcategory,['route'=>['subcategories.update',$subcategory], 'method'=>'PUT']) !!}
                    

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" value="{{$subcategory->name}}" class="form-control" placeholder="Nombre" required>
                      </div>
                      <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" name="description" id="description" rows="3">{{$subcategory->description}}</textarea>
                    </div>
                    
                    <div class="form-group">
                      <label for="category_id">Categoría</label>
                      <select class="form-control" name="category_id" id="category_id">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}" 
                            @if ($category->id == $subcategory->category_id)
                            selected
                            @endif
                            >{{$category->name}}</option>
                        @endforeach
                      </select>
                    </div>

                     <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                     <a href="{{route('categories.index')}}" class="btn btn-light">
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
@endsection
