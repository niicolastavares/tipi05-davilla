<!doctype html>
<html lang="pt-br">

<!--begin::Head-->
<head>
    @include('admin.partials.head')
</head>

<!--end::Head-->
<!--begin::Body-->

<body class="login-page bg-body-secondary">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ asset('/') }}"><b>DaVilla</b> Dashboard</a>
        </div>

        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Acesso ao Painel Administrativo - DaVilla</p>
                @if(session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-warning" role="alert">
                        Verifique os dados (Email / Senha) e tente novamente.
                    </div>
                @endif

                <form action="{{ route('admin.login.autenticar') }}" method="post">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="email" name="email_usuario" class="form-control" placeholder="Email" />
                        <div class="input-group-text">
                            <span class="bi bi-envelope"></span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="senha_usuario" class="form-control" placeholder="Password" />
                        <div class="input-group-text">
                            <span class="bi bi-lock-fill"></span>
                        </div>
                    </div>
                    <!--begin::Row-->
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Sign In</button>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!--end::Row-->
                </form>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    @include('admin.partials.script')
    
</body>
<!--end::Body-->

</html>