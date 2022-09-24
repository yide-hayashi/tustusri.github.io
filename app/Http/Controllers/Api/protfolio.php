<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;
use App\Models\Home;
use Validator;
use App\Models\ProtfolioContent;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class protfolio extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $p=Models\Protfolio::where("Pid","2");
        return $p;
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
        $p=Models\Protfolio::where("Pid","2")->get();

        if(count($p)>0) 
        {
            Models\Protfolio::where("Pid","2")->update([
                "ProtfolioText"=>$request->input("ProtfolioText")==null? "":$request->input("ProtfolioText"),
            "ProtfolioSub"=>$request->input("ProtfolioSub")==null? "":$request->input("ProtfolioSub")]);
            return redirect("/managerpage");
        }
        else
        {
            $this->create($request);
        }
        
    }
    public function storeContent(Request $request)
    {
        $input = $request->all();
        $rules = [
            'PopupName' => [
                'required',
                'min:1',
            ],
            'PopupSubtext' => [
                'required',
                'min:1',
            ],
            'ProtfolioProjecfileToUpload' => 
            'image|max:24576|mimes:jpg,jpeg,png'
                
        ];
        
        $validator = Validator::make($input, $rules);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        else if($request->file('ProtfolioProjecfileToUpload')->getSize() > 3072*1024)
        {
            return response()->json(['errors'=>["上船失敗，檔案過大"]]);
        }
        
       
        if($request->input("ProtfolioContentID")!=null) 
        {
            $p=Models\ProtfolioContent::where("ProtfolioContentID",(int)$request->input("ProtfolioContentID"))
            ->get();
            if($request->file('ProtfolioProjecfileToUpload')==null)
            {
                
                $imgpath=str_replace("/img/ProtfolioProjec/","",$p[0]->ProtfolioContentImg);
            }
            else
            {
                if(Storage::exists($p[0]->ProtfolioContentImg))
                {
                    Storage::delete($p[0]->ProtfolioContentImg);
                }
                $imgpath=Str::random(5).$request->file('ProtfolioProjecfileToUpload')->getClientOriginalName();
                Storage::put("/img/ProtfolioProjec/".$imgpath,
                file_get_contents($request->file('ProtfolioProjecfileToUpload')));
            }


            Models\ProtfolioContent::where("ProtfolioContentID",(int)$request->input("ProtfolioContentID"))->update([
                "Pid"=>2,
                "ProtfolioContentImg"=>"/img/ProtfolioProjec/".$imgpath,
                "PopupName"=>$request->input("PopupName"),
                "PopupSubtext"=>$request->input("PopupSubtext"),
                "PopupContent"=>$request->input("PopupContent")==null?"":$request->input("PopupContent"),
                "PopupLink"=>$request->input("PopupLink")==null?"":$request->input("PopupLink")
            ]);
            //確認類別or新增類別
            $categorynameArray=$request->input("categoryname");
            $c=Models\Category::where("ProtfolioContentID",$p[0]->ProtfolioContentID)->get();
            if(count($c)>0)
            {
                $OriginalArray=[];
                foreach($c as $ci)
                {
                    array_push($OriginalArray,$ci->PopupCategory);
                }
                $delArray=array_diff($OriginalArray,$categorynameArray);
                $AddArray=array_diff($categorynameArray,$OriginalArray);
    
                foreach($delArray as $da)
                {
                    Models\Category::where([["ProtfolioContentID",$c[0]->ProtfolioContentID],"PopupCategory"=>$da])->delete();
                }
                foreach($AddArray as $aa)
                {
                    Models\Category::create(["ProtfolioContentID"=>$p[0]->ProtfolioContentID,"PopupCategory"=>$aa]);
                }
            }
            return response()->json(['errors'=>""]);
        }
        else
        {
           
            //$this->createContentPage($request);
        }
         //
        exit;
    }

    public function create(Request $request)
    {
        Models\Protfolio::create(["Pid"=>2,
        "ProtfolioText"=>$request->input("ProtfolioText")==null? "":$request->input("ProtfolioText"),
        "ProtfolioSub"=>$request->input("ProtfolioSub")==null? "":$request->input("ProtfolioSub")]);
        //
        return redirect("/managerpage");
    }
    
    ///這是Category::create 引入createContentPage
    public function createContentPage(Request $request)
    {
        try
        {
            $input = $request->all();
        
            $rules = [
                'PopupName' => [
                    'required',
                    'min:1',
                ],
                'PopupSubtext' => [
                    'required',
                    'min:1',
                ],
            ];
            
            $validator = Validator::make($input, $rules);
    
            if($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()->all()]);
            }
            $p=Models\ProtfolioContent::withTrashed()->where([["Pid",2],["PopupName",$request->input("PopupName")]])
            ->get();
            //return response()->json(['errors'=>count($p),"a"=>$request->input("categoryname")]);
            if(count($p)>0) 
            {
                $categorynameArray=$request->input("categoryname");
                return response()->json(['errors'=>["此專案名稱無法使用"],"categoryname"=>$request->input("categoryname"),"a"=>$request->input("categoryname")]);
            }
            //引入createContentPage
            $NewID=$this->createContent($request);
            //新增類別
            $categorynameArray=$request->input("categoryname");
            if($categorynameArray!=null)
            {            
                foreach($categorynameArray as $i )
                {
                    Models\Category::create([
                        "ProtfolioContentID"=> $NewID,
                        "PopupCategory"=>$i
                    ]);
                }

            }

             return response()->json(['errors'=>""]);
        }
        catch(Exception $e)
        {
            return response()->json(['errors'=>$e]);
            
        }

        
    }

    public function createContent(Request $request)
    {
        if($request->file('ProtfolioProjecfileToUpload')==null)
        {
            $imgpath="";
        }
        else
        {
            $imgpath=Str::random(5).$request->file('ProtfolioProjecfileToUpload')->getClientOriginalName();
            Storage::put("/img/ProtfolioProjec/".$imgpath,
            file_get_contents($request->file('ProtfolioProjecfileToUpload')));
        }
            
        Models\ProtfolioContent::create([                
            "Pid"=>2,
            "ProtfolioContentImg"=>"/img/ProtfolioProjec/".$imgpath,
            "PopupName"=>$request->input("PopupName"),
            "PopupSubtext"=>$request->input("PopupSubtext"),
            "PopupContent"=>$request->input("PopupContent")==null?"":$request->input("PopupContent"),
            "PopupLink"=>$request->input("PopupLink")==null?"":$request->input("PopupLink")
        ]);
        $ID=Models\ProtfolioContent::max("ProtfolioContentID");
        return  $ID;
    }

 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $protfolioData=ProtfolioContent::where("Pid","2")->where("PopupName",$request->input("sname"))->get();
       $categorynameArray=Models\Category::where("ProtfolioContentID",$protfolioData[0]->ProtfolioContentID)->get();
       $categorySelection=Models\Category::select("PopupCategory")->distinct()->get();
        return View("SectionObj.settingpop.settingprotfolioProject",[ 
            "protfolioData"=>$protfolioData[0],
            "categorynameArray"=>$categorynameArray,
        "categorySelection"=>$categorySelection]);
        //
    }

    public function creatshow(Request $request)
    {
        $categorySelection=Models\Category::select("PopupCategory")->distinct()->get();
        return View("SectionObj.settingpop.settingprotfolioCreateProject",["categorySelection"=>$categorySelection]);
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pjn)
    {
        
        $del=Models\ProtfolioContent::where("PopupName",$pjn)->get();
        Models\Category::where("ProtfolioContentID",$del[0]->ProtfolioContentID)->delete();
        Models\ProtfolioContent::where("PopupName",$pjn)->delete();
        return response()->json(['errors'=>""]);
        //
    }
}
