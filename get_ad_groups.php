<?php

 
require_once dirname(__FILE__).'/function/function_get_google_campain.php';
require_once dirname(__FILE__).'/function/function_create_google_campain.php';
if(isset($_GET['id']))
{
    try {

      $user = new AdWordsUser();


      $user->LogAll();

      $get_google_adgroups = GetGoogleAdGroups($user, $_GET['id']);


    } catch (Exception $e) {
      printf("An error has occurred: %s\n", $e->getMessage());
    }
}

include 'header.php';
?>
<div class="container">
<div class="well well-lg text-capitalize text-center">
    <h2>camapin name <?php echo $_GET['name'];?></h2>
    <h3>ad groups</h3>
</div>



<table class="table table-hover">
              <tr>
                  <th>Campaign Name</th><th>Id</th><th>Edit</th><th>status</th>
              </tr>
              
                  <?php
                  
                    foreach ($get_google_adgroups as $get_g_c)
                    {
                        $val = explode("--", $get_g_c)
                        ?>
              <tr>
                        <td><?php echo $val[1];?></td>
                        <td><?php echo $val[0];?></td>
                        <td>
                            <a href="get_text_ads.php?id=<?php echo $val[0];?>&name=<?php echo $val[1]; ?>">
                                <button type="button" class="btn btn-warning">Edit Ads</button>
                            </a><br/><br/>
                            <a href="get_text_ads_key.php?id=<?php echo $val[0];?>&name=<?php echo $val[1]; ?>">
                                <button type="button" class="btn btn-warning">Edit key</button>
                            </a>
                        </td>
                        <td><a href="remove_ad_groups.php?id=<?php echo $val[0]; ?>"><button type="button" class="btn btn-danger">Remove</button></a></td>
                        
               </tr>
                        <?php
                    }
                  
                  ?>
               
              
              
          </table>     
          <?php
            if(isset($msg))
            {   echo'<div calss="row"><div class=" col-md-6 col-md-offset-3"> ';
                echo '<div class="alert alert-danger text-center" role="alert">'.$msg.'</div>';
                echo '</div></div>';
            }

           ?>
         <div class="row">
             <div class="col-xs-6 col-md-4 col-md-offset-4"><a href="create_Ad_group.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $_GET['name'];?>"> <button type="button" class="btn btn-success btn-lg ">Create a New Ad Group</button></a></div>
          </div>





    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
</div>
<?php

include 'footer.php';

?>