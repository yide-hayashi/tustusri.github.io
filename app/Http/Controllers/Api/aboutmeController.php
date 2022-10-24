<?php

namespace App\Http\Controllers\Api;
use App\Models\AboutmeTitle;
use App\Models\History;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Validator;
use Illuminate\Support\Str;
class aboutmeController extends Controller
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
        AboutmeTitle::create([
            "Pid"=>3,
            "PageTitle"=>$request->AboutmeTitle,
            "PageSubtext"=>$request->AboutmeSub
        ]);
        //
    }
    ///創建AboutMe內容
    public function create(Request $request)
    {
        $input = $request->all();
       
        $rules = [
            'Startyear' => [
                'min:1901',
                "numeric",
                'max:2155'

            ],
            'Endyear' => [
                'min:1901',
                "numeric",
                'max:2155'
            ],
        ];
        
        $validator = Validator::make($input, $rules);

        if($validator->fails())
        {
            //資料驗證錯誤
           
            return redirect("/managerpage/aboutme")
            ->withErrors($validator) 
            ->withInput(); 
            
            
        }
        
        if($request->file('fileToUpload')==null)
        {
            $imgpath="/img/aboutme/";
        }
        else
        {
                $base64=$request->input("corpedimg");
                $base64=str_replace('data:image/jpeg;base64,','', $base64);
                $base64=str_replace('data:image/png;base64,','', $base64);
                $data = base64_decode($base64);
                $imgpath="/img/aboutme/".Str::random(5).$request->file('fileToUpload')->getClientOriginalName();
                Storage::put($imgpath,$data);
        }
        $ContentSub=($request->ContentSub==null? "":$request->ContentSub);
        History::create([
            "Pid"=>"3",
            "Startyear"=>(int)$request->Startyear,
            "Endyear"=>(int)$request->Endyear,
            "ContentTitle"=>$request->ContentTitle,
            "ContentSub"=>$ContentSub,
            "img"=>$imgpath
            
        ]);
        return redirect("/managerpage");
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAboutMeBeUpdatedContent($id)
    {
        $historyData= History::where("HistoresID",$id)->get();
        
        return View("SectionObj.settingpop.settingAboutmeUpdate",["id"=>$id,"historyData"=>$historyData[0]]);
        //
    }
    public function showAboutMeContent()
    {
        return View("SectionObj.settingpop.settingAboutmeCreate");
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $alist=AboutmeTitle::where("Pid","3")->get();
        if(count($alist)>0)
        {
            //update
            AboutmeTitle::where("Pid","3")->update([
                "Pid"=>3,
                "PageTitle"=>$request->AboutmeTitle,
                "PageSubtext"=>$request->AboutmeSub
            ]);
        }
        else
        {
            //create
            $this->store($request);
        }
        return redirect("/managerpage");
        //
    }
    ///更新AboutMe內容
    public function updateHistory(Request $request,$id)
    {
        $historyData=  History::where("HistoresID",$id)->get();
        if($request->file('fileToUpload')==null)
        {
            //$imgpath=str_replace("/img/aboutme/","",$historyData[0]->img);
            $imgpath=$historyData[0]->img;
        }
        else
        {
            if((Storage::exists($historyData[0]->img))==true)
            {
                Storage::delete($historyData[0]->img);
            }
            $base64=$request->input("corpedimg");
            $base64=str_replace('data:image/jpeg;base64,','', $base64);
            $base64=str_replace('data:image/png;base64,','', $base64);
            $data = base64_decode($base64);
            $imgpath="/img/aboutme/".Str::random(5).$request->file('fileToUpload')->getClientOriginalName();
            Storage::put($imgpath,$data
            );
            //JQuery圖片處理 弄成呈長寬1:1 
        }

        History::where("HistoresID",$id)->update([
            "Pid"=>"3",
            "Startyear"=>(int)$request->Startyear,
            "Endyear"=>(int)$request->Endyear,
            "ContentTitle"=>$request->ContentTitle,
            "ContentSub"=>$request->ContentSub==null? "":$request->ContentSub,
            "img"=>$imgpath
            
        ]);
        return redirect("/managerpage");
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        History::where("HistoresID",$id)->delete();
        return response()->json(['errors'=>""]);
        //
    }
}
