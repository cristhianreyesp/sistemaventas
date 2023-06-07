@extends('layouts.admin')
@section('title','Gestión de categorías')
@section('styles')
<style type="text/css">
    .unstyled-button {
        border: none;
        padding: 0;
        background: none;
      }
</style>

@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            SubCategorías
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">SubCategorías</li>
            </ol>
        </nav>
    </div>
        <a class="nav-link" href="{{route('subcategories.create')}}">
            <span class="btn btn-primary btn-rounded btn-fw"> + Crear nuevo </span>
        </a> 

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">SubCategorías</h4>
                        <div class="btn-group">

                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Categoria</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subcategories as $subcategory)
                                <tr>
                                    <th scope="row">{{$subcategory->id}}</th>
                                    <td>
                                        <a href="{{route('subcategories.show',$subcategory)}}">{{$subcategory->name}}</a>
                                    </td>
                                    <td>{{$subcategory->description}}</td>
                                    <td>{{$subcategory->category->name}}</td>
                                    <td style="width: 50px;">
                                        {!! Form::open(['route'=>['subcategories.destroy',$subcategory], 'method'=>'DELETE']) !!}

                                        <a class="jsgrid-button jsgrid-edit-button" href="{{route('subcategories.edit', $subcategory)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        
                                        <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit" title="Eliminar">
                                            <i class="far fa-trash-alt"></i>
                                        </button>

                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
@endsection
