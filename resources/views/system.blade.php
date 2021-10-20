<!doctype html>
<html lang="zh">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>基本设置</title>
      <link rel="stylesheet" href="css/style.css">

   </head>
   <body>
<div id="loading"><div id="loading-center"></div></div>
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




                                 <div class="d-inline-block w-100 text-center p-3">
                                    <a class="bg-primary iq-sign-btn" href="{{ Route('logout') }}" role="button">退出登录<i class="ri-login-box-line ml-2"></i></a>
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
                        <h4 class="card-title">基本设置</h4>
                     </div>
                  </div>
                  <div class="iq-card-body">
                      <form action="{{ route('systemUpdate') }}" method="post" enctype="multipart/form-data">
                     <div class="inputbox" style="width: 100%; max-width: 600px; margin: 0 auto;">
                        <ul class="row">
                        <li class="col-md-9">
                            @foreach($result as $value)
                            @if ($value->key === 'logo')
                                    <h5 class="mt-2">{{ $value->title }}</h5>
                                    <fieldset class="form-group">
                                        <input type="file"  name= "{{ $value->key }}" class="form-control-file" id="exampleFormControlFile1" value="{{ $value->value }}">
                                    </fieldset>
                            @else
                                    <h5 class="mt-2">{{ $value->title }}</h5>
                                    <fieldset class="form-group">
                                        <input type="text" name= "{{ $value->key }}" class="form-control" value="{{ $value->value }}">
                                    </fieldset>
                            @endif
                            @endforeach
                        <li class="col-md-3">
                           <div class="headedit text-center">
                         <strong>前端logo</strong>
                         <div class="imgbox">
                              <img class="roundimg" src="/{{ Cache::get('logo') }}" width="100">
                              </div>
                         </div>
                           </li>
                        </ul>
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
                             <div class=" text-center">
                           <button class="btn btn-primary" type="submit">保存修改</button>
                           </div>
                         </div>
                       </form>
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
   </body>
</html>
