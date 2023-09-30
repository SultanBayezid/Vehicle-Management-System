<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ get_company_option('company_name') }}</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{asset('template/css/styles.css')}}" rel="stylesheet" />
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
        @yield('content') <!-- Content from other views will be inserted here -->
    </main>

    @include('backend.layouts.footer')

</body>
</html>
