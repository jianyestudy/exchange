<!doctype html>
<html lang="zh">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>系统设置</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="loading"><div id="loading-center"></div></div>
<div class="wrapper">
    <div class="iq-sidebar">
        <div class="iq-sidebar-logo d-flex justify-content-between">
            <a href={{ route('dashboard') }}>
                <img src="{{ Cache::get('logo') }}" class="img-fluid" alt="">
                <span>服务商管理后台</span>
            </a>

        </div>
        <div id="sidebar-scrollbar">
            <nav class="iq-sidebar-menu">
                <ul class="iq-menu">

                    <li class="active">
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
                        <a href="javascript:void(0);" class="iq-waves-effect"><i class="ri-user-settings-fill"></i><span>卡密管理 </span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
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
                                            <a class="bg-primary iq-sign-btn" href="{{ route('logout') }}" role="button">退出登录<i class="ri-login-box-line ml-2"></i></a>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="iq-card">
                                <div class="iq-card-body iq-bg-primary rounded">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="rounded-circle iq-card-icon bg-primary"><i class="ri-numbers-fill"></i></div>
                                        <div class="text-right">
                                            <h2 class="mb-0"><span class="counter">{{ $card->used ?? 0}}</span></h2>
                                            <h5 class="">兑换数量</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="iq-card">
                                <div class="iq-card-body iq-bg-warning rounded">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="rounded-circle iq-card-icon bg-warning"><i class="ri-pie-chart-2-fill"></i></div>
                                        <div class="text-right">
                                            <h2 class="mb-0"><span class="counter">{{ $card->sum ?? 0}}</span></h2>
                                            <h5 class="">开卡数量</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="iq-card">
                                <div class="iq-card-body iq-bg-danger rounded">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="rounded-circle iq-card-icon bg-danger"><i class="ri-calendar-todo-fill"></i></div>
                                        <div class="text-right">
                                            <h2 class="mb-0"><span class="counter">{{ ($card->sum - $card->used) ?? 0 }}</span></h2>
                                            <h5 class="">剩余卡数</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="iq-card">
                                <div class="iq-card-body iq-bg-info rounded">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="rounded-circle iq-card-icon bg-info"><i class="ri-newspaper-fill"></i></div>
                                        <div class="text-right">
                                            <h2 class="mb-0"><span class="counter">{{ $cardSum ?? 0 }}</span></h2>
                                            <h5 class="">卡密总数</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">兑换数据</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div id="echart1" style="height: 220px;"></div>
                        </div>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">最新兑换</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>卡号</th>
                                    <th>兑换码</th>
                                    <th>用户手机</th>
                                    <th>兑换时间</th>
                                    <th>所属代理</th>
                                </tr>
                                </thead><tbody>
                                @foreach($usedData as $value)
                                <tr>
                                    <td>{{ $value->card_number }}</td>
                                    <td><small>{{ $value->card_password  }}</small></td>
                                    <td>{{ $value->phone }}</td>
                                    <td>{{ $value->use_time }}</td>
                                    <td>{{ $value->user->nickname }}</td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

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
        <!-- Footer END -->
    </div>
</div>
<!-- Wrapper END -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/smooth-scrollbar.js"></script>
<script src="js/custom.js"></script>
<script src="js/echarts.min.js"></script>

<script>
    $(function () {
        echarts_1();
        function echarts_1() {
            var myChart = echarts.init(document.getElementById('echart1'));
            var uploadedDataURL = "/asset/get/s/data-1547533200844-7eBMgp66l.png";
            var dataIPSxAxis = {!!  $data['months'] ?? ''  !!};
            var dataIPS = {{ $data['used'] ?? 0}};
            option = {
                tooltip: { trigger: 'axis',
                },
                color: ["#0080ff", "#4cd5ce"],
                grid: {
                    left: '20',
                    right: '35',
                    top:'10%',
                    bottom: '0%',
                    containLabel: true
                },
                xAxis: [{
                    type: 'category',
                    boundaryGap: false,
                    data: dataIPSxAxis,
                    axisLabel: {
                        show: true,
                        textStyle: {
                            color: '#777',
                            //fontSize: 12,
                        },
                    },
                    axisLine: {
                        show: false
                    }
                }],

                yAxis: [{
                    type: 'value',
                    axisLine: {
                        onZero: false,
                        show: false,
                    },
                    axisLabel: {
                        show: true,
                        textStyle: {
                            color: '#777' //字体颜色
                        }
                    },
                    splitNumber: 3,
                    splitLine:{
                        show:true,
                        lineStyle:{
                            color:'#eee',
                            type:'dotted'
                        }
                    },
                }],
                series: [
                    {
                        name: '兑换',
                        type: 'line',
                        smooth: true,
                        //  symbol: "none", //去掉折线点
                        //	 stack: 100,
                        lineStyle: {
                            normal: {
                                width: 6,
                                color: {
                                    type: 'linear',

                                    colorStops: [{
                                        offset: 0,
                                        color: '#A9F387' // 0% 处的颜色
                                    }, {
                                        offset: 1,
                                        color: '#00a1b4' // 100% 处的颜色
                                    }],
                                    globalCoord: false // 缺省为 false
                                },
                                shadowColor: 'rgba(72,216,191, 0.3)',
                                shadowBlur: 10,
                                shadowOffsetY: 20
                            }
                        },
                        itemStyle: {
                            normal: {
                                color: '#fff',
                                borderWidth: 10,
                                /*shadowColor: 'rgba(72,216,191, 0.3)',
                                shadowBlur: 100,*/
                                borderColor: "#A9F387"
                            }
                        },
                        areaStyle:{

                            color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
                                offset: 0,
                                color: 'rgba(0,161,179,.2)' ,
                            }, {
                                offset: 1,
                                color: 'rgba(0,161,179,.0)' ,
                            }], false),

                        },symbolSize: 0, //折线点的大小
                        data: dataIPS,
                    },
                ]
            };
            myChart.setOption(option);
            window.addEventListener("resize",function(){
                myChart.resize();
            });
        }

    })
</script>

</body>
</html>
