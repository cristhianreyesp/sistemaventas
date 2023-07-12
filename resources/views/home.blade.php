@extends('layouts.admin')
@section('title','Panel administrador')
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
            Panel administrador
        </h3>
    </div>
    @foreach ($totales as $total)
    <div class="row grid-margin">
            <div class="col-12">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                      <div class="statistics-item">
                        <p>
                          <i class="fas fa-cart-arrow-down mr-2"></i>
                          COMPRAS DIARIAS
                        </p>
                        <div class="d-md-flex">
                            <h3 class="mb-0">S/ {{$total->totalcomprad}} </h3> <span>  (HOY)</span> 
                        </div>
                        <small class="text-gray">N° Compras {{$canCompraAct}}</small>
                        <div class="chart-wrapper mt-3" style="height:26px;">
                            <a href="{{route('purchases.index')}}" class="small-box-footer h6">Compras 
                            <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>

                      <div class="statistics-item">
                        <p>
                          <i class="fas fa-cart-arrow-down mr-2"></i>
                          COMPRAS MENSUAL
                        </p>
                        <div class="d-md-flex">
                            <h3 class="mb-0">S/ {{$total->totalcompra}} </h3> <span>  (MES)</span> 
                        </div>
                        <small class="text-gray">N° Compras {{$canCompraAct}}</small>
                        <div class="chart-wrapper mt-3" style="height:26px;">
                            <a href="{{route('purchases.index')}}" class="small-box-footer h6">Compras 
                            <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>

                      <div class="statistics-item">
                        <p>
                          <i class="fas fa-cart-arrow-down mr-2"></i>
                          VENTAS DIARIAS
                        </p>
                        <div class="d-md-flex">
                            <h3 class="mb-0">S/ {{$total->totalventad}} </h3> <span>  (HOY)</span> 
                        </div>
                        <small class="text-gray">N° Compras {{$canVentasAct}}</small>
                        <div class="chart-wrapper mt-3" style="height:26px;">
                            <a href="{{route('purchases.index')}}" class="small-box-footer h6">Compras 
                            <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>

                      <div class="statistics-item">
                        <p>
                          <i class="fas fa-cart-arrow-down mr-2"></i>
                          VENTAS MENSUAL
                        </p>
                        <div class="d-md-flex">
                            <h3 class="mb-0">S/ {{$total->totalventa}} </h3> <span>  (MES)</span> 
                        </div>
                        <small class="text-gray">N° Compras {{$canVentasAct}}</small>
                        <div class="chart-wrapper mt-3" style="height:26px;">
                            <a href="{{route('purchases.index')}}" class="small-box-footer h6">Compras 
                            <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>

                  </div>
                </div>
              </div>
            </div>
    </div>

   {{--  <div class="row">

        <div class="col-md-6 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-0">Compras</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-inline-block pt-3">
                                    <div class="d-md-flex">
                                        <h2 class="mb-0">S/ {{$total->totalcompra}} </h2> <span> (MES ACTUAL)</span> 
                                    </div>
                                        <small class="text-gray">N° Compras {{$canCompraAct}}</small>
                                    <div class="chart-wrapper mt-3" style="height:26px;">
                                        <a href="{{route('purchases.index')}}" class="small-box-footer h6">Compras 
                                        <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <div class="d-inline-block">
                                    <i class="fas fa-cart-arrow-down text-info icon-lg"></i>                                    
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
                
        <div class="col-md-6 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-0">Ventas</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-inline-block pt-3">
                                    <div class="d-md-flex">
                                        <h2 class="mb-0">S/ {{$total->totalventa}} </h2><span> (MES ACTUAL)</span> 
                                    </div>
                                        <small class="text-gray">N° ventas {{$canVentasAct}}</small>
                                    <div class="chart-wrapper mt-3" style="height:26px;">
                                        <a href="{{route('sales.index')}}" class="small-box-footer h6">Ventas 
                                        <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <div class="d-inline-block">
                                    <i class="fas fa-shopping-cart text-danger icon-lg"></i>                                    
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>--}}

    @endforeach

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-cart-arrow-down"></i>
                        Compras - Diarias
                    </h4>
                    <canvas id="compras_diarias"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-shopping-cart"></i>
                        Ventas - Diarias
                    </h4>
                    <canvas id="ventas_diarias"></canvas>
            </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-cart-arrow-down"></i>
                        Compras - Meses
                    </h4>
                    <canvas id="compras"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-shopping-cart"></i>
                        Ventas - Meses
                    </h4>
                    <canvas id="ventas"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-envelope"></i>
                        Productos más vendidos
                    </h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th>Nombre</th>
                                    <th>Stock</th>
                                    <th>Cantidad vendida</th>
                                    <th>Ver detalles</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productosvendidos as $productosvendido)
                                <tr>
                                    <td>{{$productosvendido->id}}</td>
                                    <td>{{$productosvendido->name}}</td>
                                    <td><strong>{{$productosvendido->stock}}</strong> Unidades</td>
                                    <td><strong>{{$productosvendido->quantity}}</strong> Unidades</td>
                                    <td>
                                        <a class="btn btn-primary"
                                            href="{{route('products.show', $productosvendido->id)}}">
                                            <i class="far fa-eye"></i>
                                            Ver detalles
                                        </a>
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


<script>
$(function () {
            var varCompra=document.getElementById('compras').getContext('2d');
            var charCompra = new Chart(varCompra, {
                type: 'line',
                data: {
                    labels: [<?php foreach ($comprasmes as $reg)
                        { 
                            
                    setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
                    $meses=strftime('%B',strtotime(date("Y-".sprintf("%02d", $reg->mes)."-01")));
                    
                    echo '"'. $meses.'",';} ?>].reverse(), 
                    datasets: [{
                        label: 'Compras',
                        data: [<?php foreach ($comprasmes as $reg)
                            {echo ''. $reg->totalmes.',';} ?>].reverse(),
                    
                        backgroundColor: 'rgba(11,148,247,255)',
                        borderColor: 'rgba(11,148,247,255)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });


            
            var varVenta=document.getElementById('ventas').getContext('2d');
            var charVenta = new Chart(varVenta, {
                type: 'line',
                data: {
                    labels: [<?php foreach ($ventasmes as $reg)
                {
                    setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
                    $mes_traducido=strftime('%B',strtotime(date("Y-".sprintf("%02d", $reg->mes)."-01")));
                    
                    echo '"'. $mes_traducido.'",';} ?>].reverse(),
                    datasets: [{
                        label: 'Ventas',
                        data: [<?php foreach ($ventasmes as $reg)
                        {echo ''. $reg->totalmes.',';} ?>].reverse(),
                        backgroundColor: 'rgba(255,94,109,255)',
                        borderColor: 'rgba(255,94,109,255)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
            var varVenta=document.getElementById('ventas_diarias').getContext('2d');
            var charVenta = new Chart(varVenta, {
                type: 'bar',
                data: {
                    labels: [<?php foreach ($ventasdia as $ventadia)
                {
                    $dia = $ventadia->dia;
                    
                    echo '"'. $dia.'",';} ?>].reverse(),
                    datasets: [{
                        label: 'Ventas',
                        data: [<?php foreach ($ventasdia as $reg)
                        {echo ''. $reg->totaldia.',';} ?>].reverse(),
                        backgroundColor: 'rgba(255,94,109,255)',
                        borderColor: 'rgba(255,94,109,255)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
            var varCompra=document.getElementById('compras_diarias').getContext('2d');
            var charCompra = new Chart(varCompra, {
                type: 'bar',
                data: {
                    labels: [<?php foreach ($comprasdia as $compradia)
                {
                    $dia = $compradia->dia;
                    
                    echo '"'. $dia.'",';} ?>].reverse(),
                    datasets: [{
                        label: 'Compras',
                        data: [<?php foreach ($comprasdia as $reg)
                        {echo ''. $reg->totaldia.',';} ?>].reverse(),
                        backgroundColor: 'rgba(11, 148, 247, 255)',
                        borderColor: 'rgba(11, 148, 247, 255)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
    });
</script>

@endsection
