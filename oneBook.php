<?php
include_once("ORM.php");
require_once('admin_bar.php');
$db = ORM::getInstance();
$db->setTable('Book');

$books=$db->select('*',array('id'=>$_GET['id']));
$num_results =mysqli_num_rows($books);
if($num_results!=0){
echo "<div  class='panel panel-default panel-body col-sm-7 col-sm-offset-3' >";	
echo '<ul class="list-group"><br><br>';

for ($i=0; $i <$num_results; $i++) 
	{

				$row = mysqli_fetch_assoc($books);
				// var_dump($row);
                echo "<img class='img-rounded' style='margin-left :250px; border:1px solid;' width=200px height=150px src='./images/bookimages/".$row['bookPicture']."'>";
               echo "<h3 style='color:#8A6D3B;' ><strong>Book Name :</strong></h3>";
               echo "<h4 style='margin-left:100px;'>".$row['bookName']."</h4>";
                echo "<h3 style='color:#8A6D3B;' ><strong>Book Author :</strong></h3>";
               echo "<h4 style='margin-left:100px;'>".$row['bookAuther']."</h4>";
                echo "<h3 style='color:#8A6D3B;' ><strong>Book Description :</strong></h3>";
               echo "<h4 style='margin-left:100px;'>".$row['bookDescription']."</h4>";
               echo "<h3 style='color:#8A6D3B;' ><strong>Book Content :</strong></h3>";
               echo "<h4 style='margin-left:100px;'>".$row['bookBody']."</h4>";


	}
echo '</ul>';
echo '</div>';
}




?>