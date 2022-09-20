
@for ($i=1;$i<1 ;$i++)
<!-- Portfolio item {{$i}} modal popup-->
<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project details-->
                            <h2 class="text-uppercase">AI車牌偵測系統</h2>
                                    <p class="item-intro text-muted">前後端為C# MVC以及python做整合，開發出車牌偵測系統。</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/objectdection.jpg" alt="...">
                                    用手機登錄此網站即可開啟相機，對著車牌照相就可得到如左圖一樣的結果。<br>
                                    右圖為辨識前，左圖為辨識結果，圖中紫色框框為辨識後。
                                    此網站還可上傳圖片進行偵測車牌。
                                    前端為JavaScript、CSS3、Jquery搭配C# MVC .NET framework4.8串接python的AI模型。 
                                    <p></p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>link:</strong>
                                            <a href="https://www.tsutsuri.site/">https://www.tsutsuri.site/</a>
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            AI、C# MVC、Python、JavaScript、JQuery
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