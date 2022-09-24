import './bootstrap';
import './scripts';
$(document).ready(()=>{
    $('#imgPreviewToUpload').change(function(){
      const file = this.files[0];
      console.log(file);
      if (file){
        let reader = new FileReader();
        reader.onload = function(event){
          console.log(event.target.result);
          if($('#cropContainer').length>0)
            displaycorp(event.target.result);
          else
            $("#imgPreview").attr("src",event.target.result).show();
        }
        reader.readAsDataURL(file);
      }
    });

  });




