<!doctype html>
<html lang="zh">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>管理员管理</title>
    <link rel="stylesheet" href="css/style.css">
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
                    </div>

                    <ul class="navbar-list">
                        <li>
                            <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                                <img src="images/user1.jpg" class="img-fluid rounded mr-3" alt="user">
                                <div class="caption">
                                    <h6 class="mb-0 line-height">{{ \Illuminate\Support\Facades\Auth::user()->nickname }}</h6>
                                    <span class="font-size-12">{{ \Illuminate\Support\Facades\Auth::user()->admin ? '超级管理员' : '代理商'}}</span>
                                </div>
                            </a>
                            <div class="iq-sub-dropdown iq-user-dropdown">
                                <div class="iq-card shadow-none m-0">
                                    <div class="iq-card-body p-0 ">
                                        <div class="bg-primary p-3">
                                            <h5 class="mb-0 text-white line-height">你好-{{ \Illuminate\Support\Facades\Auth::user()->nickname }}</h5>
                                        </div>

                                        <a href="profile-edit.html" class="iq-sub-card iq-bg-primary-hover">
                                            <div class="media align-items-center">
                                                <div class="rounded iq-card-icon iq-bg-primary">
                                                    <i class="ri-profile-line"></i>
                                                </div>
                                                <div class="media-body ml-3">
                                                    <h6 class="mb-0 ">修改密码</h6>
                                                </div>
                                            </div>
                                        </a>


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
                        <h4 class="card-title">管理员管理</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="topbtn">

                        <button type="button" class="btn btn-bg-gradient-x-purple-red" data-toggle="modal"
                                data-target="#myModal">新增管理员
                        </button>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>用户名</th>
                            <th>代理姓名</th>
                            <th>兑换数</th>
                            <th>开卡数</th>
                            <th>剩余数</th>
                            <th>上限数</th>
                            <th>编辑</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach( $result  as $key => $value)

                            <tr id ="update{{ $value->id }}">
                                <td>{{ $value->username ?? '' }}</td>
                                <td>{{ $value->nickname ?? '' }}</td>
                                <td>{{ $value->used ?? 0 }}</td>
                                <td>{{ $value->sum ?? 0 }}</td>
                                <td>{{ ($value->limit - $value->sum) ?? '' }}</td>
                                <td>{{ $value->limit ?? 0 }}</td>
                                <td>
                                    <a href="javascript:" data-toggle="modal" data-target="#myModal" onclick="editInfo({{ $value->id }})">修改</a>
                                    <a href="{{ route('managerDelete') }}/{{ $value->id }}" onclick="return confirm('确认删除');">删除</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    {{ $result->links() }}
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
                </div>
            </div>


        </div>
        <!-- Footer -->
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
        <!-- Footer END -->
    </div>
</div>
<div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('updateManager') }}" method="post">
            <div class="modal-header">
                <h5 class="modal-title">添加/修改管理员</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <input type="hidden" name="id" id="id" value="">
            <div class="modal-body">
                <div class="inputbox" style="width: 100%; max-width: 600px; margin: 0 auto;">
                    <h5 class="mt-2" style="padding-top: 0!important; margin-top: 0!important">用户名（手机号码）</h5>
                    <fieldset class="form-group">
                        <input type="text" name="username" id="username" class="form-control" value="">
                    </fieldset>

                    <h5 class="mt-2">登录密码（不修改请留空）</h5>
                    <fieldset class="form-group">
                        <input type="password" name="password" id="password" class="form-control" value="">
                    </fieldset>

                    <h5 class="mt-2">姓名（代理商名字）</h5>
                    <fieldset class="form-group">
                        <input type="text" name="nickname" id="nickname" class="form-control" value="">
                    </fieldset>


                    <h5 class="mt-2">卡密数（生成卡密数上限）</h5>
                    <fieldset class="form-group">
                        <input type="text" name="limit"  id="limit" class="form-control" value="">
                    </fieldset>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-def" data-dismiss="modal">关闭</button>
                <button type="submit" class="btn btn-danger">执行操作</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/smooth-scrollbar.js"></script>
<script src="js/custom.js"></script>
<script>
    function editInfo(id){
        const select = $('#update'+id);
        $('#id').val(id);
        $('#password').val('');
        $('#username').val(select.children('td').eq(0).text());
        $('#nickname').val(select.children('td').eq(1).text());
        $('#limit').val(select.children('td').eq(5).text());
    }
</script>
</body>
</html>
