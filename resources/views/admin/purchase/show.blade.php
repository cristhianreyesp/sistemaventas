@extends('layouts.admin')
@section('title','Detalles de compra')
@section('styles')

@endsection
@section('create')

@endsection
@section('options')

@endsection
@section('preference')

@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Detalles de compra
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="#">Compras</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalles de compra</li>
            </ol>
        </nav>
    </div>
    <div class="row">
              <div class="col-lg-12">
                  <div class="card px-2">
                      <div class="card-body">
                          <div class="container-fluid">
                            <h3 class="text-right my-5">Factura&nbsp;&nbsp;#N°-{{$purchase->id}}</h3>
                            <hr>
                          </div>
                          <div class="container-fluid d-flex justify-content-between">
                            <div class="col-lg-3 pl-0">
                              <p class="mt-5 mb-2"><b>{{$purchase->user->name}}</b></p>
                              <p>Calle San Martín 814,<br>Miraflores, Lima,<br> Perú.</p>
                            </div>
                            <div class="col-lg-3 pr-0">
                              <p class="mt-5 mb-2 text-right"><b>Factura a</b></p>
                              <p class="text-right">{{$purchase->provider->name}},<br> {{$purchase->provider->address}},<br> RUC: {{$purchase->provider->ruc_number}}</p>
                            </div>
                          </div>
                          <div class="container-fluid d-flex justify-content-between">
                            <div class="col-lg-3 pl-0">
                              <p class="mb-0 mt-5">Fecha Factura : {{$purchase->purchase_date}}</p>
                            </div>
                          </div>
                          <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                            <div class="table-responsive w-100">
                                <table class="table">
                                  <thead>
                                    <tr class="bg-dark text-white">
                                        <th>Producto</th>
                                        <th>Precio (PEN)</th>
                                        <th class="text-right">Cantidad</th>
                                        <th class="text-right">SubTotal (PEN)</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($purchaseDetails as $purchaseDetail)
                                    <tr class="text-right">
                                      <td class="text-left">{{$purchaseDetail->product->name }}</td>
                                      <td class="text-left">s/{{$purchaseDetail->price}}</td>
                                      <td>{{$purchaseDetail->quantity}}</td>
                                      <td>s/{{number_format($purchaseDetail->quantity*$purchaseDetail->price,2)}}</td>
                                    </tr>
                                   @endforeach
                                  </tbody>
                                  
                                </table>
                              </div>
                          </div>
                          <div class="container-fluid mt-5 w-100">
                            <p class="text-right mb-2">Sub - Total: s/{{number_format($subtotal,2)}}</p>
                            <p class="text-right">Tax ({{$purchase->tax}}%) : s/{{number_format($subtotal*$purchase->tax/100,2)}}</p>
                            <h4 class="text-right mb-5">Total : s/{{number_format($purchase->total,2)}}</h4>
                            <hr>
                          </div>
                          <div class="container-fluid w-100">
                            <a href="{{route('purchases.pdf', $purchase)}}" class="btn btn-primary float-right mt-4 ml-2"><i class="fa fa-print mr-1"></i>Imprimir</a>
                            <a href="#" class="btn btn-success float-right mt-4"><i class="fa fa-share mr-1"></i>Send Invoice</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/profile-demo.js') !!}
{!! Html::script('melody/js/data-table.js') !!}
@endsection
