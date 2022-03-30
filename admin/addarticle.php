<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="refresh" content="300;url=logout.php" />
  <title>Add Journal Article</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'><link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<form action="welcome.php">
    <input class="button dashboardbutton" type="submit" value="Go Back" />
</form>
<!-- partial:index.partial.html -->
<div class="container">

    <form class="well form-horizontal" action="addarticle.php" method="post"  id="contact_form">
<fieldset>

<!-- Form Name -->
<legend><center><h2><b>Add Journal Article</b></h2></center></legend><br>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Author</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
  <input  name="author" placeholder="Author" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Year</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
  <input  name="year" placeholder="Year" class="form-control"  type="text">
    </div>
  </div>
</div>


<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Article Title</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
  <input name="articletitle" placeholder="Article Title" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

  <div class="form-group"> 
  <label class="col-md-4 control-label">Journal Name</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
    <input type="text" name="journalname" placeholder="Journal Name" class="form-control">
      
  </div>
</div>
</div>

<!-- Text input-->
<div class="form-group"> 
  <label class="col-md-4 control-label">Volume</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
    <input type="text" name="volume" placeholder="Volume" class="form-control">
      
  </div>
</div>
</div>
  
<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Issue</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input  name="issue" placeholder="Issue" class="form-control" type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Pages</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
  <input name="pages" placeholder="Pages" class="form-control" type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Website Source</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
  <input name="url" placeholder="URL" class="form-control"  type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Publisher</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
  <input name="publisher" placeholder="Publisher" class="form-control"  type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Abstract</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i ></i></span>
  <textarea name="abstract" placeholder="Abstract" class="form-control"  type="text" rows="10" cols="50"> </textarea>
    </div>
  </div>
</div>

<!-- Button -->

    <center><input type="submit" name="addarticle" class="btn btn-danger" ></center>
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
    
  $author = $_POST['author'];
  $year = $_POST['year'];
  $articletitle = $_POST['articletitle'];
  $journalname = $_POST['journalname'];
  $volume = $_POST['volume'];
  $issue = $_POST['issue'];
  $pages = $_POST['pages'];
  $url = $_POST['url'];
  $publisher = $_POST['publisher'];
  $abstract = $_POST['abstract'];  

    $query_addarticle = "INSERT INTO articles_table (author, yr, articletitle, journalname, volume, issue, pages, website, publisher, abstract) 
                        VALUES ('$author', '$yr', '$articletitle','$journaltname','$volume','$issue','$pages','$url','$publisher','$abstract')";
    $result = @mysqli_query($dbc, $query_addarticle);

        if (!$result) {
        $err[] = "Failed to add user: " . mysqli_error($dbc);
        }

        else{
   
        echo '<script>alert("Journal Article Successfully Added!");
        window.location.href = "welcome.php";</script>';  
        }
    
        mysqli_close($dbc);
}


 
?>