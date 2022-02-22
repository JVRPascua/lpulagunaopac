<?php 
    require_once('connect.php');

    if(isset($_POST['update'])){

        $title = $_POST['title'];
        $article = $_POST['article'];
        $author = $_POST['author'];
        $subject = $_POST['subject'];
        $publisher = $_POST['publisher'];
        $publicationdate = $_POST['publicationdate'];
        $callnumber = $_POST['callnumber'];
        $accessionnumber = $_POST['accessionnumber'];
        $id = $_GET['id'];

    $query = "UPDATE articles_table SET `title`='$title',`author`='$author',`subj`='$subject',`publisher`='$publisher',`publication_date`='$publicationdate',`call_number`='$callnumber',`accession_number`='$accessionnumber' WHERE `id`='$id'";
    
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
              $title = $row['title'];
              $author = $row['author'];
              $subject = $row['subj'];
              $publisher = $row['publisher'];
              $publicationdate = $row['publication_date'];
              $callnumber = $row['call_number'];
              $accessionnumber = $row['accession_number'];

            }
            ?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Update Journal Article</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">

    <form class="well form-horizontal" action="" method="post"  id="contact_form">
<fieldset>

<!-- Form Name -->
<legend><center><h2><b>Update Journal Article</b></h2></center></legend><br>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Title</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
  <input  name="title" placeholder="Title" value="<?php echo $title?>" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Author</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="author" placeholder="Author"value="<?php echo $author?>" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

  <div class="form-group"> 
  <label class="col-md-4 control-label">Subject</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
    <input type="text" name="subject" placeholder="Subject" value="<?php echo $subject?>" class="form-control">
      
  </div>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label">Publisher</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="publisher" placeholder="Publisher" class="form-control"value="<?php echo $publisher?>"  type="text">
    </div>
  </div>
</div>
  
<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Publication Date</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
  <input  name="publicationdate" placeholder="Publication Date" class="form-control"value="<?php echo $publicationdate?>"  type="date">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Call Number</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
  <input name="callnumber" placeholder="Call Number" class="form-control" value="<?php echo $callnumber?>"  type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Accession Number</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
  <input name="accessionnumber" placeholder="Acession Number" value="<?php echo $accessionnumber?>" class="form-control"  type="text">
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
<script  src="./script.js"></script>

</body>
</html>

<?php    
        }
        else {
          header('Location: welcome.php');
        }
    }
?> 