<?php
// header('Content-Type: application/json');
include_once("ORM.php");
$db = ORM::getInstance();
$db->setTable('Category');



if($_POST['flag']=='1'){
		$upfile = "./images/categoryimages/".$_FILES['pic']['name'] ;
		$image_name=$_FILES['pic']['name'];
		$image_path="./images/categoryimages/".$image_name;
		$image_error="";
			if ($_FILES['pic']['type']!='image/png')
			{
				$image_error='* image is not png';
				
			}
			if (is_uploaded_file($_FILES['pic']['tmp_name']))
			{
				if (!move_uploaded_file($_FILES['pic']['tmp_name'], $upfile))
				{
					$image_error='* Could not move image to destination directory';
				}
					
			}
			
		

//
$mysqli = $db->insert(array('categoryName'=>$_POST['name'],'categoryDescription'=>$_POST['desc'],'categoryPicture'=>$image_name));
header("Location: allCategories.php");

}elseif($_POST['flag']=='2'){
	$imgname=$db->select('categoryPicture',array('product_id'=>$_POST['id']));
	$mysqli = $db->delete(array('id'=>$_POST['id']));
	// unlink('images/categoryimages/'.trim($imgname));
	echo '{"id":"add"}';

}elseif($_POST['flag']=='3'){
	//

		$upfile = "./images/categoryimages/".$_FILES['pic']['name'] ;
		$image_name=$_FILES['pic']['name'];
		$image_path="./images/categoryimages/".$image_name;
		$image_error="";
		if ($_FILES['pic']['error'] > 0)
		{
			switch ($_FILES['pic']['error'])
			{
			case 1: $image_error='* Image exceeded upload_max_filesize';
			break;
			case 2: $image_error='* Image exceeded max_file_size';
			break;
			case 3: $image_error='* Image only partially uploaded';
			break;
			case 4:
			if($_POST['pic']!=""){
			$image_name=$_POST['pic']; 
			    }else{
					
					$image_error='* No image uploaded';
				}
			break;
			case 6: $image_error='* Cannot upload image: No temp directory specified';
			break;
			case 7: $image_error='* Upload failed: Cannot write to disk';
			break;
			}
			
		}
		else{
			if ($_FILES['pic']['type']!='image/png')
			{
				$image_error='* image is not png';
				
			}
			if (is_uploaded_file($_FILES['pic']['tmp_name']))
			{
				if (!move_uploaded_file($_FILES['pic']['tmp_name'], $upfile))
				{
					$image_error='* Could not move image to destination directory';
				}else{
					if($_FILES['pic']){
						$image_name=$_FILES['pic']['name'];
					 }elseif($_POST['pic']){
						$image_name=$_POST['pic']; 
					 }else{$image_error='* No image uploaded';}
				  }
			}
			else
			{
					if($_FILES['pic']){
						$image_name=$_FILES['pic']['name'];
					 }elseif($_POST['pic']){
						$image_name=$_POST['pic']; 
					 }else{$image_error='* No image uploaded';}

				
			}
		}


	$mysqli = $db->update(array('categoryName'=>$_POST['name'],'categoryDescription'=>$_POST['desc'],'categoryPicture'=>$image_name),array('id'=>(int)$_POST['id']));
		header("Location: allCategories.php");

}else{
	echo '{"id":1}';
}




?>