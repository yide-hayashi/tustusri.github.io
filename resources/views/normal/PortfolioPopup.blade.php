
@for ($i=0;$i<count($protfolioPojectsData) ;$i++)
<!-- Portfolio item {{$i}} modal popup-->
<div class="portfolio-modal modal fade" id="pm{{$i}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project details-->
                            <h2 class="text-uppercase">{{$protfolioPojectsData[$i]->PopupName}}</h2>
                                    <p class="item-intro text-muted">{{$protfolioPojectsData[$i]->PopupSubtext}}</p>
                                    <img class="img-fluid d-block mx-auto" src="{{$protfolioPojectsData[$i]->ProtfolioContentImg}}" >
                                    {{$protfolioPojectsData[$i]->ProtfolioProjectContent}}
                                    <p></p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>link:</strong>
                                            <a href="{{$protfolioPojectsData[$i]->PopupLink}}">{{$protfolioPojectsData[$i]->PopupLink}}</a>
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            <div id="categoryTextLineList">
                                            <h5>
                                            @for($pi=0;$pi<count($CategoryData) ;$pi++)
                                                @if ($CategoryData[$pi]->ProtfolioContentID==$protfolioPojectsData[$i]->ProtfolioContentID)
                                                <div class="badge bg-info text-wrap categoryTextLine">{{$CategoryData[$pi]->PopupCategory}}</div>
                                                @endif

                                            @endfor
                                            </h5>
                                            </div>
                                        </li>
                                    </ul>
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
@endfor