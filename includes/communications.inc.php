<?php 
/* 
  communications.inc.php 
*/

require_once 'header.inc.php';
require_once 'mysql.inc.php';
?>

<div class="whichpage">Communications</div>
<div class="wrapper">  

<?php 
  $rows = db_select("SELECT * from Communication");

  if ($rows === false) {
    $error = db_error();
    print("Error: " . $error);
    exit();
  } 
 ?>  
 
<table>
  <tr>
    <th>Action</th>
    <th>Type</th>
    <th>Status</th>
    <th>When</th>
    <th>From</th>
    <th>To</th>
    <th>Message</th>
  </tr>

<?php   
  foreach ($rows as $row) {
    $reckey    = $row['communication_id'];
    
    
    $buttonArea = "<form method='post' action='#'>" .
    "<input type='hidden' name='reckey' value='$reckey'>" .
    "<input class='button bSmall' name='edit' type='submit' value='[E]'>" .
    "<input class='button bSmall' name='delete' type='submit' value='[D]'>" .
    "</form> ";
  
    echo "<tr>";
    echo  "<td>" . $buttonArea ."</td>";
    echo  "<td>" . $row['type_enum'] ."</td>";
    echo  "<td>" . $row['status_enum'] ."</td>";
    echo  "<td>" . $row['message_time'] ."</td>";
    echo  "<td>" . $row['sender'] ."</td>";
    echo  "<td>" . $row['recipient'] ."</td>";
    echo  "<td>" . $row['message'] ."</td>";
    echo "</tr>";
  }
?>
</table>
</div>
 <!-- <p class='tagcopyright'><?php echo FOOTER_TEXT?></p> -->
<?php
  require_once 'footer.inc.php';
?>
</body>
</html>
