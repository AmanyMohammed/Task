$(window).load(function() {
	   
	        $.ajax({
            type: "POST",
            url: "fillCombox.php",
            data:{},
            dataType: 'json',
            success: function (result)
            {
            	// alert('hi');
                body='<ul class="list-group">';
  
                   
					for (i = 0; i < result.length; i++) {
                      x="<div><img id='"+result[i].cat_id+"ximg' style='margin:2px; border:1px solid;' width=80px height=80px src='./images/categoryimages/"+result[i].cat_pic+"'>";
                      x+="<font size='3'><b><a id='"+result[i].cat_id+"xname' href='oneCategory.php?id="+result[i].cat_id+"'>"+result[i].cat_name+"</a></b></font></div>";
                      x+="<p  style='margin-left:90px;margin-top:-20px' id='"+result[i].cat_id+"xdesc'>"+result[i].cat_desc+"</p>"; 
                      x+="<div style='float:right; margin-top:-40px'>";
                      x+='<button id="'+result[i].cat_id+'xedit" type="button" class="btn btn-default editcat" aria-label="Left Align"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>';
                      x+='<button id="'+result[i].cat_id+'xdelete" type="button" class="btn btn-default deletecat" aria-label="Left Align"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>';
				      x+="</div>";
                    body=body+"<li class='list-group-item' id='"+result[i].cat_id+"'>"+x+"</li><br>";
					}
                    body+='</ul>';
                    $('#mycontainer').append('<br><div style="float:right; margin-top:-20px"><button id="addCategory" class="btn btn-default btn-md"><span class="glyphicon glyphicon-plus"></span></button></div><br>');

                    $('#mycontainer').append(body);
                    $('body').append('<script type="text/javascript" src="js/category.js"></script>');
                    $('body').append('<script type="text/javascript" src="js/validation2.js"></script>');

 
            },
            error: function (XMLHttpRequest, textStatus, errorThrown)
            {

                alert('Error : ');

            }
        });
});
