$(window).load(function() {
	   
	        $.ajax({
            type: "POST",
            url: "fillCombox.php",
            data:{},
            dataType: 'json',
            success: function (result)
            {
            	// alert(result);
                    data = result;
					for (i = 0; i < data.length; i++) {
				     $('#select').append($('<option>', { value: data[i].cat_id,text : data[i].cat_name}));
					}

            },
            error: function (XMLHttpRequest, textStatus, errorThrown)
            {

                alert('Error : ');

            }
        });
});
