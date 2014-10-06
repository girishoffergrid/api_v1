<?php

require_once dirname(__FILE__).'/function/function_remove_google_campain.php';

if(isset($_GET['id']))
{    
    
    try {

      $user = new AdWordsUser();


      $user->LogAll();

      $remove_campain = RemoveGoogleAdGroup($user, $_GET['id']) ;
      
        if(isset($remove_campain))
        {
            header("location:get_ad_groups.php");
        }


    } catch (Exception $e) {
      printf("An error has occurred: %s\n", $e->getMessage());
    }

    
}
?>
