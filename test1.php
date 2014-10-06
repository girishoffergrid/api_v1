<!DOCTYPE html>
<html >
    <head>
        <title></title>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>version-0.1</title>

        <link href="public/css/bootstrap.min.css" rel="stylesheet">

        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <style type="text/css">
           
            .image1 {
                position: relative;
            }

            p {
                font-size: 45px;
                 color: white;
                position: absolute;
                top: 5px;
                left: 50px;
                width: 100%;
                margin: 0 auto;
                
            }
            #b1{
                position: relative;
                top : -200px;
                left:100px;
               
            }
            #b2{
                position: relative;
                top : -200px;
                left:100px;
               
            }
            #b3{
                position: relative;
                top : -200px;
                left:100px;
               
            }
        </style>
    </head>
    <body>
        
        <div class="container">
            <div class="image1">
                <img src="public/336x280-1.jpg"  style="height: 300px; width: 400px"  />
                <div class="text">       
                    <p id='a1'>hello how are u</p>
                    <p id='a2'>my name is girish</p>
                    <p id='a3'> thank you</p>
                </div>
                
                    <img id='b1' src="public/1392875904_desh_so_raha_hai_yale_blue_guys_tee_main.jpg" style="height:150px; width: 150px;"/>
                    <img id='b2' src="public/1401107812_cat_girls_tee_main (1).jpg" style="height:150px; width: 150px;"/>
                    <img id='b3'src="public/1401107812_cat_girls_tee_main.jpg" style="height:150px; width: 150px;"/>
                
            </div>    
            <br/><br/>
            <button class='btn btn-lg btn-success' id='show1'>show1</button>
            <button class='btn btn-lg btn-success' id='show2'>show2</button>
            <button class='btn btn-lg btn-success' id='show3'>show3</button>
           
            
            
        </div>











        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
               $('#a1').hide();
               $('#a2').hide();
               $('#a3').hide();
               
               $('#b1').hide();
               $('#b2').hide();
               $('#b3').hide();
               
               $('#show1').click(function(){
                    $('#a1').hide();
                    $('#a2').hide();
                    $('#a3').hide();
                    $('#b1').hide();
                    $('#b2').hide();
                    $('#b3').hide();
              
                    
                   $('#a1').show();
                   $('#b1').show();
               });
               $('#show2').click(function(){
                   $('#a1').hide();
                    $('#a2').hide();
                    $('#a3').hide();
                    $('#b1').hide();
                   $('#b2').hide();
                   $('#b3').hide();

                   $('#a2').show();
                   $('#b2').show();
               });
               $('#show3').click(function(){
                   $('#a1').hide();
                   $('#a2').hide();
                   $('#a3').hide();
                   $('#b1').hide();
                   $('#b2').hide();
                   $('#b3').hide();
              
                   $('#a3').show();
                   $('#b3').show();
               });
            });
        </script>
        <script src="public/js/bootstrap.min.js"></script>
    </body>
</html>
