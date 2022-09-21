<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Validator;
use Hash;
use App\Models\User; //ORM
use Illuminate\Support\Facades\Log; //log紀錄
use DB; //紀錄QSL存入語法
use Illuminate\Support\Facades\Auth;
use App\Models\Home;
use Illuminate\Http\Request;
class UserAuthController extends Controller
{
    //首頁
    public function signUpPage()
    {
        if(auth()->check())
        {
            $homedata=Home::where("HomeID","1")->get();
            $PopNameTag=["PopupSetting","IndexContent","PortfoliotitleSetting","creatProjectPotup","creatAboutMePotup","contactPotup"];
            $navigationlinkTag=["#portfolio","#about","#team"];
            $menu=$homedata[0]->Pids->where("Pid",">","1")->select("PageName")->get()->toArray();
            $name="sign_up"; //為了分辨誰傳來
            $user="";
            if(auth()->viaRemember())
            {
                $user="ture";
            }
            $binding=[
                "manager"=>true,
                "title"=>"登錄",
                "name"=>$name,
                "user"=>$user,
                "navigationlinkTag"=>$navigationlinkTag,
                "homedata"=>$homedata[0],
                "PopNameTag"=>$PopNameTag,
                "menu"=>$menu
            ];
            return View("auth.sign-up",$binding); 
        }
        return redirect("/");
    }
        //處理註冊資料
    public function signUpProcess()
    {
        //接收輸入資料
        $input = request()->all();

        //驗證規則
        $rules = [
            //暱稱
            'name' => [
                'required',
                'max:50',
            ],
            //帳號(E-mail)
            'account' => [
                'required',
                'max:50',
                'email',
            ],
            //密碼
            'password' => [
                'required',
                'min:5',
            ],
            //密碼驗證
            'password_confirm' => [
                'required',
                'same:password',
                'min:5'
            ],
        ];

        //驗證資料
        $validator = Validator::make($input, $rules);

        if($validator->fails())
        {
            //資料驗證錯誤
            return redirect('/user/auth/sign-up')
            ->withErrors($validator) 
            ->withInput(); 
        }
        $input['password']=Hash::make( $input['password']); //Hash加密

        Log::notice(print_r($input, true));
           //啟用紀錄SQL語法
        DB::enableQueryLog();

        User::create($input);// 塞入user ORM's model 再丟進SQL
            //取得目前使用過的SQL語法
        Log::notice(print_r(DB::getQueryLog(), true));
        return redirect('managerpage');
        exit;
        
    }
    public function signOut()
    {
        auth::logout();
        $name="logout";
        $user="";
        $binding=[
            "name"=>$name,
            "user"=>$user,
        ];
        return redirect("user\auth\login");
    }
    public function loginpage()
    {
        
        if(auth::check())
        {
            return redirect("/managerpage");
        }
        else
        {
            
            return View("auth.login",["succeed"=>""]); 
        }
    }
    public function loginpagePost(Request $request)
    {
        try{

  
            //字串驗證處理
            //接收輸入資料
            $input = request()->all();

            //驗證規則
            $rules = [
                //暱稱
                'email' => [
                    'required',
                    'max:50',
                ],
                //密碼
                'pw' => [
                    'required',
                    'min:5',
                ],
            ];

            //驗證資料
            $validator = Validator::make($input, $rules);

            if($validator->fails())
            {
                //資料驗證錯誤
                return redirect('/user/auth/login')
                ->withErrors($validator)
                ->withInput();
                         
            }
        
            //登陸驗證
            if(request()->remember=="1")
            {
            
                if(auth::attempt([
                    "account"=>request()->input("email"),
                    "password"=>request()->input("pw"),
                    /* "資料庫欄位"=>request()->input("get/post進來的欄位")  */
                    ],request()->filled("remember"))) //會把remember_token 給特定隨機亂數
                    {
                        return redirect('/managerpage'); 
                    }
                    
            }
            else{
                //不會給remember_token 東西
                if(auth::attempt([
                    "account"=>request()->input("email"),
                    "password"=>request()->input("pw"),
                    ]))
                    {
                        return redirect('/managerpage'); 
                    }
            }
            return View("auth.login",["title"=>"登陸測試","name"=>"loginpage","succeed"=>"登陸失敗，請從新登錄"]);
        }
        catch(Throwable $e)
        {
            if(Str::contains($e->getMessage(),"SQLSTATE[HY000] [2002]")) //SQL server拒絕連線 SQL沒開機/SQL連線錯誤
            {
                return View("auth.login",["title"=>"登陸測試","name"=>"loginpage","succeed"=>"登陸失敗，請從新登錄"]);
                Log::error($e);
            }
            else
            {
                Log::error($e);
            }
           
        }
        // var_dump($input,request()->remember);
    }
}
