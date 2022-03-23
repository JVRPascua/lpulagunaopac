<?php
   require_once('connect.php');
?>
<html>
   
   <head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
      <title>LPU-Laguna Online Public Access Catalog</title>
      
   </head>
   
   <body>
   <nav id="navbar">
    <h2><a href="index.html"><img src="img/lpulogo.png" alt="lpulogo" width="187" height="78"></a>
    </h2>
    <ul>

    <li><a href="index.html">Home</a></li>
        
        
    </ul>
</nav>

      <div class="header">  
      <h1><center>LPU-Laguna OPAC for Journal Articles</center></h1>
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
 
               

               </tr>
               <?php
               }
               echo "</table>";
               
             } else {
               echo "NO DATA TO DISPLAY";
               
             }
         ?>
      </h2>
      

  
   </body>
   
</html>