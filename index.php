<?php 

require_once dirname(__FILE__).'/function/function_get_google_campain.php';



try {
  // Get AdWordsUser from credentials in "../auth.ini"
  // relative to the AdWordsUser.php file's directory.
  $user = new AdWordsUser();

  // Log every SOAP XML request and response.
  $user->LogAll();

  $get_google_campains = GetGoogleCampaigns($user);
  
  
  
  
  
} catch (Exception $e) {
  printf("An error has occurred: %s\n", $e->getMessage());
}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>version-0.1</title>

    <link href="public/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    
  </head>
  <body>
      <div class="container">
            <div class="well well-sm">
                <center>    
                  <h2>Welcome To OfferGrid</h2><br/>
                  <h3>DASH BOARD</h3> 
                </center>
            </div>
          <div class="well well-sm">
              
              <h3>campaigns</h3>
          </div>
       
          <table class="table table-condensed">
              <tr>
                  <th>Name</th><th>Id</th><th>Edit</th><th>status</th>
              </tr>
              
                  <?php
                  
                    foreach ($get_google_campains as $get_g_c)
                    {
                        $val = explode("--", $get_g_c)
                        ?>
              <tr>
                        <td><?php echo $val[1];?></td>
                        <td><?php echo $val[0];?></td>
                        <td>
                            <a href="get_ad_groups.php?id=<?php echo $val[0];?>&name=<?php echo $val[1]; ?>">
                                <button type="button" class="btn btn-warning">Edit</button>
                            </a></td>
                        <td><a href="remove_campain.php?id=<?php echo $val[0]; ?>"><button type="button" class="btn btn-danger">Remove</button></a></td>    
                        
               </tr>
                        <?php
                    }
                  
                  ?>
               
              
          </table>     
          <div class="row">
              <div class="col-xs-6 col-md-4 col-md-offset-4"><a href="create_campain.php"> <button type="button" class="btn btn-success btn-lg ">Create a New campaign</button></a></div>
          </div>
          
          
          
          
          
          
          
          
          
          
          
          
          
       
      </div>

    
      
      
      
      
      
      
      
      
      
      
      
      
      
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    
    <script src="public/js/bootstrap.min.js"></script>
  </body>
</html>
