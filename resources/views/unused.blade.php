<!doctype html>
<html lang="zh">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>未兑换卡密</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div id="loading">
    <div id="loading-center"></div>
</div>
<div class="wrapper">
    <!-- Sidebar  -->
    <div class="iq-sidebar">
        <div class="iq-sidebar-logo d-flex justify-content-between">
            <a href="{{ route('dashboard') }}">
                <img src="{{ Cache::get('logo') }}" class="img-fluid" alt="">
                <span>服务商管理后台</span>
            </a>

        </div>
        <div id="sidebar-scrollbar">
            <nav class="iq-sidebar-menu">
                <ul class="iq-menu">

                    <li>
                        <a href="{{ route('dashboard') }}" class="iq-waves-effect"><i class="ri-home-8-fill"></i><span>首页</span></a>
                    </li>

                    @if (\Illuminate\Support\Facades\Auth::user()->admin)
                        <li>
                            <a href="javascript:void(0);" class="iq-waves-effect"><i class="ri-settings-5-fill"></i><span>系统设置</span><i
                                    class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                            <ul class="iq-submenu">
                                <li><a href="{{ route('system') }}">基本设置</a></li>
                                <li><a href="{{ route('manager') }}">管理员管理</a></li>

                            </ul>
                        </li>
                    @endif


                    <li>
                        <a href="javascript:void(0);" class="iq-waves-effect"><i
                                class="ri-user-settings-fill"></i><span>卡密管理 </span><i
                                class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul class="iq-submenu">
                            <li><a href="{{ Route('create') }}">卡密生成</a></li>
                            <li><a href=" {{  route('used') }}/1 ">未兑换</a></li>
                            <li><a href="{{ route('used') }}">已兑换</a></li>

                        </ul>
                    </li>


                </ul>
            </nav>
            <div class="p-3"></div>
        </div>
    </div>

    <!-- Page Content  -->
    <div id="content-page" class="content-page">
        <!-- TOP Nav Bar -->
        <div class="iq-top-navbar">
            <div class="iq-navbar-custom">

                <nav class="navbar navbar-expand-lg navbar-light p-0">

                    <div class="iq-search-bar">
                        <form action="{{ route('unused') }}/1" method="get">
                            <input type="text" name="card_number" class="text search-input" placeholder="请输入卡号搜索内容...">
                            <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                        </form>
                    </div>

                    <ul class="navbar-list">
                        <li>
                            <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                                <img src="../images/user1.jpg" class="img-fluid rounded mr-3" alt="user">
                                <div class="caption">
                                    <h6 class="mb-0 line-height">{{ \Illuminate\Support\Facades\Auth::user()->nickname }}</h6>
                                    <span
                                        class="font-size-12">{{ \Illuminate\Support\Facades\Auth::user()->admin ? '超级管理员' : '代理商'}}</span>
                                </div>
                            </a>
                            <div class="iq-sub-dropdown iq-user-dropdown">
                                <div class="iq-card shadow-none m-0">
                                    <div class="iq-card-body p-0 ">
                                        <div class="bg-primary p-3">
                                            <h5 class="mb-0 text-white line-height">
                                                你好-{{ \Illuminate\Support\Facades\Auth::user()->nickname }}</h5>
                                        </div>


                                        <div class="d-inline-block w-100 text-center p-3">
                                            <a class="bg-primary iq-sign-btn" {{ Route('logout') }} role="button">退出登录<i
                                                    class="ri-login-box-line ml-2"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>
        <!-- TOP Nav Bar END -->
        <div class="container-fluid">

            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">未兑换卡密管理</h4>
                    </div>

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

                @if(!empty(session('success')))
                    <div class="alert alert-success" role="alert">
                        {{session('success')}}
                    </div>
                @endif
                <div class="iq-card-body">
                    <form action="{{ route('unused') }}/1" method="get">
                    <div class="topbtn">

                        <a href="#" class="btn btn-bg-gradient-x-purple-red" data-toggle="modal" data-target="#myModal">导出未激活卡密</a>

                    </div>
                    <div class="selbox">
                        <div class="form1">
                            <ul class="row">
                                <li class="col-xs-4">
                                    <span>卡号：</span>
                                    <input type="text" name="card_number" class="form-control">
                                </li>

                                <li class="col-xs-4">
                                    <span>手机：</span>
                                    <input type="text" name="phone" class="form-control">
                                </li>
                                <li class="col-xs-4" style="padding-left: 10px">
                                    <button class="btn btn-primary" type="submit">查询</button>
                                    <a href="{{ route('unused') }}/1" class="btn btn-default">重置</a>
                                    <a class="btn" role="button" data-toggle="collapse" href="#collapseExample"
                                       aria-expanded="false" aria-controls="collapseExample">更多查询条件</a>

                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="collapse in" id="collapseExample" aria-expanded="true">
                        <div class="form1">
                            <ul class="row">
                                <li class="col-xs-4">
                                    <span>代理：</span>
                                    <input type="text" name="nickname" class="form-control" style="min-width:230px;">
                                </li>
                                <li class="col-xs-4">
                                    <span>兑换：</span>
                                    <input type="text" name="date" class="form-control " id="date" style="min-width:230px;"
                                           placeholder="请选择起止时间" lay-key="1">
                                </li>


                            </ul>
                        </div>
                    </div>
                    </form>
                <table class="table">
                    <thead>
                    <tr>
                        <th>卡号</th>
                        <th>密码</th>
                        <th>创建时间</th>
                        <th> 状态</th>
                        <th> 所属代理</th>
                        <th> 操作</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $result as $key => $value)
                    <tr>
                        <td>{{ $value->card_number }}</td>
                        <td>{{ $value->card_password }}</td>
                        <td>{{ $value->created_at }}</td>
                        <td>{!! $value->is_use ? '<span class="badge badge-error">已激活</span>':'<span class="badge badge-success">未激活</span>' !!}</td>
                        <td>{{ $value->user->nickname }}</td>
                        <td><a href="{{ route('deleteCard') }}/{{ $value->id }}" class="btn btn-danger">删除</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
               {{ $result->links() }}

            </div>

        </div>



    <!-- Footer -->
    <footer class="bg-white iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">

                </div>
                <div class="col-lg-6 text-right">
                    Copyright 2021 <a href="#">{{ Cache::get('platname') }}</a> 版权所有
                </div>
            </div>
        </div>
    </footer>
    </div>
    <!-- Footer END -->
</div>


<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/smooth-scrollbar.js"></script>
<script src="../js/custom.js"></script>

<script src="../laydate/laydate.js"></script>
<script>
    lay('#version').html('-v' + laydate.v);
    laydate.render({
        elem: '#date'
        , range: true
        , theme: '#2c9eae'
    });
</script>
</body>
</html>
