<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Protfolio;
use App\Models\Home;
use App\Models\PageName;
use App\Models\ProtfolioContent;
use App\Models\History;
use App\Models\AboutmeTitle;
use Illuminate\Support\Facades\Storage;
use App\Models\Contanct;
use App\Models\ContanctSoft;
use App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class ManagePage extends Controller
{
    public function manageIndex()
    {
        if(auth::check())
        {
            $homedata=Home::where("HomeID","1")->get();
            $PopNameTag=["PopupSetting","IndexContent","PortfoliotitleSetting","creatProjectPotup","creatAboutMePotup","contactPotup"];
            $navigationlinkTag=["#portfolio","#about","#team"];
            $menu=$homedata[0]->Pids->where("Pid",">","1")->select("PageName")->get()->toArray();

            $protfolioData=Protfolio::where("Pid","2")->get();
            $protfolioPojectsData=ProtfolioContent::where("Pid","2")->orderBy("updated_at","desc")->get();
            $CategoryData=Category::orderBy("ProtfolioContentID", 'asc')->orderBy("PopupCategory", 'asc')->get();

            $AboutmeData=AboutmeTitle::where("Pid","3")->get();
            $HistoryDate=History::where("Pid","3")->get();
            $ContanctDate=Contanct::where("Pid","4")->get();
            return View("manage",[
                "manager"=>true,
                "navigationlinkTag"=>$navigationlinkTag,
                "homedata"=>$homedata[0],
                "protfolioData"=>count($protfolioData)>0? $protfolioData:"",
                "PopNameTag"=>$PopNameTag,
                "menu"=>$menu,

                "CategoryData"=>$CategoryData,
                "protfolioPojectsData"=>$protfolioPojectsData,

                "AboutmeData"=>count($AboutmeData)>0? $AboutmeData:"",
                "HistoryDate"=> $HistoryDate,
                "ContanctDate"=>$ContanctDate
                
            ]);
        }
        else
        {
            
            return redirect("/user/auth/login");
        }

    }
    //從資料庫取直 CURD 
    //
    public function updateImg(Request $request)
    {
        // $request->input("fileToUpload");
//         Storage::put("/img/".$request->file('fileToUpload')->getClientOriginalName(),
// file_get_contents($request->file('fileToUpload')));

//         // $img=Home::where("Pid",1);
//         // $img->update(["LogoImg"=>$request->file('fileToUpload')])
//         // ->save();
//         //return View("manage",["manager"=>true]);
//         return $request->file('fileToUpload')->getClientOriginalName();
//         //
    }

}
