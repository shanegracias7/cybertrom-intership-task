<?php 
  include('sesion.php');

   $rec_limit = 5;
   $db = mysqli_connect("localhost","root","","cybertrom");

  

 /* Get total number of records */
 $result = mysqli_query($db,"SELECT count(id) FROM forminfo" );
 $row = mysqli_fetch_array($result);
 $rec_count = $row[0];








 if( isset($_GET{'page'} ) ) {
    $page = $_GET{'page'} + 1;
    $offset = $rec_limit * $page ;
 }else {
    $page = 0;
    $offset = 0;
 }




$left_rec = $rec_count - ($page * $rec_limit);



$result = mysqli_query($db,"SELECT * FROM forminfo LIMIT ".$offset.",".$rec_limit);

echo "<link rel='stylesheet' type='text/css' href='style/style_table.css'>";

echo "<table>";
$i = 0;
while ($row = mysqli_fetch_array($result))
{

   if ($i == 0) 
   {
        $i++;
        echo "  <tr>
        		<th>NAME</th>
        		<th>IMAGE</th>
            <th>DOWNLOAD</th>
        		</tr>";
    }
    
    echo "	<tr>
    			<td>". $row['firstname']." ".$row['lastname']." </td>
    			<td> <img src='uploads/".$row['image']."' style='width:200px;height:200px;' alt='alternatetext'></td>
          <td><a href = 'download.php?id=".$row['id']."' class='btn'>download</a></td>
    		</tr>";

 }
 echo "</table>";






 if( $page > 0 ) {
$last = $page - 2;
echo "<div class='homepage_buttons_group'>
      <a href = \"display.php?page=$last\" class='btn'>Last 5 Records</a> | ";
echo "<a href = \"display.php?page=$page\" class='btn'>Next 5 Records</a>
      </div>";

}else if( $page == 0 ) {
$page = $page + 0;
echo "<div class='homepage_buttons_group'>
      <a href = \"display.php?page=$page\" class='btn'>Next 5 Records</a>
      </div>";

}else if( $left_rec < $rec_limit ) {

$last = $page - 2;
echo "<div class='homepage_buttons_group'>
      <a href = \"display.php?page=$last\" class='btn'>Last 5 Records</a>
      </div>";

}

$total_page=$rec_count/$rec_limit;

echo "<div class='homepage_buttons_group'>";
echo "<h4>PAGE</h4><br>";
echo '<a href = "display.php" class="btn">1</a>';
$k=1;
for ($j=0; $j < $total_page-1; $j++) { 
  $k++;
  echo '<a href = "display.php?page='.$j.'" class="btn">'.$k.'</a>';
  
}
echo "</div>";

?>
<div class='homepage_buttons_group'>
<a href = "logout.php" class='logoutbtn'>logout</a>
<a href = "form.php" class='btn'>add more</a>
</div>