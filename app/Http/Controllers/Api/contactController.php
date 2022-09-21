<?php

namespace App\Http\Controllers\Api;
use App\Models\Contanct;
use App\Models\ContanctSoft;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
class contactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        if($request->file('fileToUpload')==null)
        {
            $imgpath="/img/aboutme/";
            
        }
        else
        {
            Storage::put("/img/Contact/".$request->file('fileToUpload')->getClientOriginalName(),
            file_get_contents($request->file('fileToUpload')));
            $imgpath="/img/Contact/".$request->file('fileToUpload')->getClientOriginalName();
        }
    

        Contanct::create([
            "Pid"=>"4",
            "img"=>$imgpath,
            "ContanctTitle"=>$request->input("ContanctTitle"),
            "ContanctText"=>$request->input("ContanctText")
        ]);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $ContanctData=Contanct::where("Pid",4)->get();
        if(count($ContanctData)<1)
        {
            return View("SectionObj.settingpop.SettingContactNodata");
        }
        return View("SectionObj.settingpop.SettingContact",["ContanctData"=>$ContanctData[0]]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $Data=Contanct::where("Pid",4)->get();
        if(count($Data)<1)
        {
            $this->store($request);
        }
        else
        {
            if($request->file('fileToUpload')==null)
            {
                $imgpath=str_replace("/img/aboutme/","",$Data[0]->img);
               
            }
            else
            {
                Storage::put("/img/Contact/".$request->file('fileToUpload')->getClientOriginalName(),
                file_get_contents($request->file('fileToUpload')));
                $imgpath="/img/Contact/".$request->file('fileToUpload')->getClientOriginalName();
            }
    
            Contanct::where("Pid",4)->update([
                "Pid"=>"4",
                "img"=>$imgpath,
                "ContanctTitle"=>$request->input("ContanctTitle"),
                "ContanctText"=>$request->input("ContanctText")
            ]);
        }
        return redirect("managerpage");
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
