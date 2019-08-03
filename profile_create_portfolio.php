<?php
require 'core/init.php';

$merchant_id = 0;
//Post property gallery images
$file_name=isset($_POST['files']);
if(isset($_POST['add_gallery'])) {
    $campaigns->add_gallery_images($merchant_id, $file_name);

    header('Location:profile_confirm.php?merchant_id='.$merchant_id);    
}

?>
<!doctype html>
<html>
<body>
<a href="admin.php">< BACK</a> | <h3>SERVICE PROVIDER PROFILE</h3>
<b>Step 5 - Portfolio Gallery</b><hr>
                <form class="" id="" action="" role="form" method="post" enctype="multipart/form-data">
                  <label>Portfolio Images *</label>
                  <br><br>
                  <input type ="hidden" name="MAX_FILE_SIZE" value="5000000">
                      <input id="gallery_image" type="file" name="files[]" multiple="multiple">
                           <div id="dvPreview" style="padding: 0 20px 20px 20px;"></div>                           
                  <br>
                  <button type="submit" name="add_gallery">Save</button>      
                </form>


<br>

<script src="jquery-1.11.1.min.js"></script>
<!-- Show service areas -->
  <script type="text/javascript">
    $('.local1').click(function(){
      $('.showlocal1').show();
    })

    $('.local1close').click(function(){
      $('.showlocal1').hide();
    })
  </script>
<!-- End service areas -->
<!-- Show service areas -->
  <script type="text/javascript">
    $('.local2').click(function(){
      $('.showlocal2').show();
    })

    $('.local2close').click(function(){
      $('.showlocal2').hide();
    })
  </script>
<!-- End service areas -->
 <script type="text/javascript">
        window.onload = function () {
            var image = document.getElementById("gallery_image");
            image.onchange = function () {
                if (typeof (FileReader) != "undefined") {
                    var dvPreview = document.getElementById("dvPreview");
                    dvPreview.innerHTML = "";
                    var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
                    for (var i = 0; i < image.files.length; i++) {
                        var file = image.files[i];
                        if (regex.test(file.name.toLowerCase())) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                var img = document.createElement("IMG");
                                img.height = "100";
                                img.width = "100";
                                img.src = e.target.result;
                                dvPreview.appendChild(img);
                            }
                            reader.readAsDataURL(file);
                        } else {
                            alert(file.name + " is not a valid image file.");
                            dvPreview.innerHTML = "";
                            return false;
                        }
                    }
                } else {
                    alert("This browser does not support HTML5 FileReader.");
                }
            }
        };
</script>
</body>
</html>