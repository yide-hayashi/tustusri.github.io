<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home;

use Illuminate\Support\Facades\Storage;
class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Home::all();
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
        //
    }
    public function storeImg(Request $request)
    {
        $img=new Home;
        $img->Pid=1;
        $img->LogoImg=$request->input("");
        $img->save();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       
        $text=Home::where("Pid",1);
        $text->update(["HomeText"=>$request->text,"HomeSubtext"=>$request->subText]);

        //
        return redirect("/managerpage");
    }

    //title img
    public function updateImg(Request $request)
    {
        
        
        $request->input("fileToUpload");
        Storage::put("/img/".$request->file('fileToUpload')->getClientOriginalName(),
file_get_contents($request->file('fileToUpload')));

        $img=Home::where("Pid",1);
        $img->update(["LogoImg"=>"/img/".$request->file('fileToUpload')->getClientOriginalName()]);
        
        //return View("manage",["manager"=>true]);
        return redirect("/managerpage");
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
