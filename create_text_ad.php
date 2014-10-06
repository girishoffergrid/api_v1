<?php

require_once dirname(__FILE__).'/function/function_create_google_campain.php';
require_once UTIL_PATH . '/MediaUtils.php';

if(isset($_GET['id']))
{    
    if(isset($_POST['submit']))
    {

        extract($_POST);

    try {

      $user = new AdWordsUser();


      $user->LogAll();
      $dispurl = "http://".$dispurl;
      $url = "http://".$url;

      $create_text_ads = createGoogleTextAds($user, $_GET['id'], $headline, $des1, $des2, $dispurl, $url);
      
        if(isset($create_text_ads))
        {
            header("location:get_text_ads.php?id=".$_GET['id']);
        }


    } catch (Exception $e) {
      $msg = "An error has occurred". $e->getMessage();
    }

    }
}
include 'header.php';
?>

<div class="container">
          <div class="jumbotron text-capitalize text-center">
              <h2>cerate your new text ads</h2>
          </div>
          <div calss="row">
              <div class=" col-md-6 col-md-offset-3 ">    
                  
                 <form role="form" method="post" action="">
                    <div class="form-group">
                      <label for="headline">Headline</label>
                      <input type="text" class="form-control"  name="headline" placeholder="headline">
                    </div>
                    <div class="form-group">
                      <label for="desc1">description1</label>
                      <input type="text" class="form-control"  name="des1" placeholder="description1">
                    </div>
                     <div class="form-group">
                      <label for="desc2">description2</label>
                      <input type="text" class="form-control"  name="des2" placeholder="description2">
                    </div>
                      
                      <div class="form-group">
                      <label for="dispurl">Display url</label>
                      <input type="text" class="form-control"  name="dispurl" placeholder="disp url">
                    </div>
                      <div class="form-group">
                      <label for="url">url</label>
                      <input type="text" class="form-control"  name="url" placeholder="url">
                    </div>

                    <button type="submit" name ="submit" class="btn btn-success btn-lg">Create </button>
                </form>
                  
              </div>   
          </div>
    
  </div>
<?php
 if(isset($msg))
 {
     echo '<div class="alert-danger text-center">'.$msg.'</div>';
 }

 
?>
        

<?php

include 'footer.php';

?>
