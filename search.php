<form action="opac.php">
    <input class="button dashboardbutton" type="submit" value="Go to Dashboard" />
</form>
<link rel="stylesheet" href="css/style.css">
<style>


<?php
require_once('connect.php');
if (isset($_POST['search'])){
    $valueToSearch = $_POST['valueToSearch'];
    
    $query= "SELECT * FROM articles_table
    WHERE title LIKE '%$valueToSearch%' OR abstract LIKE '%$valueToSearch%' OR subj LIKE '%$valueToSearch%'";
    $result = @mysqli_query($dbc, $query);
   
    if (mysqli_num_rows($result) > 0) {
        
        echo "<table border='1' id='studenttable'>
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
         echo '<script>alert("No records found!");
         window.location.href = "opac.php";</script>';
       }
       

}
   ?>
   