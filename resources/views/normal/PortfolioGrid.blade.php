
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">{{count($protfolioData)>0 ? $protfolioData[0]->ProtfolioText:""}}
            </h2>
            <h3 class="section-subheading text-muted">{{count($protfolioData)>0 ? $protfolioData[0]->ProtfolioSub:""}}</h3>
        </div>

            <div class="row">
                @for ($i=0;$i<count($protfolioPojectsData) ;$i++)
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item -->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#pm{{$i}}">
                        <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{$protfolioPojectsData[$i]->ProtfolioContentImg}}" />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">{{$protfolioPojectsData[$i]->PopupName}}</div>
                            <div class="portfolio-caption-subheading text-muted">{{$protfolioPojectsData[$i]->PopupSubtext}}</div>
                            <div class="category">
                                <h5>
                                @for($pi=0;$pi<count($CategoryData) ;$pi++)
                                    @if ($CategoryData[$pi]->ProtfolioContentID==$protfolioPojectsData[$i]->ProtfolioContentID)
                                    <div class="badge bg-info text-wrap categoryTextLine">{{$CategoryData[$pi]->PopupCategory}}</div>
                                    @endif

                                @endfor
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
    </div>
</section>

 @includeIf("normal.PortfolioPopup")