
<!DOCTYPE html>
<html>
        <head>
                <meta charset="utf-8">             
<style>
 .form-body{
    width: 950px;
    margin: 50px auto;
    font-size: 15px;
    margin-bottom: 15px;
   /* background: #f7f7f7;*/
    box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.3);
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
.viewbloglink{
  margin-top:-25px;
  float:right;
}

</style>
<script>
              $(document).ready(function(){
                 
                  $('#blogaddform').submit(function(e) {
                    var result="valid";
                 
                var title = $('#title').val();
                var desc = CKEDITOR.instances['description'].getData();
                 
                 if(title.length < 1)
                 {
                   
                    $('#titlespan').text('Title is required');
                    result ="invalid";                
                 }
                 else
                 {
                  $('#titlespan').text('');
                 }  

                 if(desc.length < 1)
                 {
                 
                  $('#descspan').text('Description is required');
                    result ="invalid";                
                 }
                 else
                 { 
                  $('#descspan').text('');
                 }
                 if(result == 'invalid')
                 {
                  e.preventDefault();
                 }

                });  
                }); 
                </script> 
 
</script>
</head>
<body>

  <nav class="navbar navbar-expand-sm bg-light navbar-light">
  <ul class="navbar-nav">
     <li class="nav-item active">
      <a class="nav-link" href="view">View Blog</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="../users/login">Logout</a>
    </li>
  </ul>
</nav>
<div class="text-center">
<?php 
if($this->Session->read('ustatus')!=='valid')
{
 echo 'Your session has been expired. Kindly logout and login again.';
 return false;
}?>
</div> 

           <div class="form-body">  
             <a class="viewbloglink" href="view">View Blog</a>
            <h2 class="text-center">Add Blog</h2>
           
            <form action="add" method="post" id="blogaddform">

                <div class="form-group row">
                  <label for="title" class="col-sm-2 col-form-label mandatory">Title</label>
                 <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" maxlength="250">
                        <span id="titlespan" class="error"></span>
                </div>
                </div>
                <div class="form-group row">
                  <label for="description" class="col-sm-2 col-form-label mandatory">Description</label>
                 <div class="col-sm-10">
                   <textarea  class="ckeditor" id="description" name="description"></textarea>
                   <span id="descspan" class="error"></span>
                 </div>
                </div>

              <div class="text-center">
                <input type="submit" id="submit" value="Save Blog" class="btn btn-primary">
              </div>
            </form>
           </div> 
        </body>
</html>
