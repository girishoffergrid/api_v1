<?php

 
require_once dirname(__FILE__).'/function/function_get_google_campain.php';
if(isset($_GET['id']))
{

    try {

      $user = new AdWordsUser();


      $user->LogAll();

      $get_google_ads = GetGoogleTextAds($user, $_GET['id']);
      
      


    } catch (Exception $e) {
      printf("An error has occurred: %s\n", $e->getMessage());
    }

}
include 'header.php';
?>
<div class="container">
    <div class="well well-lg text-capitalize text-center">
        <h2>group : <?php if(isset($_GET['name'])){echo $_GET['name'];}?></h2>
        <h3>text ads</h3>
    </div>
    
    <div class="row">
        <div class="col-xs-6 col-md-4 col-md-offset-4"><a href="create_text_ad.php?id=<?php echo $_GET['id']; ?>"> <button type="button" class="btn btn-success btn-lg ">Create a New Ad </button></a></div>
    </div>
    <br/>
    
    <table class="table table-hover">
        <tr>
            <th>Text ads</th><th>edit</th><td>status</td>
        </tr>
        <?php
        foreach ($get_google_ads as $val)
        {
            $split = explode("--", $val);
            ?>
            <tr>
            <?php
            echo '<td>'.$split[1]."<br/>".
                        $split[2]."<br/>".
                        $split[3]."<br/>".
                        $split[4]."<br/>".
                        $split[5]."<br/>".
                    '</td>';
            ?>
            <td><a href="edit_text_ads.php?id=<?php echo $split[0]; ?>">
                                <button type='button' class='btn btn-warning'>Edit</button>
                            </a></td>
                            <td><a href="remove_text_ads.php?group_id=<?php echo $_GET['id'];?>&ad_id=<?php echo $split[0]; ?>">
                                    <button type="button" class="btn btn-danger">Remove</button></a>
                            </td>
            </tr>
            <?php
        }
        
        
        ?>
    </table>
    
</div>


<?php

include 'footer.php';

?>