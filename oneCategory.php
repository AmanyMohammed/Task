<?php
include_once("ORM.php");
require_once('admin_bar.php');
$db = ORM::getInstance();
$db->setTable('Category');
$cat=$db->select('*',array('id'=>$_GET['id']));
$row = mysqli_fetch_assoc($cat);
//
$db->setTable('Book');
$books=$db->select('*',array('categoryId'=>$_GET['id']));
$num_results =mysqli_num_rows($books);
//
if($num_results!=0){
echo "<div class='col-sm-8 col-sm-offset-2' >";	
// echo "<li class='list-group-item'>";
echo "<div><div style='float:left; padding-right:20px'><img style='margin:2px; border:1px solid;' width=150px height=100px src='./images/categoryimages/".$row['categoryPicture']."'></div>";
echo "<div  ><h4 ><strong>Category Name :</strong></h3>";
echo "<h5>".$row['categoryName']."</h4>";
echo "<h4 ><strong>Category Description :</strong></h3>";
echo "<h5 style='margin-left:100px;'>".$row['categoryDescription']."</h4></div>";
echo '</div><ul class="list-group"><br><br>';
for ($i=0; $i <$num_results; $i++) 
	{

		$row = mysqli_fetch_assoc($books);
	        echo "<li class='list-group-item' id='".$row['id']."'>";   
                echo "<div><img id='".$row['id']."ximg' style='margin:2px; border:1px solid;' width=100px height=80px src='./images/bookimages/".$row['bookPicture']."'><p style='margin-top:-70px;margin-left:110px;'><font  size='3'>";
                echo "<b><a id='".$row['id']."xname' href='oneBook.php?id=".$row['id']."'>".$row['bookName']."</a></b></font></p>";
                echo "<p style='margin-left:110px;' id='".$row['id']."xdesc'>".$row['bookDescription']."</p></div>"; 
                echo "<div style='float:right; margin-top:-30px'>";
                echo '<button id="'.$row['id'].'xedit" type="button" class="btn btn-default editbook" aria-label="Left Align"><a href="addBook.php?id='.$row['id'].'"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></button>';
                echo '<button id="'.$row['id'].'xdelete" type="button" class="btn btn-default deletebook" aria-label="Left Align"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>';
        	echo "</div>";       
                echo "</li><br>";

                
	}
echo '</ul>';
echo '</div>';
}

echo '<script type="text/javascript" src="js/book.js"></script>';
echo '<script type="text/javascript" src="js/validation.js"></script>';






?>