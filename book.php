<?php

include_once("ORM.php");
$db = ORM::getInstance();
$db->setTable('Book');

//
if($_POST['flag']=='1'){
		$upfile = "./images/bookimages/".$_FILES['bookPicture']['name'] ;
		$image_name=$_FILES['bookPicture']['name'];
		$image_path="./images/bookimages/".$image_name;
		$image_error="";
			if ($_FILES['bookPicture']['type']!='image/png')
			{
				$image_error='* image is not png';
				
			}
			if (is_uploaded_file($_FILES['bookPicture']['tmp_name']))
			{
				if (!move_uploaded_file($_FILES['bookPicture']['tmp_name'], $upfile))
				{
					$image_error='* Could not move image to destination directory';
				}
					
			}
			
		

//
$mysqli = $db->insert(array('bookName'=>$_POST['bookName'],'bookAuther'=>$_POST['bookAuther'],'bookDescription'=>$_POST['bookDescription']
	,'bookBody'=>$_POST['bookBody'],'bookPicture'=>$image_name,'categoryId'=>$_POST['category']));

header("Location: ./index.php");
}elseif($_POST['flag']=='2'){

	//$imgname=$db->select('categoryPicture',array('product_id'=>$_POST['id']));
	$mysqli = $db->delete(array('id'=>$_POST['id']));
	// unlink('images/categoryimages/'.trim($imgname));
	echo '{"id":"add"}';

}elseif($_POST['flag']=='3'){
	$mysqli = $db->select('*',array('id'=>$_POST['id']));
	echo  json_encode(mysqli_fetch_assoc($mysqli));

}else{
	$upfile = "./images/bookimages/".$_FILES['bookPicture']['name'] ;
		$image_name=$_FILES['bookPicture']['name'];
		$image_path="./images/bookimages/".$image_name;
		$image_error="";
		if ($_FILES['bookPicture']['error'] > 0)
		{
			switch ($_FILES['bookPicture']['error'])
			{
			case 1: $image_error='* Image exceeded upload_max_filesize';
			break;
			case 2: $image_error='* Image exceeded max_file_size';
			break;
			case 3: $image_error='* Image only partially uploaded';
			break;
			case 4:
			if($_POST['bookPicture']!=""){
			$image_name=$_POST['bookPicture']; 
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
			if ($_FILES['bookPicture']['type']!='image/png')
			{
				$image_error='* image is not png';
				
			}
			if (is_uploaded_file($_FILES['bookPicture']['tmp_name']))
			{
				if (!move_uploaded_file($_FILES['bookPicture']['tmp_name'], $upfile))
				{
					$image_error='* Could not move image to destination directory';
				}else{
					if($_FILES['bookPicture']){
						$image_name=$_FILES['bookPicture']['name'];
					 }elseif($_POST['bookPicture']){
						$image_name=$_POST['bookPicture']; 
					 }else{$image_error='* No image uploaded';}
				  }
			}
			else
			{
					if($_FILES['bookPicture']){
						$image_name=$_FILES['bookPicture']['name'];
					 }elseif($_POST['bookPicture']){
						$image_name=$_POST['bookPicture']; 
					 }else{$image_error='* No image uploaded';}

				
			}
		}


	$mysqli = $db->update(array('bookName'=>$_POST['bookName'],'bookAuther'=>$_POST['bookAuther'],'bookDescription'=>$_POST['bookDescription']
	,'bookBody'=>$_POST['bookBody'],'bookPicture'=>$image_name,'categoryId'=>$_POST['category']),array('id'=>(int)$_POST['id']));
	header("Location: oneBook.php?id=".(int)$_POST['id']);


}

?>