<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex">
    <meta name="server" content="app.spp.co">
    <!-- Favicon -->
    <link rel="icon" href="images/favicon.png" sizes="32x32">

    <title>
        Admin Portal | MyBlogs</title>

    <link rel="stylesheet" href="https://use.typekit.net/qhc0gdo.css">
    <link rel="stylesheet" href="/css/19-10/spp_clients.css">

    <script src="https://kit.fontawesome.com/51761b1c6c.js"></script>
    <style type="text/css" data-css-vars>
        :root {}
    </style>




</head>

<body class="vertical-center">
    <div class="container-fluid">

        <div class="navbar navbar-public">
            <a href="/" class="navbar-brand">
                MyBlogs
            </a>
        </div>

        <main class="content">
            <div id="status"></div>
            <div id="notification-menu-items" class="hide-js">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <i class="fas fa-bell"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-item">Notifications</div>

                    <div class="dropdown-item empty disabled">You're all caught up 👏</div>

                    <div class="dropdown-item">
                        <div class="row">
                            <a href="/notifications" class="col" data-pjax>See all</a>
                            <a href="/notifications/clear" class="col text-right" data-read>Mark as read</a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container container-xs">

                <form role="form" method="post" action="{{ route('admin.authenticate') }}">
                  
                    @csrf
                    <h1 class="text-center">Welcome back!</h1>


                    <div class="form-label-group">
                        <input type="email" class="form-control" name="email" id="email" value=""
                            placeholder="Email" autofocus required>

                        <label for="email">Email</label>
                    </div>

                    <div class="form-label-group">
                        <input type="password" class="form-control" name="password" id="password" value=""
                            placeholder="Password" required>

                        <label for="password">Password</label>
                    </div>

                    <div class="form-group F">
                        <input type="hidden" value="1" name="remember">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">Sign in</button>
                    </div>

                    
                </form>
            </div>
        </main>

        <footer class="pt-3">&nbsp;</footer>

        <div class="modal" id="spp-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content"></div>
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script>
            !window.jQuery && document.write('<script src="/js/jquery-3.5.1.min.js"><\/script>')
        </script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js"
            integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>



        <script src="js/jquery.pjax.js?v=08-10"></script>
        <script src="js/27-10/spp_clients.js"></script>






    </div>
    <script>
        $('.custom-control-input').click(function() {
            $('#button1').show();
            $('#button2').hide();
            $('#button3').hide();
            $('#button4').hide();
            $('#buttonu').show();
            $('#buttond').hide();
            $('#buttons').hide();
            $('#buttonc').hide();
        });
        $('#perfectmoney').click(function() {
            console.log('asd');
            if ($('#perfectmoney').is(':checked')) {
                $('#button1').hide();
                $('#button3').hide();
                $('#button2').show();
                $('#buttonu').hide();
                $('#buttons').hide();
                $('#buttond').show();
                var email = $('#email').val();
                if ($('#email').val() == '') {
                    $("#email").css({
                        "border-color": "red"
                    });
                    $("#email").focus();
                }
                var href = $('body').find('#perfectspan').val();
                $("#button2").attr("href", href + '&email=' + email);
                $("#buttond").attr("href", href + '&email=' + email);
            }

        });

        $(document).ready(function() {
            //  alert('asd');
            if ($('#perfectmoney').is(':checked')) {

                $('#paypal').trigger('click');



            }

        });

        $('#stripe').click(function() {
            if ($('#stripe').is(':checked')) {

                $('#button1').hide();
                $('#button3').show();
                $('#button2').hide();
                $('#buttonu').hide();
                $('#buttond').hide();
                $('#buttons').show();
                var email = $('#email').val();
                if ($('#email').val() == '') {
                    $("#email").css({
                        "border-color": "red"
                    });
                    $("#email").focus();

                }
                var href = $('body').find('#stripespan').val();
                $("#button3").attr("href", href + '&email=' + email);
                $("#buttons").attr("href", href + '&email=' + email);
            }


        });

        $(document).ready(function() {
            if ($('#stripe').is(':checked')) {
                $('#paypal').trigger('click');

            }

        });

        $('#coin').click(function() {
            if ($('#coin').is(':checked')) {

                $('#button1').hide();
                $('#button3').hide();
                $('#button4').show();
                $('#button2').hide();
                $('#buttonu').hide();
                $('#buttond').hide();
                $('#buttons').hide();
                $('#buttonc').show();
                var email = $('#email').val();
                if ($('#email').val() == '') {
                    $("#email").css({
                        "border-color": "red"
                    });
                    $("#email").focus();

                }
                var href = $('body').find('#coinspan').val();
                $("#button4").attr("href", href + '&email=' + email);
                $("#buttonc").attr("href", href + '&email=' + email);
            }


        });

        $(document).ready(function() {
            if ($('#stripe').is(':checked')) {
                $('#paypal').trigger('click');

            }

        });
        $('#button2').click(function() {
            var email = $('#email').val();
            if ($('#email').val() == '') {
                $("#email").css({
                    "border-color": "red"
                });
                $("#email").focus();
                return false;
            }

            $('#buttond').attr('href', function(index, attr) {
                return attr + '&email=' + email;
            });
            var butston = $('body').find('#buttond').attr('href');
            $('#button2').trigger('click');
            console.log(butston);
        });
        $('#button3').click(function() {
            var email = $('#email').val();
            if ($('#email').val() == '') {
                $("#email").css({
                    "border-color": "red"
                });
                $("#email").focus();
                return false;
            }

            $('#buttons').attr('href', function(index, attr) {
                return attr + '&email=' + email;
            });
            var butston = $('body').find('#buttons').attr('href');
            $('#button3').trigger('click');
            console.log(butstos);
        });
        $('#button4').click(function() {
            var email = $('#email').val();
            if ($('#email').val() == '') {
                $("#email").css({
                    "border-color": "red"
                });
                $("#email").focus();
                return false;
            }

            $('#buttons').attr('href', function(index, attr) {
                return attr + '&email=' + email;
            });
            var butston = $('body').find('#buttons').attr('href');
            $('#button4').trigger('click');
            console.log(butstos);
        });
        $('#buttond').click(function() {
            var email = $('#email').val();
            if ($('#email').val() == '') {
                $("#email").css({
                    "border-color": "red"
                });
                $("#email").focus();
                return false;
            }
        });

        $('#buttonc').click(function() {
            var email = $('#email').val();
            if ($('#email').val() == '') {
                $("#email").css({
                    "border-color": "red"
                });
                $("#email").focus();
                return false;
            }
        });
        $("#email").focusout(function() {
            if ($('#email').val() == '') {
                $("#email").css({
                    "border-color": "red"
                });
                $("#email").focus();

            }
            if ($('#perfectmoney').is(':checked')) {
                var email = $('#email').val();
                var href = $('body').find('#perfectspan').val();
                $("#button2").attr("href", href + '&email=' + email);
            }
            if ($('#stripe').is(':checked')) {
                var email = $('#email').val();
                var href = $('body').find('#stripespan').val();
                $("#button3").attr("href", href + '&email=' + email);
            }
        });
    </script>
</body>

</html>
<style>
    #button2,
    #button3,
    #button4,
    #button5 {
        width: 100%;
        color: #fff;
        background: #007bff;
    }
</style>
