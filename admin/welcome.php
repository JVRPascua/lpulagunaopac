<?php
   include('session.php');
   require_once('connect.php');
?>
<html>
   
   <head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <meta http-equiv="refresh" content="300;url=logout.php" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <title>Welcome Admin</title>
 

   </head>
   
   <body>
   <nav id="navbar">
    <h2><a href="../index.html"><img src="../img/lpulogo.png"  alt="lpulogo" width="187" height="78"></a>
    </h2>
    <ul>

    <li><a href="logout.php">Log Out</a></li>
        
        
    </ul>
</nav>

      <div class="header">  
      <h1><center>LPU-Laguna OPAC for Journal Articles</center></h1>
      </div>
      <div>
      <a href="addarticle.php" class="btn dashboardbutton"> <span class="glyphicon glyphicon-plus"></span> Add Journal Article</a>
      </div>
      <div class="search-container">
      <form action="search.php" method="post">
      <input type="text" placeholder="Search for article title, author, or journal name..." style="width: 500px" name="valueToSearch">
      <button type="submit" name="search"> <i class="fa fa-search"></i></button>
    </form>
  </div>
</br>
</br>
      
      <h2>
         <?php
            $sql = "SELECT * FROM articles_table";
            $result = @mysqli_query($dbc, $sql);
            if ($result->num_rows > 0) {
               
               while($row = @mysqli_fetch_array($result)) { ?>
                  <div class="card-column">
                  <div class="card bg-light text-dark">
                  <div class="card-body">
                  <h3 class="card-title"><a href="article.php?id=<?php echo $row['id']?>"><?php echo $row['articletitle'] ?>(<?php echo $row['yr']?>)</a></h3>
                     <small class="card-text"><?php echo $row['author'] ?>. (<?php echo $row['yr']?>). <?php echo $row['articletitle'] ?>. <?php echo $row['journalname'] ?>, <?php echo $row['volume'] ?>(<?php echo $row['issue'] ?>), <?php echo $row['page'] ?>. <?php echo $row['website'] ?><?php echo $row['publisher'] ?></small></br>
                     <a href="update.php?id=<?php echo $row['id']?>" class="btn btn-success">Update</a>
                     <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger"onclick="return confirm('Are you sure you want to delete the journal article?')" >Delete</a>
                  </div>
                  </div>
                  </div>
                  
               <?php
               }
               
             } else {
               echo "NO DATA TO DISPLAY";
               
             }
         ?>

      

      <script src="../js/main.js"></script>
   </body>
   
</html>