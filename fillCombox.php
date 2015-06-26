<?php
header('Content-Type: application/json');
include_once("ORM.php");
$db = ORM::getInstance();
$db->setTable('Category');

		  	class category
		  	{
		  		public $cat_name;
		  		public  $cat_id;
		  		public $cat_pic;
		  		public $cat_desc;
		  		function __construct($cat_id,$cat_name,$cat_desc,$cat_pic)
				{
					$this->cat_name = $cat_name;
					$this->cat_desc= $cat_desc;
					$this->cat_id = $cat_id;
					$this->cat_pic = $cat_pic;

				}
		  	}

$mysqli = $db->selectall();
$num_results =mysqli_num_rows($mysqli);
$objs = array();
			for ($i=0; $i <$num_results; $i++) 
			{

				$row = mysqli_fetch_assoc($mysqli);
				$cat  = new category($row['id'],$row['categoryName'],$row['categoryDescription'],$row['categoryPicture']);
				$objs[] = $cat ;
	
			}

		echo  json_encode($objs);

?>