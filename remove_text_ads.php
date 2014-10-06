<?php

require_once dirname(__FILE__).'/function/function_remove_google_campain.php';

if(isset($_GET['group_id'],$_GET['ad_id']))
{    
    
    try {

      $user = new AdWordsUser();


      $user->LogAll();

      $remove_campain = RemoveGoogleAd($user, $_GET['group_id'], $_GET['ad_id']) ;
      
        if(isset($remove_campain))
        {
            header("location:get_text_ads.php");
        }


    } catch (Exception $e) {
      printf("An error has occurred: %s\n", $e->getMessage());
    }

    
}
?>
