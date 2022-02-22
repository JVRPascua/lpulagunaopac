<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Add Journal Article</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">

    <form class="well form-horizontal" action="addarticle.php" method="post"  id="contact_form">
<fieldset>

<!-- Form Name -->
<legend><center><h2><b>Add Journal Article</b></h2></center></legend><br>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Title</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
  <input  name="title" placeholder="Title" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Author</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="author" placeholder="Author" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

  <div class="form-group"> 
  <label class="col-md-4 control-label">Subject</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
    <input type="text" name="subject" placeholder="Subject" class="form-control">
      
  </div>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label">Publisher</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="publisher" placeholder="Publisher" class="form-control"  type="text">
    </div>
  </div>
</div>
  
<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Publication Date</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
  <input  name="publicationdate" placeholder="Publication Date" class="form-control"  type="date">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Call Number</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
  <input name="callnumber" placeholder="Call Number" class="form-control"  type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Accession Number</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
  <input name="accessionnumber" placeholder="Acession Number" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Button -->

    <center><input type="submit" name="addarticle" class="btn btn-warning" ></center>
  </div>
</div>



</fieldset>
</form>
</div>
    </div><!-- /.container -->
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
<script  src="./script.js"></script>

</body>
</html>


<?php
require_once('connect.php');


if(isset($_POST['addarticle'])){
    
    $title = $_POST['title'];
    $author = $_POST['author'];
    $subject = $_POST['subject'];
    $publisher = $_POST['publisher'];
    $publication_date = $_POST['publicationdate'];
    $call_number = $_POST['callnumber'];
    $accession_number = $_POST['accessionnumber'];  

    $query_addarticle = "INSERT INTO articles_table (title, author, subj, publisher, publication_date, call_number, accession_number) 
                        VALUES ('$title','$author','$subject','$publisher','$publication_date','$call_number','$accession_number')";
    $result = @mysqli_query($dbc, $query_addarticle);

        if (!$result) {
        $err[] = "Failed to add user: " . mysqli_error($dbc);
        }

        else{
   
        echo '<script>alert("User Successfully Added!");
        window.location.href = "welcome.php";</script>';  
        }
    
        mysqli_close($dbc);
}


 
?>