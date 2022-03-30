<?php
   require_once('connect.php');
?>
<html>
   
   <head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <style>
* {
  box-sizing: border-box;
}

/* Add a gray background color with some padding */
body {
  font-family: Arial;
  padding: 20px;
  background: #f1f1f1;
}

/* Header/Blog Title */
.header {
  padding: 30px;
  font-size: 20px;
  text-align: center;
  background: white;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {   
  float: left;
  width: 100%;
}

/* Right column */
.rightcolumn {
  float: left;
  width: 25%;
  padding-left: 20px;
}

/* Fake image */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Add a card effect for articles */
.card {
   background-color: white;
   padding: 20px;
   margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Footer */
.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
  margin-top: 20px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {   
    width: 100%;
    padding: 0;
  }
}
</style>

      <title>LPU-Laguna Online Public Access Catalog</title>
      
   </head>
   
   <body>
   <nav id="navbar">
    <h2><a href="index.html"><img src="img/lpulogo.png" alt="lpulogo" width="187" height="78"></a>
    </h2>
</nav>

     
         <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
            
            $sql = "SELECT * FROM articles_table WHERE id = '$id'";
            $result = @mysqli_query($dbc, $sql);
            if ($result->num_rows > 0) {
               while($row = @mysqli_fetch_array($result)) { ?>
                <div class="header">  
                <h1><center><?php echo $row['articletitle'] ?></center></h1>
                </div>
                <div class="row">
                <div class="leftcolumn">
                <div class="card">
                <h5><?php echo $row['author'] ?>. (<?php echo $row['yr']?>). <?php echo $row['articletitle'] ?>. <?php echo $row['journalname'] ?>, <?php echo $row['volume'] ?>(<?php echo $row['issue'] ?>), <?php echo $row['page'] ?>. <?php echo $row['website'] ?><?php echo $row['publisher'] ?></h5>
                <h2>Abstract</h2>
                <p><?php echo $row['abstract'] ?></p>
                </div>
               </div>
               </div>
               <?php
               }
               
             } else {
               echo "NO DATA TO DISPLAY";
               
             }}
         ?>

  
   </body>
   
</html>