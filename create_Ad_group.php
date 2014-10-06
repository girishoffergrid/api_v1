<?php

require_once dirname(__FILE__).'/function/function_create_google_campain.php';

if(isset($_GET['id'],$_GET['name']))
{    
    if(isset($_POST['submit']))
    {

        extract($_POST);

    try {

      $user = new AdWordsUser();


      $user->LogAll();

      $create_google_ad_groups = createGoogleGroups($user, $_GET['id'], $ad_g_name, $ad_g_budget);
      
        if(isset($create_google_ad_groups[0],$create_google_ad_groups[1]))
        {
            header("location:get_ad_groups.php?id=".$_GET['id']."&name=".$_GET['name']);
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
              <h2>cerate your new AD Group</h2>
          </div>
          <div calss="row">
              <div class=" col-md-6 col-md-offset-3 ">    
                  
                 <form role="form" method="post" action="">
                    <div class="form-group">
                      <label for="Name">AD Group's Name</label>
                      <input type="text" class="form-control" id="ad_g_name" name="ad_g_name" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="Budget">Money Per Day</label>
                      <input type="text" class="form-control" id="ad_g_budget" name="ad_g_budget" placeholder="money">
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