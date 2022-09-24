
@extends("base.layout")

@section("title","mysite")

@section("IndexBody")


<div class="portfolio-modal modal fade show" id="PopNameTags" tabindex="-1" role="dialog" aria-hidden="false" style="display: block;" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            
                        <div id="form-errors" style="color: red"></div>
                            <!-- Project details-->
                            <form action="/managerpage/aboutme/updateHistory/{{$id}}" enctype="multipart/form-data" id="id_ajax_formAboutMe" method="post" >
                            {!! csrf_field() !!}
                            {{ method_field('put') }}
                                <input class="managerpage-PojectPopup-ContentTitle " type="text" name="ContentTitle" value="{{old('ContentTitle')==''? $historyData->ContentTitle:old('ContentTitle') }}">
                                <br><div name="HistoresID" style="display:none"></div>
                                <ul class="list-inline">
                                    <li>
                                        <ul class="list-group">
                                            <li class="list-group-item" aria-current="true">
                                                <div>圖片(preview):
                                                    <ul class="list-inline">
                                                        <li>
                                                            <div id="cropContainer"></div>
                                                            
                                                            <button class="resize-done" type="button">切圖</button>
                                                        </li>
                                                        <li>
                                                        <img id="imgPreview" src="{{old('fileToUpload')==''? $historyData->img:old('fileToUpload')}}" />
                                                        <textarea id="corpedimg" style="display:none" name="corpedimg"></textarea>
                                                        <br>
                                                                選擇檔案:
                                                                <input type="file" name="fileToUpload" id="imgPreviewToUpload" value="{{old('fileToUpload')==''? $historyData->img:old('fileToUpload')}}" >
                                                        </li>
                                                    </ul>
                                                </div>                   
                                            </li>
                                            <li class="list-group-item">

                                                <div>期間(YYYY~YYYY):
                                                    <input class="" type="text" name="Startyear" value="{{old('Startyear')==''? $historyData->Startyear:old('Startyear')}}">~
                                                    <input class="" type="text" name="Endyear" value="{{old('Endyear')==''? $historyData->Endyear:old('Endyear')}}">
                                                </div>                   
                                            </li>
                                            <li class="list-group-item">
                                                <div>內容:
                                                    <textarea class="ProjectContentTextBox" type="text" name="ContentSub" >{{old('ContentSub')==''? $historyData->ContentSub:old('ContentSub')}}</textarea>
                                                </div> 
                                            </li>
                                        </ul> 
                                    
                                    </li>
                                    <li>
                                        <br>
                                        <button class="btn btn-success btn text-uppercase active" id="storeContentSave"  data-bs-dismiss="modal" type="submit">
                                            <i class="fa fa-file"></i>
                                            儲存
                                        </button>
                                    </li>
                                </ul>
                            </form>
                            <button class="btn btn-primary btn-xl text-uppercase" onclick="back()" data-bs-dismiss="modal" type="button">
                                <i class="fas fa-xmark me-1"></i>
                                Close
                            </button>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

function displaycorp($byteimg)
{
    $('#cropContainer').croppie("destroy");
    $("#imgPreview").hide();
    $(".resize-done").show();
    var c=$('#cropContainer').croppie({
        viewport: { width: 600, height: 600 },
        boundary: { width: 600, height: 600 },
    });
    c.croppie('bind', {
    url: $byteimg,
    points: [0,0]
    });
}

function crop()
{
    $('#cropContainer').croppie("result",{
        type:"base64",
        size:"viewport"
    }).then(function(a){
        $("#corpedimg").val(a).hide();
        $(".resize-done").hide();
    });
    
}

$(document).ready(function(){
    $(".resize-done").hide();
    $(".resize-done").click(function(){
        crop();
    });
    $("#storeContentSave").click(function(){
        crop();
    });
});
// Display the cropped image on the page.


  </script>
  @endsection