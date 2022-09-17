<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\PageName;
use Illuminate\Support\Facades\Storage;

class ManagePage extends Controller
{
    public function manageIndex()
    {
         $homedata=Home::where("HomeID","1")->get();
         $PopNameTag=["PopupSetting","IndexContent"];
         $menu=$homedata[0]->Pids->where("Pid",">","1")->select("PageName")->get()->toArray();
         
        return View("manage",["manager"=>"true","homedata"=>$homedata[0],"PopNameTag"=>$PopNameTag,"menu"=>$menu]);
    }
    //從資料庫取直 CURD 
    //
    public function updateImg(Request $request)
    {
        $request->input("fileToUpload");
        Storage::put("/img/".$request->file('fileToUpload')->getClientOriginalName(),
file_get_contents($request->file('fileToUpload')));

        // $img=Home::where("Pid",1);
        // $img->update(["LogoImg"=>$request->file('fileToUpload')])
        // ->save();
        //return View("manage",["manager"=>"true"]);
        return $request->file('fileToUpload')->getClientOriginalName();
        //
    }

}
