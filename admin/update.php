
<?php 
    require_once('connect.php');

    if(isset($_POST['update'])){

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
        $id = $_GET['id'];

    $query = "UPDATE articles_table SET `author`='$author',`yr`='$year',`articletitle`='$articletitle',`journalname`='$journalname',`volume`='$volume',`issue`='$issue',`pages`='$pages',`website`='$url',`publisher`='$publisher',`abstract`='$abstract' WHERE `id`='$id'";
    
    $result=@mysqli_query($dbc,$query);

    if($result==true){
      echo '<script>alert("Record Successfully Updated!");
      window.location.href = "welcome.php";</script>';
    }
    else{
        echo '<script>alert("Error Updating Record!");
        window.location.href = "welcome.php";</script>';
    }
  }
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $q = "SELECT * FROM articles_table WHERE id ='$id'";
        $result=@mysqli_query($dbc,$q);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
            
              $author = $row['author'];
              $year = $row['yr'];
              $articletitle = $row['articletitle'];
              $journalname = $row['journalname'];
              $volume = $row['volume'];
              $issue = $row['issue'];
              $pages = $row['pages'];
              $url = $row['website'];
              $publisher = $row['publisher'];
              $abstract = $row['abstract']; 
              

            }
            ?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="refresh" content="300;url=logout.php" />
  <title>Update Journal Article</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'><link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="../css/style.css">
</head>
<form action="welcome.php">
    <input class="button dashboardbutton" type="submit" value="Go Back" />
</form>

<body>
<!-- partial:index.partial.html -->
<div class="container">

    <form class="well form-horizontal" action="" method="post"  id="contact_form">
<fieldset>

<!-- Form Name -->
<legend><center><h2><b>Add Journal Article</b></h2></center></legend><br>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Author</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
  <input  name="author"value="<?php echo $author?>" placeholder="Author" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Year</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
  <input  name="year" value="<?php echo $year?>" placeholder="Year" class="form-control"  type="text">
    </div>
  </div>
</div>


<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Article Title</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
  <input name="articletitle" value="<?php echo $articletitle?>"placeholder="Article Title" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

  <div class="form-group"> 
  <label class="col-md-4 control-label">Journal Name</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
    <input type="text" value="<?php echo $journalname?>"name="journalname" placeholder="Journal Name" class="form-control">
      
  </div>
</div>
</div>

<!-- Text input-->
<div class="form-group"> 
  <label class="col-md-4 control-label">Volume</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
    <input type="text" value="<?php echo $volume?>"name="volume" placeholder="Volume" class="form-control">
      
  </div>
</div>
</div>
  
<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Issue</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input  name="issue"value="<?php echo $issue?>" placeholder="Issue" class="form-control" type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Pages</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
  <input name="pages"value="<?php echo $pages?>" placeholder="Pages" class="form-control" type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Website Source</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
  <input name="url" value="<?php echo $url?>"placeholder="URL" class="form-control"  type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Publisher</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
  <input name="publisher" value="<?php echo $publisher?>"placeholder="Publisher" class="form-control"  type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Abstract</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i ></i></span>
  <textarea name="abstract" value="<?php echo $abstract?>"placeholder="Abstract" class="form-control"  type="text" rows="10" cols="50"> </textarea>
    </div>
  </div>
</div>

<!-- Button -->

    <center><input type="submit" name="update" value="Update" class="btn btn-warning" ></center>
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

</body>
</html>

<?php    
        }
        else {
          header('Location: welcome.php');
        }
    }
?> 