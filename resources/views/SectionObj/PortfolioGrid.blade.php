
<!-- 暫時沒用 現用目錄 normal/PortfolioPopup -->
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">{{$protfolioData==""? "":$protfolioData[0]->ProtfolioText}}
            @if ($manager==true)
            <a class=" "  data-bs-toggle="modal" href="{{'#'.$PopNameTag[2]}}">
                <i class="fa fa-cog"></i>
            </a>
            @endif
            </h2>
            <h3 class="section-subheading text-muted">{{$protfolioData==""? "":$protfolioData[0]->ProtfolioSub}}</h3>
        </div>
        <form method="post" action="" id="delProject_ajax_form">
            {!! csrf_field() !!}
            {{ method_field('delete') }}
            <div class="row">
                @for ($i=0;$i<=count($protfolioPojectsData) ;$i++)
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 1-->
                    <div class="portfolio-item">
                        @if ($i==count($protfolioPojectsData))
                        <a class="portfolio-link" data-bs-toggle="" href="/managerpage/createProject">
                        <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="/assets/img/addimg.jpg"/>
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">新增</div>
                            <div class="portfolio-caption-subheading text-muted"></div>
                        </div>
                        @else
                        
                        <button type="button" class="btn-close" onclick="del({{$i}})" aria-label="Close"></button>
                        <a class="portfolio-link" data-bs-toggle="" href="/managerpage/UpdateProject?sname={{$protfolioPojectsData[$i]->PopupName}}">
                        <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{$protfolioPojectsData[$i]->ProtfolioContentImg}}"  />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">{{$protfolioPojectsData[$i]->PopupName}}</div>
                            <div class="portfolio-caption-subheading text-muted">{{$protfolioPojectsData[$i]->PopupSubtext}}</div>
                        </div>
                        @endif

                    </div>
                </div>
                @endfor
            </div>
        </form>
    </div>
</section>
<script>
 function del($index)
 {
    $projectname=$(".portfolio-caption-heading").eq($index).text();


$form = $(this)

$.ajax({
  url: "managerpage/del/"+$projectname,
  type: 'delete',
  data: $index,
  headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  success: function (response) {
    
      $('.error').remove();
      console.log(response)
      if(response.error){
          
          $.each(response.errors, function(name, error){
              error = '<small class="text-muted error">' + error + '</small>'
              $form.find('[name=' + name + ']').after(error);
          })
      }
      else{
          console.log(response.errors)
          if(response.errors=="")
          {
            location.href = '/managerpage'
          }
      }
  },
  cache: false,
  contentType: false,
  processData: false
  });
}


  </script>