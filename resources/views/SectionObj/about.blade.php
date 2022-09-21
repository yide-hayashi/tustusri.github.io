<section class="page-section" id="about">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">{{$AboutmeData==''? '':$AboutmeData[0]->PageTitle}}
            @if ($manager==true)
            <a class=" "  data-bs-toggle="modal" href="{{'#'.$PopNameTag[4]}}">
                <i class="fa fa-cog"></i>
            </a>
            @endif
            </h2>
            <h3 class="section-subheading text-muted">{{$AboutmeData==''? '':$AboutmeData[0]->PageSubtext}}</h3>
        </div>
    <form action="" method="post" >
        {!!csrf_field()!!}
        {{ method_field("delete")}}
        <ul class="timeline">
        @for ($i=0;$i<count($HistoryDate); $i++)
            @if ($i%2==0)
            <li>
                
                <div class="timeline-image">
                @if ($manager==true)
                    <div class="aboutmeid" style="display:none">{{$HistoryDate[$i]->HistoresID}}</div>
                        <a class="portfolio-link" data-bs-toggle="" href="/managerpage/aboutme/showAboutMeBeUpdatedContent/{{$HistoryDate[$i]->HistoresID}}">
                                <div class="aboutImg-hover">
                                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="rounded-circle img-fluid aboutImg" src="{{$HistoryDate[$i]->img}}"  />
                                </a>
                 @endif 
                </div>
                <div class="timeline-panel">
                @if ($manager==true)
                <button type="button" class="btn-close" onclick="delAboutme({{$i}})" aria-label="Close"></button>
                @endif 
                    <div class="timeline-heading">
                        <h4>{{$HistoryDate[$i]->Startyear}}-{{$HistoryDate[$i]->Endyear}}</h4>
                        <h4 class="subheading">{{$HistoryDate[$i]->ContentTitle}}</h4>
                    </div>
                    <div class="timeline-body"><p class="text-muted">{{$HistoryDate[$i]->ContentSub}}</p></div>
                </div>
            </li>
            @else
            <li class="timeline-inverted">
                <div class="timeline-image">
                @if ($manager==true)
                    <div class="aboutmeid" style="display:none">{{$HistoryDate[$i]->HistoresID}}</div>
                        <a class="portfolio-link" data-bs-toggle="" href="/managerpage/aboutme/showAboutMeBeUpdatedContent/{{$HistoryDate[$i]->HistoresID}}">
                                <div class="aboutImg-hover">
                                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="rounded-circle img-fluid aboutImg" src="{{$HistoryDate[$i]->img}}"  />
                                </a>
                 @endif     
                </div>
                <div class="timeline-panel">
                @if ($manager==true)
                <button type="button" class="btn-close" onclick="delAboutme({{$i}})" aria-label="Close"></button>
                @endif 
                    <div class="timeline-heading">
                        <h4>{{$HistoryDate[$i]->Startyear}}-{{$HistoryDate[$i]->Endyear}}</h4>
                        <h4 class="subheading">{{$HistoryDate[$i]->ContentTitle}}</h4>
                    </div>
                    <div class="timeline-body"><p class="text-muted">{{$HistoryDate[$i]->ContentSub}}</p></div>
                </div>
            </li>
            @endif
        @endfor
        @if ($manager==true)
             <li>
                <div class="timeline-image">
                        <a class="portfolio-link" data-bs-toggle="" href="/managerpage/aboutme">
                            <div class="aboutImg-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="rounded-circle img-fluid aboutImg aboutImgaddimgicon" src="assets\img\addimg.jpg" />
                        </a>
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>新增</h4>
                        <h4 class="subheading">請點擊右方圓框</h4>
                    </div>
                    <div class="timeline-body"><p class="text-muted"></p></div>
                </div>
            </li>
            @endif
           
            <li class="timeline-inverted">
                <div class="timeline-image">
                    <h4>
                        Be Part
                        <br />
                        Of Our
                        <br />
                        Story!
                    </h4>
                </div>
            </li>
       
        </ul>
    </form>
    </div>
</section>