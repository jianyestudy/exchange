<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
        <title>{{ Cache::get('platname')?? '体验卡兑换' }}</title>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            .logo-window {
                margin-top: 110px;
                height: 180px;
            }
            .logo{
                width: 140px;
                height: 140px;
            }
        </style>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
    </head>
    <body style="background: url('../images/bg.jpg') no-repeat center;">
    <div class="row">
        <div class="col logo-window">
            <div class="container">
            <img src="../images/logo.png" class="mx-auto d-block logo rounded-circle">
            </div>
            <h5 class="font-weight-bold text-center" style="margin-top: 10px;color: white">{{ Cache::get('platname')?? '体验卡兑换' }}</h5>
        </div>

        <form class="mx-auto" style="width: 70%;margin-top: 20px" action="{{ route('exchange') }}" method="post">
            <div class="input-group mb-3 input-group-lg">
                <div class="input-group-prepend">
                    <i class="input-group-text bi bi-person-lines-fill" style="background-color:white"></i>
                </div>
                <input type="text" class="form-control" placeholder="手机号码"  name="phone">
            </div>
            <div class="input-group mb-3 input-group-lg">
                <div class="input-group-prepend">
                    <i class="input-group-text bi bi-file-lock2-fill" style="background-color:white"></i>
                </div>
                <input type="text" class="form-control"  placeholder="卡号" name="card_number">
            </div>

            <div class="input-group mb-3 input-group-lg">
                <div class="input-group-prepend">
                    <i class="input-group-text  bi bi-file-lock2-fill" style="background-color:white"></i>
                </div>
                <input type="password" class="form-control" placeholder="密码" name="card_password">
            </div>
            @if (isset($errors) && count($errors) > 0)
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="color:red">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(!empty(session('success')))
                <div style="color:red">
                    {{session('success')}}
                </div>
            @endif
            <button type="submit" class="btn btn-primary btn-lg" style="width: 45%">兑换</button>
            <button type="reset" class="btn btn-secondary btn-lg" style="width: 45%;float: right">重置</button>

            <div class="small" style="margin-top: 21%">
                <h6 style="font-size: 15px">注意事项：</h6>
                <h6 style="font-size: 15px">本兑换一次有效,请务必认真填写信息。</h6>
            </div>
        </form>

        <div class="mx-auto" style="margin-top:15%">
            <h6 style="font-size: 15px">Copyright 2021 {{ Cache::get('platname')?? '体验卡兑换' }} </h6>
            <h6 style="font-size: 15px;text-align: center">{{ Cache::get('telphone') ?? '' }}</h6>
        </div>


    </div>


    </body>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</html>
