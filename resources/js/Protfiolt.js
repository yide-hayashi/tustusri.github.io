
  window.back=function ()
  {
     location.href = '/managerpage';
  }

  
  $(document).ready(()=>
  {
     
   $('#id_ajax_formT').submit(function(e){
      e.preventDefault();
      $form = $(this);
      
      var formData = new FormData(this);
      var i=0;
      for(i=0;i<$("#categoryTextLineList").children().length ;i++)
      {
        formData.append('categoryname['+i+']' ,$("#categoryTextLineList").children().eq(i).text());
      }
      formData.append('ProtfolioContentID' ,$("#ProtfolioContentID").text());
      
      $.ajax({
        url: "/managerpage/storeContent",
        type: 'post',
        data: formData,
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response)
         {
          
            $('.error').remove();
            console.log(response)
            if(response.error){
                
                $.each(response.errors, function(name, error)
                {
                    error = '<small class="text-muted error">' + error + '</small>'
                    $form.find('[name=' + name + ']').after(error);
                })
            }
            else{
                console.log(response.errors)
                if(response.errors.length>0 &&response.errors!="")
                {
                    var FormErrors="錯誤:<br>";
                    response.errors.forEach(function(e){
                        FormErrors= FormErrors+e+"<br>";
                    } );
                    $( '#form-errors' ).html( FormErrors );
                }
                else
                {
                  location.href = '/managerpage'
                    $( '#form-errors' ).html( "" );
                }
            }
        },
        cache: false,
        contentType: false,
        processData: false
        });
    });

    $('#id_ajax_formC').submit(function(e)
    {
        e.preventDefault();
        $form = $(this);
        var formData = new FormData(this);
        var i=0;
        
        for(i=0;i<$("#categoryTextLineList").children().length ;i++){
            formData.append('categoryname['+i+']' ,$("#categoryTextLineList").children().eq(i).text());
        }
        formData.append('ProtfolioContentID' ,$("#ProtfolioContentID").text());
        $.ajax({
            url: "/managerpage/createContent",
            type: 'POST',
            data: formData,
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response)
            {
            
                $('.error').remove();
                console.log(response)
                if(response.error){
                    
                    $.each(response.errors, function(name, error)
                    {
                        error = '<small class="text-muted error">' + error + '</small>'
                        $form.find('[name=' + name + ']').after(error);
                    });
                }
                else{
                    console.log(response.errors);
                    if(response.errors.length>0 &&response.errors!="")
                    {
                        var FormErrors="錯誤:<br>";
                        response.errors.forEach(function(e){
                            FormErrors= FormErrors+e+"<br>";
                        } );
                        $( '#form-errors' ).html( FormErrors );
                    }
                    else
                    {
                    location.href = '/managerpage'
                        $( '#form-errors' ).html( "" );
                    }
                }
            },
            cache: false,
            contentType: false,
            processData: false
            });
    });

   
   $("#CategoryTextBut").click(function()
   {
       if(!checkCategoryText($(".CategoryText").val()) && $(".CategoryText").val()!="")
       {
           $("#categoryTextLineList").append('<div class="badge bg-info text-wrap categoryTextLine"onclick="CategoryTextDel('+$("#categoryTextLineList").children().length
           +')" >'+$(".CategoryText").val()+'</div>');
       }
       $(".CategoryText").val("");
       });
   });
   
  function  checkCategoryText($CategoryText)
   {
       var check=false;
       var i=0;
       for(i=0;i<$("#categoryTextLineList").children().length ;i++)
       {
           if($("#categoryTextLineList").children().eq(i).text()==$CategoryText)
           {
               check=true;
               break;
           }
           
       }
       return check;
   }

   function getNameData($formData)
   {
       formData.append('_token' ,$("#ProtfolioContentID").text());
   }
   window.CategoryTextDel=function ($index)
   {
       $("#categoryTextLineList").children().eq($index).remove();
       var i=0;
       for(i=0;i<$("#categoryTextLineList").children().length ;i++)
       {
          $("#categoryTextLineList").children().eq(i).attr("onclick","CategoryTextDel("+i+")");
         
       }
   }
   window.CategoryAdd=function ($CategoryIndex)
   {
       if(!checkCategoryText($(".dropdown-item").eq($CategoryIndex).text()))
       {
           $("#categoryTextLineList").append('<div class="badge bg-info text-wrap categoryTextLine" onclick="CategoryTextDel('+$("#categoryTextLineList").children().length
           +')" >'+$(".dropdown-item").eq($CategoryIndex).text()+'</div>');
       }
   
   }


  window.delAboutme=function($index)
    {
        $aboutmeid=$(".aboutmeid").eq($index).text();


        $form = $(this)

        $.ajax({
        url: "/managerpage/aboutme/del/"+$aboutmeid,
        type: 'delete',
        data: $aboutmeid,
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
                });
            }
            else{
                console.log(response.errors)
                if(response.errors=="")
                {
                    $(".timeline").children().eq($index).remove();
                    sortAboutmetag();
                // location.href = '/managerpage'
                }
            }
        },
        cache: false,
        contentType: false,
        processData: false
        });
    }

    function sortAboutmetag()
    {
        for($i=0;$i<$(".btn-close.aboutmebut").length;$i++)
        {
            $(".btn-close.aboutmebut").eq($i).attr("onclick","delAboutme("+$i+")");
        }
        
    }
