<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ get_option('site_title', config('app.name')) }}</title>
        <link rel="stylesheet" href="{{ asset('backend/plugins/bootstrap/css/bootstrap.min.css') }}">
        <link href="{{asset('template/css/styles.css')}}" rel="stylesheet" />
        <link href="{{ asset('backend/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />

        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        
        
   <style>
    .form-control, .datatable-input {

    background-color: #e9ebeb !important;
    border-radius: 0px !important;
}

.btn {

    border-radius: 0px !important;
}
.report-header {
    text-align: center;
    padding: 10px 0px;
}
.mtop{
    margin-top:32px !important;
}
.nav-tabs {
    --bs-nav-tabs-border-width: 0px !important;

}
.borderright{

    border-right: 1px solid #495057;
}

   </style>
   
    </head>
    <body class="sb-nav-fixed">
     

    @include('backend.layouts.sidebar')

    <main>
    @if(session('success'))
    <div class="container">
        <div class="row mt-2">
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="container">
        <div class="row mt-2">
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        </div>
    </div>
@endif
        @yield('content') <!-- Content from other views will be inserted here -->
    </main>

    @include('backend.layouts.footer')

</body>
</html>
