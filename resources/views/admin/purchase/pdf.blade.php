<!DOCTYPE>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Reporte de compra</title>

<style>

html {
    font-size: 12px;
    line-height: 1.5;
    color: #000;
    background: #ddd;
    -moz-box-sizing: border-box;
    box-sizing: border-box
}

body {
    font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;

}

.container {
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 1rem;
    padding-right: 1rem
}



a {
    color: #0f42ba;
    text-decoration: none
}

p {
    margin: 0
}

.row {
    position: relative;
    display: block;
    width: 100%;
    font-size: 0
}

.col,
.logoholder,
.me,
.info,
.bank,
[class*="col-"] {
    vertical-align: top;
    display: inline-block;
    font-size: 1rem;
    padding: 0 1rem;
    min-height: 1px
}

.col-4 {
    width: 25%
}

.col-3 {
    width: 33.33%
}

.col-2 {
    width: 50%
}

.col-2-4 {
    width: 75%
}

.col-1 {
    width: 100%
}

.text-center {
    text-align: center
}

.text-right {
    text-align: right
}

.details {
    display: inline;
    margin: 0 0 0 .5rem;
    border: none;
    width: 50px;
    min-width: 0;
    background: transparent;
}

header {
    margin: 1rem 0 0;
    padding: 0 0 2rem 0;
    border-bottom: 3pt solid #003E68
}

header p {
    font-size: .9rem
}

header a {
    color: #000
}

.logo {
    margin: 0 auto;
    width: auto;
    height: auto;
    border: none;
    fill: #009688
}

.logoholder {
    width: 14%
}

.me {
    width: 30%
}

.info {
    width: 30%
}

.bank {
    width: 26%
}

.section {
    margin: 2rem 0 0
}


.client {
    margin: 0 0 3rem 0
}

h1 {
    margin: 0;
    padding: 0;
    font-size: 2rem;
    color: #003E68
}

.invoicelist-body {
    margin: 1rem
}

.invoicelist-body table {
    width: 100%
}

.invoicelist-body thead {
    text-align: left;
    border-bottom: 1pt solid #666
}

.invoicelist-body td,
.invoicelist-body th {
    position: relative;
    padding: 0.5rem
}


.invoicelist-body .control {
    display: inline-block;
    color: white;
    background: #009688;
    padding: 3px 7px;
    font-size: .9rem;
    text-transform: uppercase;
    cursor: pointer
}

.invoicelist-footer {
    margin: 1rem
}

.invoicelist-footer table {
    float: right;
    width: 40%
}

.invoicelist-footer table td {
    padding: 1rem 1rem 0 1rem;
    text-align: right
}

.invoicelist-footer table tr:nth-child(2) td {
    padding-top: 0
}

.invoicelist-footer table #total_price {
    font-size: 2rem;
    color: #003E68
}

</style>

<body>
  
<header class="row">
  <div class="logoholder text-center" >
  </div>
  <div class="me">
    <p>
      <strong>Sistema Web</strong><br>
      Calle San Martín 814,
      Miraflores,<br>
      Lima - Perú.
    </p>
  </div>
  <div class="bank">
    <p>
      Web: <a href="http://sistemaweb.com">www.sistemaweb.com</a><br>
      E-mail: <a href="mailto:admin@admin.com">admin@admin.com</a><br>
      Tel: 9999999
    </p>
  </div>
</header>

<div class="row section">
	<div class="col-2">
        <h1>Factura Compra</h1>
    </div>
    <div class="col-2 text-right details">
        <p>
        Fecha: {{$purchase->purchase_date}}<br>
        Factura #: N°-{{$purchase->id}}
        </p>
  </div>

  <div class="col-2">
    <p class="client">  
    Nombre: {{$purchase->provider->name}}<br>
    Dirección: {{$purchase->provider->address}}<br>
	Teléfono: {{$purchase->provider->phone}}<br>
	Email: {{$purchase->provider->email}}<br>
    Ruc:   {{$purchase->provider->ruc_number}}
    </p>
  </div>
</div> 


<div class="invoicelist-body">
  <table>
    <thead >
      <th width="10%">Cantidad</th>
      <th width="60%">Producto</th>
      
      <th width="15%">Precio (PEN)</th>
      <th width="15%">SubTotal (PEN)</th>
    </thead>
    <tbody>
    @foreach ($purchaseDetails as $purchaseDetail)
      <tr>
        <td width='10%'>{{$purchaseDetail->quantity}}</td>
        <td>{{$purchaseDetail->product->name}}</td>
        <td>s/ {{$purchaseDetail->price}}</td>
        <td>s/ {{number_format($purchaseDetail->quantity*$purchaseDetail->price,2)}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="invoicelist-footer">
  <table>
    <tr class="taxrelated">
      <td>Sub Total:</td>
      <td id="total_tax"> s/ {{number_format($subtotal,2)}}</td>
    </tr>
    <tr class="taxrelated">
      <td>Iva ({{$purchase->tax}}%):</td>
      <td id="total_tax">s/ {{number_format($subtotal*$purchase->tax/100,2)}}</td>
    </tr>
    <tr>
      <td><strong>Total:</strong></td>
      <td id="total_price">s/ {{number_format($purchase->total,2)}}</td>
    </tr>
  </table>
</div>
</body>

</html>
