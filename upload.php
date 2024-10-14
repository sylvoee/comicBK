<!-- 
<?php
include('connection.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>uploads Books</title>
</head>    
    
    <body>

<!-- navbar ends here -->

<div class="text-center">
<div class="row" style ="font-family: cursive;">

<!-- post pdf starts here -->
<div class="col-sm-5" >

<form class = "form-group" method="post" action = "" enctype="multipart/form-data" style ="height:90vh;" 
class ="shadow-lg border-0 pl-1 pr-1">

    <div class="form-input py-2 mt-5">
       <h3 class = "text-info text-center"><i class="fa fa-upload"></i> Upload A Book</h3>
       <hr>
        <div class="form-group">
          <input type="text" class="form-control" name="name"
                 placeholder="Enter book name or title" required>
        </div> 

        <div class="form-input py-2">
        <div class="form-group">
          <label for="">Book Description</label>
          <textarea class="form-control" name="description" name="" id="" cols="30" rows="6"></textarea>
        </div> 

        <div class="form-input py-2">
        <div class="form-group">
          <input type="text" class="form-control" name="department"
                 placeholder="department" required>
        </div> 

        
        <div class="form-group ">
          <input type="text" class="form-control" name="author"
                 placeholder="author" required>
        </div> 

        <div class="form-group py-2">
          <input type="file" name="pdf_file"
                 class="form-control" target =".pdf"
                 title="Upload PDF"/>
        </div>
        <div class="form-group">
          <input type="submit" class="btnRegister btn btn-success"name="submit" value="Submit">
      <input type="reset" class="btnRegister btn btn-danger" name="submit" value="Reset">
        </div>
   </div>
</form>

</div>

</div>
</div> 

</div>
</body>
</html>
<!-- post pdf ends here --> 





<?php

include('connection.php');

	if (isset($_POST['submit'])) {

		$name = $_POST['name'];
        $description = $_POST['description'];
        $department = $_POST['department'];
        $author = $_POST['author'];

		if (isset($_FILES['pdf_file']['name']))
		{

		$file_name = date("hmsms").$_FILES['pdf_file']['name'];
          $file_name = str_replace(' ', '-', $file_name);
		$file_tmp =  $_FILES['pdf_file']['tmp_name'];

		move_uploaded_file($file_tmp,"./all_pdf_file/".$file_name);

    
		$insertquery ="INSERT INTO tbl_pdf(name, filename , description,department, author, date) 
        VALUES('$name','$file_name', '$description', '$department' , '$author', NOW())";

		$iquery = mysqli_query($con, $insertquery);
        //header("Location:uploadPage.php");
        echo '<b> Upload successful ok </b>';
        
		}
		else
		{
		?>
			<div class=
			"alert alert-danger alert-dismissible
			fade show text-center">
			<a class="close" data-dismiss="alert"
				aria-label="close">×</a>
			<strong>Failed!</strong>
				File must be uploaded in PDF format!
			</div>
		<?php
		}

  


	}
?> -->
