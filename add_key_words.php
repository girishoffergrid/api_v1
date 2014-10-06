<?php
    require_once dirname(__FILE__).'/function/function_create_google_campain.php';
    
    if(isset($_GET['id']))
    {
        if(isset($_POST['submit']))
        {
            extract($_POST);

            try {
          // Get AdWordsUser from credentials in "../auth.ini"
          // relative to the AdWordsUser.php file's directory.
          $user = new AdWordsUser();

          // Log every SOAP XML request and response.
          $user->LogAll();

          $create_key_words = GoogleAddKeywords($user, $_GET['id'], $key_word_input, $type);
          
          if(isset($create_key_words))
            {
              header('location:get_text_ads_key.php?id='.$_GET['id']);
          }
          else
          {
              echo "error";
          }
          
    
  
  
  
  
  
} catch (Exception $e) {
  $msg ="An error has occurred: %s\n". $e->getMessage();
}
        }
    }

?>

<?php include 'header.php';?>

<div class="container">
    <div class="well well-sm text-capitalize text-center">
        <h3>insert new keywords</h3>
    </div>
    
    <div calss="row">
              <div class=" col-md-6 col-md-offset-3 ">    
                  
                 <form role="form" method="post" action="">
                    <div class="form-group">
                      <label for="key">key words input</label>
                      <input type="text" class="form-control"  name="key_word_input" placeholder="key word">
                    </div>
                    <div class="form-group">
                      <select class="form-control" name="type">
                          <option value="BROAD">Broad</option>
                          <option value="PHRASE">phrase</option>
                          <option value="NEGATIVE">negative</option>
                            
                       </select>
                    </div>

                    <button type="submit" name ="submit" class="btn btn-success ">Create </button>
                </form>
                  
              </div>   
          </div>
    
    
    
    
    
    
    
    
    
</div>




<?phpinclude 'footer.php';