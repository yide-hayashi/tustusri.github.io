@extends("base.layout")

@section("title","mysite")

<!-- 傳送資料到母模板，並指定變數為content -->
@section('IndexBody')
@if($user!="")
{{!! "已登錄".$user!!}}
@endif

<form id="form1" method="post" action="">
<!-- 自動產生 csrf_token 隱藏欄位-->
{!! csrf_field() !!}
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100 topresize">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form class="mx-1 mx-md-4">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="name" id="form3Example1c" class="form-control" placeholder="請輸入暱稱" value="{{old('name')}}"/>
                      <label class="form-label" for="form3Example1c">暱稱</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="form3Example3c" class="form-control"  name="account" placeholder="請輸入帳號" value="{{old('account')}}"/>
                      <label class="form-label" for="form3Example3c">帳號</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4c" class="form-control" name="password" placeholder="請輸入密碼" value="{{old('password')}}" />
                      <label class="form-label" for="form3Example4c">密碼</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4cd" class="form-control" name="password_confirm" placeholder="請確認密碼" value="{{old('password_confirm')}}" />
                      <label class="form-label" for="form3Example4cd">再輸入一次密碼</label>
                    </div>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-5">
                    @include('base.ValidatorError') 
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">註冊</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</form>

@endsection