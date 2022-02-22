<form action="welcome.php">
    <input class="button dashboardbutton" type="submit" value="Go to Dashboard" />
</form>
<link rel="stylesheet" href="../css/style.css">
<style>
  .dashboardbutton {
  background-color: white;
  color: black;
  border: 2px solid #e7e7e7;
  padding: 10px 24px;
  transition-duration: 0.4s;
}
.dashboardbutton:hover{
  background-color: #e7e7e7;
}

#studenttable {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#studenttable td, #studenttable th {
  border: 1px solid #ddd;
  padding: 8px;
}

#studenttable tr:nth-child(even){background-color: #f2f2f2;}

#studenttable tr:hover {background-color: #ddd;}

#studenttable th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}

</style>

<?php
require_once('connect.php');
if (isset($_POST['search'])){
    $valueToSearch = $_POST['valueToSearch'];
    
    $query= "SELECT * FROM articles_table
    WHERE title LIKE '%$valueToSearch%' OR author LIKE '%$valueToSearch%' OR subj LIKE '%$valueToSearch%' OR publisher LIKE '%$valueToSearch%'";
    $result = @mysqli_query($dbc, $query);
   
    if (mysqli_num_rows($result) > 0) {
        
        echo "<table border='1' id='studenttable'>
        <tr>
               <th>ID</th>
               <th>Title</th>
               <th>Author</th>
               <th>Subject</th>
               <th>Publisher</th>
               <th>Publication Date</th>
               <th>Call Number</th>
               <th>Accession Number</th>
               <th>Actions </th>
               </tr>";
        
        while($row = @mysqli_fetch_array($result)) { ?>
            <tr>
                  <td> <?php echo $row['id'] ?> </td>
                  <td> <?php echo $row['title'] ?> </td>
                  <td> <?php echo $row['author'] ?> </td>
                  <td> <?php echo $row['subj'] ?> </td>
                  <td> <?php echo $row['publisher'] ?> </td>
                  <td> <?php echo $row['publication_date'] ?> </td>
                  <td> <?php echo $row['call_number'] ?> </td>
                  <td> <?php echo $row['accession_number'] ?> </td>
                  <td> <a class="btn" href="update.php?id=<?php echo $row['id']?>">Update</a> <a class="btn" href="delete.php?id=<?php echo $row['id']?>">Delete</a></td>
               

               </tr>
         
         <?php
         }
         echo "</table>";
         
       } else {
         echo '<script>alert("No records found!");
         window.location.href = "welcome.php";</script>';
       }
       

}
   ?>
   