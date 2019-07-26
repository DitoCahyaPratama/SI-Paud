<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">SI<b>PAUD</b></a>
            <small>- Sistem Informasi Pendidikan Anak Usia Dini -</small>
        </div>
        <div class="card">
            <div class="body">
                <form onsubmit="system_login(); return false" id="form_login">
                    <div class="msg">Sign in to start your session</div>
                    <div id="sukses">
                        <div class="alert alert-info" role="alert">
                            Login berhasil !!
                        </div>
                    </div>
                    <div id="gagal" class="alert alert-danger" role="alert">
                                        
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" id="uname" name="uname" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" id="upass" name="upass" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="assets/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="assets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="assets/js/admin.js"></script>
    <script type="text/javascript">
            $('#sukses').hide();
            $('#gagal').hide();
            function system_login(){
                var form = $('#form_login');
                var uname = $('#uname').val();
                var upass = $('#upass').val();
                $.ajax({
                    url: 'server.php?p=login',
                    data: {
                        uname:uname,
                        upass:upass
                    },
                    type: 'POST',
                    success:function(res){
                        if(res == 'sukses'){
                            $('#sukses').show();
                            $('#gagal').hide();
                            setInterval(function(){ 
                                document.location = 'index.php';   
                            }, 3000);
                        }else{
                            document.getElementById('gagal').innerHTML = res;
                            $('#gagal').show();
                        }
                    },
                    error:function(err){
                        alert(err);
                    }
                })
            }
        </script>
</body>

</html>