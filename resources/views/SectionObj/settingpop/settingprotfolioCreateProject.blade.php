
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
                            <form action="/managerpage/createContent" enctype="multipart/form-data" id="id_ajax_formT" method="post" >
                            {!! csrf_field() !!}
                            {{ method_field('post') }}
                                <input class="managerpage-PojectPopup-ContentTitle " type="text" name="PopupName" value="{{old('PopupName')==''? '':old('PopupName') }}">
                                <br>
                                <ul class="list-inline">
                                    <li>
                                            <ul class="list-group">
                                            <li class="list-group-item" aria-current="true">
                                                <div>專案副標題:
                                                    <input class="managerpage-Popup-ContentTitle" type="text" name="PopupSubtext" value="{{old('PopupSubtext')==''? '':old('PopupSubtext') }}">
                                                </div>                   
                                            </li>
                                            <li class="list-group-item">
                                                <div>專案圖片(preview):
                                                    <ul class="list-inline">
                                                        <li>
                                                            <img id="imgPreview"  src="{{old('ProtfolioProjecfileToUpload')==''? '':old('ProtfolioProjecfileToUpload')}}" />
                                                            <br>
                                                                選擇檔案:
                                                                <input type="file" name="ProtfolioProjecfileToUpload" id="imgPreviewToUpload" value="{{old('ProtfolioProjecfileToUpload')==''? '':old('ProtfolioProjecfileToUpload')}}" >
                                                        
                                                        </li>
                                                    </ul>
                                                </div>                   
                                            </li>
                                            <li class="list-group-item">
                                                <div>專案詳細敘述:
                                                    <input class="ProjectContentTextBox" type="text" name="PopupContent" value="{{old('PopupContent')? '':old('PopupContent')}}">
                                                </div>                   
                                            </li>
                                            <li class="list-group-item">
                                                <div>專案連結:
                                                    <input class="ProjectLinkTextBox" type="text" name="PopupLink" value="{{old('PopupLink')==''? '':old('PopupLink')}}">
                                                </div>                   
                                            </li>
                                            <li class="list-group-item">
                                                <div>類別:<br>
                                                <div id="categoryTextLineList"></div>
                                                

                                                <div class="btn-group">
                                                        <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                            類別選擇
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            @php($i=0)
                                                            @foreach ($categorySelection as $cs)
                                                            <li><a class="dropdown-item" href="javascript:CategoryAdd({{$i}})">{{$cs->PopupCategory}}</a></li>
                                                            @php($i++)
                                                            @endforeach
                                                        </ul>
                                                        </div>
                                                    <input class="CategoryText" type="text" name="Category" value="{{old('Category')==''? '':old('Category')}}">
                                                    <input class="btn btn-success btn" id="CategoryTextBut" type="button"  value="選擇">
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
 
  </script>
  @endsection