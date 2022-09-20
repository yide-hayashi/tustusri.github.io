<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\protfolio;
use App\Models\Home;
use App\Models\PageName;
use App\Models\ProtfolioContent;
use App\Models\History;
use App\Models\AboutmeTitle;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Api;

class ManagePage extends Controller
{
    public function manageIndex()
    {
         $homedata=Home::where("HomeID","1")->get();
         $PopNameTag=["PopupSetting","IndexContent","PortfoliotitleSetting","creatProjectPotup","creatAboutMePotup"];
         $menu=$homedata[0]->Pids->where("Pid",">","1")->select("PageName")->get()->toArray();
         $protfolioData=Protfolio::where("Pid","2")->get();
         $protfolioPojectsData=ProtfolioContent::where("Pid","2")->orderBy("updated_at","asc")->get();
         $AboutmeData=AboutmeTitle::where("Pid","3")->get();
        return View("manage",["manager"=>"true",
        "homedata"=>$homedata[0],
        "protfolioData"=>count($protfolioData)>0? $protfolioData:"",
        "PopNameTag"=>$PopNameTag,
        "menu"=>$menu,
        "protfolioPojectsData"=>$protfolioPojectsData,
        "AboutmeData"=>count($AboutmeData)>0? $AboutmeData:"",
    ]);
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
