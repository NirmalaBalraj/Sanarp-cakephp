
<!DOCTYPE html>
<html>
        <head>
                <meta charset="utf-8">          
<style>
.login{
    width: 340px;
    margin: 160px auto;
    font-size: 15px;
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
form div {
  margin-bottom: 10px;
}
.error {
  color: red;
  margin-left: 5px;
}

label.error {
  display: inline;
}
</style>
<script>
 $(document).ready(function(){
                $('#mobileform').hide();
                $('#emailform').show();
                });
</script>

          <script>
              $(document).ready(function(){
                 
                  $('#emailform').submit(function(e) {
                    
                var result = 'valid';    
                 var email = $('#email').val();
                var password = $('#password').val();
            
              $(".error").remove();
                 if(!email)
                 {
                $('#email').after('<span class="error">Email is required</span>');
                  result='invalid';
                 }
                 
                 if(!password)
                 {    
                 $('#password').after('<span class="error">Password is required</span>');  
                  result='invalid';
                 }
                 if(result !== 'valid')
                 {
                 e.preventDefault();
                return false;
                 }
                          
                });  
                }); 
                </script>   
                 <script>
              $(document).ready(function(){
                $("#mobileform").submit(function(e) {
                  
                $(".error").remove();

                var result = 'valid';    
                 var telephone = $('#telephone').val();
                var password2 = $('#password2').val();
              
                 if(!telephone)
                 {
                 $('#telephone').after('<span class="error">Mobile No. is required</span>');
                  result='invalid';
                 }
                 if(!password2)
                 {      
                   $('#password2').after('<span class="error">Password is required</span>');
                  result='invalid';
                 }
                 if(result !== 'valid')
                 {
                 e.preventDefault();
                return false;
                 }
                          
                });   
                }); 
                </script>    
 <script>    


    function sform(currentmode)
    {
         if(currentmode == 'email')
         {
            
               $('#emailform').hide();
               $('#mobileform').show();
         }
         else
         {
                
            
              $('#mobileform').hide();
               $('#emailform').show();
         }
    }
 
    function mobilesubmit()
    {
       
    }
</script>

            </head>
            <body>

  
	<div class="login"> 

  <div class="error text-center"><?php echo $loginstatus ?></div>  
    <h2 class="text-center">Login</h2>
  
	<form action="login" method="post" id="emailform">
    <div class="form-group">
    <input class="form-control" type="text" id="email"  name="email" placeholder="Email"> 
    </div>
    <div class="form-group">
	<input class="form-control" type="password" id="password" name="password" placeholder="Password">
    </div>
    <div class="form-group"> 
	<input type="submit" value="Login" id="submit1" class="btn btn-primary btn-block">	
    </div>
    <div>
    <a class="float-left" href="signup">Register</a>
	<a class="float-right" href="#" onclick=sform('email')>Login with Mobile</a>
    </div>

</form>



<form action="login" method="post" id="mobileform">

    <div class="form-group">
    <input class="form-control" type="text" id="telephone" name="telephone" placeholder="Mobile Number">
    </div>
    <div class="form-group">
    <input class="form-control" type="password" id="password2"  name="password2" placeholder="Password">
    </div>
    <div class="form-group"> 
    <input type="submit" value="Login" onclick=mobilesubmit()  class="btn btn-primary btn-block"> 
    </div>
    <div>
    <a class="float-left" href="signup">Register</a>
    <a class="float-right" href="#" onclick=sform('mobile')>Login with Email</a>
    </div>
    </form> 

</div>
</body>
</html>
