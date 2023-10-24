@extends('layouts.admin')
@section('title','Reporte de Compras')
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
            Reporte de Compras
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Reporte de Compras</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="row ">
                        <div class="col-12 col-md-4 text-center">
                            <span>Fecha de consulta: <b> </b></span>
                            <div class="form-group">
                                <strong>{{\Carbon\Carbon::now()->format('d/m/Y')}}</strong>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 text-center">
                            <span>Cantidad de registros: <b></b></span>
                            <div class="form-group">
                                <strong>{{$purchases->count()}}</strong>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 text-center">
                            <span>Total de ingresos: <b> </b></span>
                            <div class="form-group">
                                <strong>s/ {{$totalp}}</strong>
                            </div>
                        </div>
                    </div>


                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th style="width:50px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchases as $purchase)
                                <tr>
                                    <th scope="row">
                                        <a href="{{route('purchases.show', $purchase)}}">{{$purchase->id}}</a>
                                    </th>
                                    <td>
                                        {{\Carbon\Carbon::parse($purchase->purchase_date)->format('d M y h:i a')}}
                                    </td>
                                    <td>{{$purchase->total}}</td>
                                    <td>{{$purchase->status}}</td>
                                    <td style="width: 50px;">

                                        <a href="{{route('purchases.pdf', $purchase)}}" class="sgrid-button jsgrid-edit-button"><i class="fa fa-print btn-icon-append"></i></a> 
                                        
                                        
                                        

                                        <a href="{{route('purchases.show', $purchase)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-eye"></i></a>
                                   
                                      
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
