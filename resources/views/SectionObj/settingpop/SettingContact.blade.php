
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
                            <form action="/managerpage/Contact/update" enctype="multipart/form-data" id="ContactForm" method="post" >
                            {!! csrf_field() !!}
                            {{ method_field('put') }}
                                <H2>CONTACT</H2>
                                <br><div name="HistoresID" style="display:none"></div>
                                <ul class="list-inline">
                                    <li>
                                            <li class="list-group-item">
                                                <div>姓名:
                                                    <input class="managerpage-Popup-ContentTitle" type="text" name="ContanctTitle" value="{{old('ContanctTitle')=='' ? $ContanctData->ContanctTitle:old('ContanctTitle')}}">
                                                </div>                   
                                            </li>
                                            <li class="list-group-item" aria-current="true">
                                                <div>圖片(preview):
                                                    <ul class="list-inline">
                                                        <li>
                                                            <img id="imgPreview"  src="{{old('fileToUpload')==''? $ContanctData->img:old('fileToUpload')}}" />
                                                            <br>
                                                                選擇檔案:
                                                                <input type="file" name="fileToUpload" id="imgPreviewToUpload" value="{{old('fileToUpload')==''? $ContanctData->img:old('fileToUpload')}}" >
                                                        
                                                        </li>
                                                    </ul>
                                                </div>                   
                                            </li>
                                            <li class="list-group-item">

                                                <div>連絡電話:
                                                    <input class="" type="text" name="ContanctText" value="{{old('ContanctText')==''? $ContanctData->ContanctText:old('ContanctText')}}">
                                                </div>                   
                                            </li>
                                         
                                    
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
 
  </script>
  @endsection