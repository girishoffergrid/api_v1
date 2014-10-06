<?php

require_once dirname(__FILE__).'/function/function_get_google_campain.php';
if(isset($_GET['id']))
{

    try {

      $user = new AdWordsUser();


      $user->LogAll();

      $get_keywords = GetGoogleKeywords($user, $_GET['id']);
      
      if(!isset($get_keywords))
          {
           $msg = "no keywords found";
          }
      
      


    } catch (Exception $e) {
      $msg = "An error has occurred: %s\n". $e->getMessage();
    }

}


    

?>
<?php include 'header.php';?>
<div class="container">
    <div class="well well-sm text-capitalize text-center">
        <h3>existing keywords </h3>
    </div>
    <br/>
    <center><a href="add_key_words.php?id=<?php echo $_GET['id'];?>"><button class="btn btn-success">add new keywords</button></a></center>
    <br/>
    <table class="table table-hover">
        <tr>
            <th>text</th><th>type</th>
        </tr>
        <?php 
        foreach ($get_keywords as $val)
        {
            $split = explode("--", $val)
            ?>
            <tr>
                <td><?php echo $split[2];?></td>
                <td><?php echo $split[1];?></td>
            </tr>
            <?php
        }
        ?>
    </table>
    
    <?php
    if(isset($msg))
    {
        echo'<div class="alert-danger">$msg</div>';
    }
    
    ?>
    
    
    
    
    
</div>    




     
     
     
     
     
     
     
     
     
     
     
     
<?php include 'footer.php';