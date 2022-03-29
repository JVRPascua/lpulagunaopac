<form action="welcome.php">
    <input class="button dashboardbutton" type="submit" value="Go Back" />
</form>
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<?php
require_once('connect.php');
if (isset($_POST['search'])){
    $valueToSearch = $_POST['valueToSearch'];
    
    $query= "SELECT * FROM articles_table
    WHERE title LIKE '%$valueToSearch%' OR author LIKE '%$valueToSearch%' OR abstract LIKE '%$valueToSearch%' OR subj LIKE '%$valueToSearch%'";
    $result = @mysqli_query($dbc, $query);
   
    if (mysqli_num_rows($result) > 0) {
      
        while($row = @mysqli_fetch_array($result)) { ?>
            <div class="card-column">
                  <div class="card bg-light text-dark">
                  <div class="card-body">
                     <h3 class="card-title"><?php echo $row['title'] ?></h3>
                     <small class="card-text">Author: <?php echo $row['author'] ?> </small></br>
                     <small class="card-text">Subject: <?php echo $row['subj'] ?> </small></br>
                     <small class="card-text">Publication Date: <?php echo $row['publicationdate'] ?> </small></br> 
                     <small class="card-text">Volume: <?php echo $row['volume'] ?> </small></br>
                     <small class="card-text">Series: <?php echo $row['series'] ?> </small></br>
                     <small class="card-text" >Pages: <?php echo $row['pages'] ?> </small> </br></br>
                     <a href="article.php?id=<?php echo $row['id']?>" class="btn btn-primary">More Details</a>
                     <a href="update.php?id=<?php echo $row['id']?>" class="btn btn-success">Update</a>
                     <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger"onclick="return confirm('Are you sure you want to delete the journal article?')" >Delete</a>
                  </div>
                  </div>
                  </div>
         <?php
         }

       } else {
         echo '<script>alert("No records found!");
         window.location.href = "welcome.php";</script>';
       }
       

}
   ?>

<script src="../js/main.js"></script>
   