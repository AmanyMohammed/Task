$(window).load(function() {

  url = window.location.href.split('?');
  if(url.length>1){
     id=url[1].split('=');
     // alert(id[1]);
          $.ajax({
            type: "POST",
            url: "book.php",
            data:{flag :'3' ,id:id[1]},
            dataType: 'json',
            success: function (result)
            {
              // console.log(result.categoryId);
              $('#bookName').val(result.bookName);
              $('#bookAuther').val(result.bookAuther) ;
              $('#bookDescription').val(result.bookDescription);
              $('#bookBody').val(result.bookBody);
              $('#select').val(result.categoryId);
              $('#pic').val(result.bookPicture);
              $('#flag').val('4');
              $('#id').val(result.id);
           

            },
            error: function (XMLHttpRequest, textStatus, errorThrown)
            {

                alert('Error : ');

            }
        });

    }
});

$('.deletebook').click(function () {
          id = $(this).attr('id');
          btn = id.split('x')[0];
          //alert(btn);

            $.ajax({
            type: "POST",
            url: "book.php",
            data:{id: btn,flag:"2"},
            dataType: 'json',
            success: function (result)
            {
                //alert('Done');
                $('#' + btn).remove();
            },
            error: function (XMLHttpRequest, textStatus, errorThrown)
            {

                alert('Error : ');

            }
        });
});