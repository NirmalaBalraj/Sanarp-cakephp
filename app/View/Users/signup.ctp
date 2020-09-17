<!-- <div class="form">
<h3>Sign Up</h1>
<?php 
echo $this->Form->create('User');
echo $this->Form->input('name', array('label' => 'User Name'));
echo $this->Form->input('address', ['rows' => '3'], array('label' => 'Address'));
echo $this->Form->input('telephone', array('label' => 'Telephone'));
echo $this->Form->input('email', array('label' => 'Email'));
echo $this->Form->input('dob', array('label' => 'DOB'));
echo $this->Form->input('profile_pic', array('label' => 'Profile Pic', 'type' => 'file'));
echo $this->Form->input('password', array('label' => 'Password'));
echo $this->Form->submit('Submit', array('formnovalidate' => true));
echo $this->form->end();
?>
</div> -->
<!DOCTYPE html>
<html>
        <head>
                <meta charset="utf-8">           
<style>
.signup{
    width: 640px;
    margin: 150px auto;
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
.success {
  color: green;
  margin-left: 5px;
}

label.error {
  display: inline;
}
</style>
<script>
$(document).ready(function() {
$('#signupform').submit(function(e) {
    var result = 'valid';
     
 var username = $('#name').val();
 var telephone = $('#telephone').val();
 var email = $('#email').val();
 var pswd = $('#password').val();
  //var profile_pic = $('#profile_pic').val();
   var address = $('#address').val();
     var dob = $('#dob').val();

 $(".error").remove();
 if(username.length < 1)
 {
      $('#name').after('<span class="error">User Name is required</span>');
      result='invalid';
 }
  if(address.length < 1)
 {
      $('#address').after('<span class="error">Address is required</span>');
      result='invalid';
 }
 if(dob.length < 1)
 {
      $('#dob').after('<span class="error">DOB is required</span>');
      result='invalid';
 }
 if(telephone.length < 1)
 {
      $('#telephone').after('<span class="error">Mobile is required</span>');
      result='invalid';
 }
 else
 {
    if(telephone.length >9)
    {
         $('#telephone').after('<span class="error">Mobile No. should not exceed 9</span>');
         result='invalid';
    }
 }
 if(email.length < 1)
 {
      $('#email').after('<span class="error">Email is required</span>');
      result='invalid';
 }
 
if(pswd.length < 1)
 {
      $('#password').after('<span class="error">Password is required</span>');
      result='invalid';
 }
 else
 {
    var regexp = /^(?=.*\d)(?=.*[ + – _ @ # $ % &])(?=.*[A-Z]).{6,}$/;

    if(!regexp.test(pswd))
    {
    $('#password').after('<span class="error">Password must contain number, uppercase and special character</span>');
    result='invalid';
    }
}

// if(profile_pic == '')
// {
//    $('#profile_pic').after('<span class="error">Profile pic is required</span>');
//       result='invalid';
// }
// else
// {
//     var fileExtn = profile_pic.split('.').pop().toLowerCase();
//     if((fileExtn !== 'jpg') && (fileExtn !=='png'))
//     {
//         $('#profile_pic').after('<span class="error">File Extension should be jpg/ png</span>');
//         result='invalid';
//     }
//     else
//     {
//        if(profile_pic[0].files[0].size > 1000000)
//        {
//           $('#profile_pic').after('<span class="error">File size should be less than 1 MB</span>');
//           result='invalid';
//        }
//     }
// }

 
 
if(result !== 'valid')
{
    e.preventDefault();
}
});
});
</script>
</head>
<body>
<div class="signup">  
  <div class="success text-center"><?php echo $signupstatus ?></div>
 <h2 class="text-center">Sign Up</h2>
<form action="signup" method="post" id="signupform" enctype="multipart/form-data">
<!--<?php echo $this->Form->create('User', array('type' => 'file'));?>-->
<div class="row">
  <div class="col-md-6"> 
    <div class="form-group">
    <input class="form-control" type="text" id="name" name="name" placeholder="User Name" maxlength="100" >
    </div>
    <div class="form-group">
    <input class="form-control" type="text" id="address" name="address" placeholder="Address" maxlength="500">
    </div>
  <div class="form-group">
    <input class="form-control" type="number" id="telephone"  name="telephone" placeholder="Mobile" maxlength="9">
    </div>
</div>
<div class="col-md-6">
     <div class="form-group">
    <input class="form-control" type="email" id="email" name="email" placeholder="Email" maxlength="100">
    </div>
    <div class="form-group">
    <input class="form-control" type="date" id="dob" name="dob" placeholder="DOB">
    </div>   
    <div class="form-group">
    <input class="form-control" type="password" id="password"  name="password" placeholder="Password">
    </div>
</div>

<div class="col-md-6">
  <label for="profile_pic" class="margin-top-float-left">Select profile pic</label>
  </div>
  <div class="col-md-6">
    <div class="form-group">
       <?php echo $this->Form->input('profile_pic', array('type' => 'file', 'label' => false, 'class' => 'form-control')); ?> 
       <div class="error"><?php echo $fileuploaderror ?></div>
     <!--  <input class="form-control" type="file" id="profile_pic"  name="profile_pic">   -->
    </div>
</div>
<div class="col-md-3"> </div>
<div class="col-md-6"> 
    <div class="form-group"> 
    <input type="submit" value="Sign Up" id="submit" class="btn btn-primary btn-block" formnovalidate> 
    </div>
</div>
<div class="col-md-3"> </div>
<div class="col-md-12"> 
    <div class="text-center">
    Already have an account? <a href="login"> Login</a>
    </div>
</div>
    </form> 
</div>
</body>
</html>
