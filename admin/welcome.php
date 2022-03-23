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
      <input type="text" placeholder="Search for title, subject, or abstract...." style="width: 500px" name="valueToSearch">
      <button type="submit" name="search"> <i class="fa fa-search"></i></button>
    </form>
  </div>
      
      <h2>
         <?php
            $sql = "SELECT * FROM articles_table";
            $result = @mysqli_query($dbc, $sql);
            if ($result->num_rows > 0) {
               echo "<table id='studenttable' border='1'>
               <tr>
               <th>ID</th>
               <th>Title</th>
               <th>Subject</th>
               <th>Publisher</th>
               <th>Publication Date</th>
               <th>Publication Place</th>
               <th>Volume</th>
               <th>Number</th>
               <th>Series</th>
               <th>Pages</th>
               <th>Abstract</th>
               <th>Actions </th>
               </tr>";
               
               while($row = @mysqli_fetch_array($result)) { ?>
                  <tr>
                  <td> <?php echo $row['id'] ?> </td>
                  <td> <?php echo $row['title'] ?> </td>
                  <td> <?php echo $row['subj'] ?> </td>
                  <td> <?php echo $row['publisher'] ?> </td>
                  <td> <?php echo $row['publicationdate'] ?> </td>
                  <td> <?php echo $row['publicationplace'] ?> </td>
                  <td> <?php echo $row['volume'] ?> </td>
                  <td> <?php echo $row['num'] ?> </td>
                  <td> <?php echo $row['series'] ?> </td>
                  <td> <?php echo $row['pages'] ?> </td>
                  <td> <?php echo $row['abstract'] ?> </td>
                  <td> <a class="btn btn-primary" href="update.php?id=<?php echo $row['id']?>">Update</a> <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']?>"  onclick="return confirm('Are you sure you want to delete the journal article?')">Delete</a></td>
               

               </tr>
               <?php
               }
               echo "</table>";
               
             } else {
               echo "NO DATA TO DISPLAY";
               
             }
         ?>
      </h2>
      

      <script src="../js/main.js"></script>
   </body>
   
</html>