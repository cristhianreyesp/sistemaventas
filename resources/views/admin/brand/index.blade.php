@extends('layouts.admin')
@section('title','Gestión de marcas')
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
            Marcas
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Marcas</li>
            </ol>
        </nav>
    </div>
        <a class="nav-link" href="{{route('brands.create')}}">
            <span class="btn btn-primary btn-rounded btn-fw"> + Crear nuevo </span>
        </a> 

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Marcas</h4>
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
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                <tr>
                                    <th scope="row">{{$brand->id}}</th>
                                    <td>
                                        <a href="{{route('brands.show',$brand)}}">{{$brand->name}}</a>
                                    </td>
                                    <td>{{$brand->description}}</td>
                                    <td style="width: 50px;">
                                        {!! Form::open(['route'=>['brands.destroy',$brand], 'method'=>'DELETE']) !!}

                                        <a class="jsgrid-button jsgrid-edit-button" href="{{route('brands.edit', $brand)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        
                                        <button class="" type="submit" title="Eliminar">
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
                {{--  <div class="card-footer text-muted">
                    {{$categories->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
@endsection
