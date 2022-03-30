<form action="opac.php">
    <input class="button dashboardbutton" type="submit" value="Go Back" />
</form>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<?php
require_once('connect.php');
if (isset($_POST['search'])){
    $valueToSearch = $_POST['valueToSearch'];
    
    $query= "SELECT * FROM articles_table
    WHERE articletitle LIKE '%$valueToSearch%' OR author LIKE '%$valueToSearch%' OR journalname LIKE '%$valueToSearch%'";
    $result = @mysqli_query($dbc, $query);
   
    if (mysqli_num_rows($result) > 0) {
        
        while($row = @mysqli_fetch_array($result)) { ?>
            <div class="card-column">
                  <div class="card bg-light text-dark">
                  <div class="card-body">
                     <h3 class="card-title"><a href="article.php?id=<?php echo $row['id']?>"><?php echo $row['articletitle'] ?>(<?php echo $row['yr']?>)</a></h3>
                     <small class="card-text"><?php echo $row['author'] ?>. (<?php echo $row['yr']?>). <?php echo $row['articletitle'] ?>. <?php echo $row['journalname'] ?>, <?php echo $row['volume'] ?>(<?php echo $row['issue'] ?>), <?php echo $row['page'] ?>. <?php echo $row['website'] ?><?php echo $row['publisher'] ?></small></br>
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
   