<?php 
include ("validate_otp.php");
// include ("signup_script.php");
// echo "hello";
?>
<!DOCTYPE html>  
 <html lang="en">  
  <head>  
   <meta charset="UTF-8" />  
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />  
   <title>OTP Input</title>  
     <!-- styles -->  
   <link rel="stylesheet" href="styles.css" />  
   <style>
     /*  @import url('https://fonts.googleapis.com/css?family=Raleway:200');  */
     /* body, html {  */
     /*      height: 100%;  */
     /*      margin: 0;  */
     /*      font-family: 'Raleway', sans-serif;  */
     /*      font-weight: 200;  */
     /*}  */
     /* body {  */
     /*      background-color: #0f0f1a;  */
     /*      display: flex;  */
     /*      align-items: center;  */
     /*      justify-content: center;  */
     /*      flex-direction: column;  */
     /*}  */
     /* .digit-group input {  */
     /*      width: 30px;  */
     /*      height: 50px;  */
     /*      background-color: #18182a;  */
     /*      border: none;  */
     /*      line-height: 50px;  */
     /*      text-align: center;  */
     /*      font-size: 24px;  */
     /*      font-family: 'Raleway', sans-serif;  */
     /*      font-weight: 200;  */
     /*      color: white;  */
     /*      margin: 0 2px;  */
     /*}  */
     /* .digit-group .splitter {  */
     /*      padding: 0 5px;  */
     /*      color: white;  */
     /*      font-size: 24px;  */
     /*}  */
     /* .prompt {  */
     /*      margin-bottom: 20px;  */
     /*      font-size: 20px;  */
     /*      color: white;  */
     /*} */
   </style>
  </head>  
  <body>  
   <div class="prompt">  
    Enter OTP  
   </div>  
   <!--<form method="get" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" class="digit-group" data-group-name="digits" data-autosubmit="false" autocomplete="off">-->
       <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" >  
    <input type="text" id="digit-1" name="OTP" data-next="digit-2" />  
    <!--<input type="text" id="digit-2" name="digit-2" data-next="digit-3" data-previous="digit-1" />  -->
    <!--<input type="text" id="digit-3" name="digit-3" data-next="digit-4" data-previous="digit-2" />  -->
    <!--<input type="text" id="digit-4" name="digit-4" data-next="digit-5" data-previous="digit-3" />  -->
    <button class="btn btn-lg btn-primary btn-block"  name="Submit" type="Submit">Sign Up</button>
   </form>  
   <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  -->
   <!--<script src="app.js"></script>  -->
   <script>
//         $('.digit-group').find('input').each(function() {  
//       $(this).attr('maxlength', 1);  
//       $(this).on('keyup', function(e) {  
//           var parent = $($(this).parent());  
//           if(e.keyCode === 8 || e.keyCode === 37) {  
//                 var prev = parent.find('input#' + $(this).data('previous'));  
//                 if(prev.length) {  
//                      $(prev).select();  
//                 }  
//           } else if((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {  
//                 var next = parent.find('input#' + $(this).data('next'));  
//                 if(next.length) {  
//                      $(next).select();  
//                 } else {  
//                      if(parent.data('autosubmit')) {  
//                           parent.submit();  
//                      }  
//                 }  
//           }  
//       });  
//  });
   </script>
  </body>  
 </html>  