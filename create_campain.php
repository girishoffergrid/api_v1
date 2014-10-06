<?php

require_once dirname(__FILE__).'/function/function_create_google_campain.php';

if(isset($_POST['submit']))
{
    extract($_POST);
    
    try {
  // Get AdWordsUser from credentials in "../auth.ini"
  // relative to the AdWordsUser.php file's directory.
  $user = new AdWordsUser();

  // Log every SOAP XML request and response.
  $user->LogAll();

  $creat_google_campain = createGoogleCampain($user, $c_budget, $c_name);
  if(isset($creat_google_campain[0],$creat_google_campain[1]))
  {
      header('Location:index.php');
  }
  else
  {
      $msg = "An error has occured";
  }
  
  
  
  
  
} catch (Exception $e) {
  $msg ="An error has occurred: %s\n". $e->getMessage();
}

    
}

include 'header.php';
?>

  <body>
      <div class="container">
          <div class="jumbotron text-capitalize text-center">
              <h2>cerate your new campaign</h2>
          </div>
          <div calss="row">
              <div class=" col-md-6 col-md-offset-3 ">    
                  
                 <form role="form" method="post" action="">
                    <div class="form-group">
                      <label for="Name">Campaign Name</label>
                      <input type="text" class="form-control" id="c_name" name="c_name" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="Budget">Budget Per Day</label>
                      <input type="text" class="form-control" id="c_budget" name="c_budget" placeholder="Budget">
                    </div>

                    <button type="submit" name ="submit" class="btn btn-success btn-lg">Create </button>
                </form>
                  
              </div>   
          </div>
          
       </div>
      
      <?php
      if(isset($msg))
      {   echo'<div calss="row"><div class=" col-md-6 col-md-offset-3"> ';
          echo '<div class="alert alert-danger text-center" role="alert">'.$msg.'</div>';
          echo '</div></div>';
      }
      
      ?>
      
      <?php include 'footer.php';?>