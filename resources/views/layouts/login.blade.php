<!DOCTYPE html>
<html lang="en">

 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sistema De Venta</title>
  {!! Html::style('melody/vendors/iconfonts/font-awesome/css/all.min.css') !!}
  {!! Html::style('melody/vendors/css/vendor.bundle.base.css') !!}
  {!! Html::style('melody/vendors/css/vendor.bundle.addons.css') !!}
  {!! Html::style('melody/css/style.css') !!}
  <link rel="shortcut icon" href="melody/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end"></p>
          </div>

          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <center><img class="ml-6" src="{{asset('melody/images/logo-grande.png')}}" alt="logo"></center>
              </div>
              <h4>IBGROUP S.A.C</h4>
              <h6 class="font-weight-light">Corporación IBGROUP (GRUPO IBCORP) es un holding peruano cuya actividad se enfoca en la ingeniería, la construcción de infraestructura y servicios diversos orientados principalmente clientes corporativos. </h6>

              @yield('content')

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {!! Html::script('melody/vendors/js/vendor.bundle.base.js') !!}
  {!! Html::script('melody/vendors/js/vendor.bundle.addons.js') !!}
  {!! Html::script('melody/js/off-canvas.js') !!}
  {!! Html::script('melody/js/hoverable-collapse.js') !!}
  {!! Html::script('melody/js/misc.js') !!}
  {!! Html::script('melody/js/settings.js') !!}
  {!! Html::script('melody/js/todolist.js') !!}
</body>

</html>
