<?php

namespace App\Http\Controllers;
use App\Models\protfolio;
use App\Models\Home;
use App\Models\PageName;
use App\Models\ProtfolioContent;
use App\Models\History;
use App\Models\AboutmeTitle;
use App\Models\Contanct;
use App\Models\ContanctSoft;
use App\Models\Category;
use Illuminate\Http\Request;

class index extends Controller
{
    public function indexPage()
    {
        $homedata=Home::where("HomeID","1")->get();
        $PopNameTag=["PopupSetting","IndexContent","PortfoliotitleSetting","creatProjectPotup","creatAboutMePotup","contactPotup"];
        $navigationlinkTag=["#portfolio","#about","#team"];
        $menu=$homedata[0]->Pids->where("Pid",">","1")->select("PageName")->get()->toArray();
        $protfolioData=Protfolio::where("Pid","2")->get();

        $protfolioPojectsData=ProtfolioContent::where("Pid","2")->orderBy("updated_at","desc")->get();
        $CategoryData=Category::orderBy("ProtfolioContentID", 'asc')->orderBy("PopupCategory", 'asc')->get();

        // var_dump($CategoryData[9]->PopupCategory,$CategoryData[11]->PopupCategory,$CategoryData[12]->PopupCategory,$CategoryData[13]->PopupCategory);
        $AboutmeData=AboutmeTitle::where("Pid","3")->get();
        $HistoryDate=History::where("Pid","3")->get();
        $ContanctDate=Contanct::where("Pid","4")->get();
        //var_dump(count($protfolioPojectsData));
        return View("index",[
            "manager"=>false,
            "navigationlinkTag"=>$navigationlinkTag,
            "homedata"=>$homedata[0],
            "protfolioData"=>count($protfolioData)>0? $protfolioData:"",
            "protfolioPojectsData"=>$protfolioPojectsData,
            "PopNameTag"=>$PopNameTag,
            "menu"=>$menu,
            "CategoryData"=>$CategoryData,

            "AboutmeData"=>count($AboutmeData)>0? $AboutmeData:"",
            "HistoryDate"=> $HistoryDate,
            "ContanctDate"=>$ContanctDate
            
        ]);
    }
    //
}
