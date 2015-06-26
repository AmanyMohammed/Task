<?php require_once('admin_bar.php');?>

<body>
<div id='mycontainer' class="panel panel-default panel-body col-sm-8 col-sm-offset-2" >
</div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Category</h4>
                </div>
                <div class="modal-body">
                <form method="POST" action="category.php" enctype="multipart/form-data"  id="addcategory">
                    <div class="form-group">
                        <label for="complain">Category Name:</label>
                        <input type="textarea" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="complain">Category Description:</label>
                        <input type="textarea" class="form-control" id="desc" name="desc">
                    </div>
                    <input type="hidden" value="1" id='flag' name="flag">
                    <div class="form-group">
                        <label for="complain">Category Picture:</label>
                        <input type="file" class="form-control" id="pic" name="pic">
                        <input type="hidden" class="form-control" id='pic2' name="pic">
                        <input type="hidden" class="form-control" id='id' name="id">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id='save' onClick="return empty()">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>

<script type="text/javascript" src="js/intro.js"></script>

<script type="text/javascript" src="js/validation2.js"></script>
</body>
</html>
