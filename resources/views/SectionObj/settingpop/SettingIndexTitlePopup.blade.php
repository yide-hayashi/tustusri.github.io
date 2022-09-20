
<div class="portfolio-modal modal fade" id="{{$PopNameTag[1]}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal"><img src="/assets/img/close-icon.svg" alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project details-->
                            <h2 class="text-uppercase">{{$SettingName}}</h2>
                            <form action="/updateText/managerpage/" method="post" >
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                                <ul class="list-inline">
                                    <li>
                                        <ul class="list-group">
                                            <li class="list-group-item" aria-current="true">
                                                <div>標題:
                                                    <input class="managerpage-Popup-ContentTitle" type="text" name="text" value="{{$homedata->HomeText}}">
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div>副標題:
                                                    <input class="managerpage-Popup-ContentTitle" type="text" name="subText" value="{{$homedata->HomeSubtext}}">
                                                </div>                   
                                            </li>
                                        </ul> 
                                    </li>
                                    <li>
                                        <br>
                                        <button class="btn btn-success btn text-uppercase active" data-bs-dismiss="modal" type="submit">
                                            <i class="fa fa-file"></i>
                                            儲存
                                        </button>
                                    </li>
                                </ul>
                            </form>
                            <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
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
