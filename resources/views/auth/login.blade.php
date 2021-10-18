<!doctype html>
<html lang="zh">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>用后登录页</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="loading"><div id="loading-center"></div></div>

<!-- loader END -->
<!-- Sign in Start -->
<!-- loader END -->
<!-- Sign in Start -->
<section class="sign-in-page">
    <div class="container sign-in-page-bg mt-5 p-0">
        <div class="row no-gutters">
            <div class="col-md-6 text-center">
                <div class="sign-in-detail text-white">
                    <a class="sign-in-logo mb-5" href="#"><img src="images/logo-white.png" class="img-fluid" alt="logo"></a>
                    <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                        <div class="item">
                            <img src="images/login/1.png" class="img-fluid mb-4" alt="logo">
                            <h4 class="mb-1 text-white">体检卡服务中心</h4>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6 position-relative">
                <div class="sign-in-from">
                    <h1 class="mb-0">用户登录</h1>
                    <form class="mt-4" action="{{ route('auth') }}" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="margin: 20px 0 0 0">用户名</label>
                            <input type="text" name="username" class="form-control mb-0" id="exampleInputEmail1" placeholder="输入您的代理商手机号码。">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"  style="margin: 20px 0 0 0">密码</label>

                            <input type="password" name="password" class="form-control mb-0" id="exampleInputPassword1" placeholder="请输入密码">
                        </div>
                        <div class="d-inline-block w-100"  style="padding: 10px 0">
                            <div class="custom-control custom-checkbox d-inline-block">
                                <input type="checkbox" name= "remember" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">记住我</label>
                            </div>
                            @if (isset($errors) && count($errors) > 0)
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <button type="submit" class="btn btn-primary float-right">登录</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/smooth-scrollbar.js"></script>
<script src="js/owl.carousel.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>
