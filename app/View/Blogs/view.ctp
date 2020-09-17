<!DOCTYPE html>
<html>
        <head>
                <meta charset="utf-8">
            <style>
            .dataTables_length
            {
                display:none;
            }
            #blogtable
            {
               border: 1px solid #dee2e6;
            }

 .form-body{
    width: 950px;
    margin: 20px auto;
    font-size: 15px;
    margin-bottom: 15px;
   /* background: #f7f7f7;*/
    box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}



            </style>
                <script>
                $(document).ready(function() {
                     $('#blogtable').DataTable({
                        "pagingType": "simple_numbers"
                        });
                      
                        
                        $("#blogtable").on("click", ".trow", function(e){
                        {                         
                           var id = $(this).find(".pk").text();
                         }
                          if(id) {
                            window.location = 'edit?id=' + id;
                         }                   
                      });
   

                });
                </script>
            </head>
            <body>
<nav class="navbar navbar-expand-sm bg-light navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="add">Add Blog</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="../users/login">Logout</a>
    </li>
  </ul>
</nav>

<div class="form-body">
<h2 class="text-center">View Blogs</h2>
<div class="table-responsive">
<table id="blogtable" class="table table-striped table-bordered" style="width:100%">
<thead>
	<tr>
    <th>Id</th>
		<th>Title</th>
		<th>Description</th>
	</tr>
</thead>
<tbody>
  <?php foreach ($blog_list as $bloglist): ?>
	   <tr class="trow">
       <td class="pk"><?php echo $bloglist['Blog']['id']; ?></td>
	   <td><?php echo $bloglist['Blog']['title']; ?></td>
	   <td><?php echo $bloglist['Blog']['description']; ?></td>
     </tr>
    <?php endforeach; ?>
	</tbody>
</table>
</div>
</div>
</body>
</html>
