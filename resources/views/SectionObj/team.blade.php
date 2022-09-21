
<section class="page-section bg-light" id="team">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">CONTACT</h2>
            <h3 class="section-subheading text-muted"></h3>
        </div>
        <div class="row">

            <div class="col-lg-12">
                <div class="team-member">
                    @if ($manager==true)
                    <div class="bk"> 
                        <div class="contactme-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <a  href="/managerpage/Contact/show"><img class="mx-auto rounded-circle contactmeImg" src="{{$ContanctDate[0]->img}}" /></a>
                    </div>
                    @else
                    <a  href="#"><img class="mx-auto rounded-circle" src="{{$ContanctDate[0]->img}}" /></a>
                    @endif
                    
                    <h4>{{$ContanctDate[0]->ContanctTitle}}</h4>
                    <p class="text-muted">{{$ContanctDate[0]->ContanctText}}</p>
                    <a class="btn btn-dark btn-social mx-2" href="#!" style="display:none" aria-label="Parveen Anand Twitter Profile"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" style="display:none" aria-label="Parveen Anand Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto text-center"><p class="large text-muted"></p></div>
        </div>
    </div>
</section>
