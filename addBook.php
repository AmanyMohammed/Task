
<?php require_once('admin_bar.php');?>

<body>
<div class="col-sm-4 col-sm-offset-4">
	 <form id="addBook" action='book.php' enctype="multipart/form-data" method='POST' class="form-signin">
        
        <div class="form-group">
			<label>Book Name:</label>
			<input type="text" class="form-control" name="bookName" id="bookName">
		</div>

		<div class="form-group">
			<label>Book Auther:</label>
			<input type="text" class="form-control" name="bookAuther" id="bookAuther">
		</div>
		
		<div class="form-group">
			<label>Book Description:</label>
			<textarea class="form-control" name="bookDescription" id="bookDescription"></textarea>
		</div>

		<div class="form-group">
			<label>Book Body:</label>
			<textarea  class="form-control" rows="4" cols="50" name="bookBody" id="bookBody"></textarea>
		</div>


		<div class="form-group">
			<label>Category:</label>
		    <select  name="category" class="form-control" id="select" >
	        </select>
        </div><br>


		<div class="form-group">
			<label>Book Picture:</label>
			<input type="file" class="form-control" name="bookPicture" id="bookPicture">
		</div>
		<input type="hidden"  name="bookPicture" id="pic">
		<input type="hidden" value="1" name="flag" id="flag">
		<input type="hidden"  name="id" id="id">

        <input type="submit" value="submit" onClick="return empty()" />
      </form>
</div>     
<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
<script src="js/validation.js"></script>
<script src="js/fillCombox.js"></script>
<script src="js/book.js"></script>
</body>
</html>