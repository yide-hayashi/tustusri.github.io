@extends("base.layout")

@section("title","mysite")

<!-- 傳送資料到母模板，並指定變數為content -->
@section('IndexBody')
<style>
    .divider:after,
    .divider:before {
    content: "";
    flex: 1;
    height: 1px;
    background: #eee;
}
.container {
    width: 80vw;
}
</style>
<script>
    $(function(){
        $(".form-check").click(function(){
            change();
        }
        );
        $(".form-check-label").click(function(){
            change();
        });

    });
    function change()
    {
        var value=$(".form-check-input").val();
        if(value==0)
        {
            document.getElementsByClassName("form-check-input")[0].value=1;
            
        }
        else
        {
            document.getElementsByClassName("form-check-input")[0].value=0;
        }
    }
 </script>
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
          class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
         @if($succeed!="")
            {{$succeed }}
         @endif
         @auth
           {{!! "已被認證"!!}}
         @endauth
        <form method="post" action="">
            <!-- 自動產生 csrf_token 隱藏欄位-->
            {!! csrf_field() !!}
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="form1Example13" name="email" class="form-control form-control-lg" value="{{old('email')}}"/>
            <label class="form-label" for="form1Example13">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" id="form1Example23" name="pw" class="form-control form-control-lg" value="{{old('pw')}}"/>
            <label class="form-label" for="form1Example23">Password</label>
          </div>

          <div class="d-flex justify-content-around align-items-center mb-4">
            <!-- Checkbox -->
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="remember" value="1" id="form1Example3" checked />
              <label class="form-check-label" for="form1Example3"> Remember me </label>
            </div>
            <a href="#!" style="display:none">Forgot password?</a>
          </div>

          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0 text-muted"></p>
          </div>
          <div class="login_error">
                <!-- 錯誤訊息模板元件 -->
                @include('base.ValidatorError')  <!--出現錯誤時會request 才會把模板秀出來-->
            </div>

        </form>
      </div>
    </div>
  </div>
</section>
@endsection