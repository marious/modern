<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <base href="http://modern.dev"> -->
        <title>@section('browserTitle') App: Home @show</title>
        <!-- Bootstrap CSS -->
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="/assets/css/bootstrap-theme.min.css" rel="stylesheet">
        <!-- Custom style -->
        <link rel="stylesheet" href="/assets/css/style.css">

    </head>
    <body>
        @include('partials/_nav')

        @yield('outSideContainer')

        <div class="container">
            <div class="row">
                <div class="col-md-12 push-down">
                    @yield('containerContent')
                </div>
            </div>

        </div>

       <footer>
        copyright &copy; <?php echo date('Y'); ?>
      </footer>


        <!-- jQuery -->
        <script src="/assets/js/jquery-1.11.2.min.js"></script>
        <script src="/assets/js/jquery-validate.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="/assets//js/bootstrap.min.js"></script>

        @if (App\auth\LoggedIn::user() && (App\auth\LoggedIn::user()->access_level == 2))
            <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.4.5/ckeditor.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>
        @endif

        @yield('script')
        @include('admin/admin-js');
    </body>

</html>