$('#addCategory').click(function () {

          $('#myModal').modal('show');
});

$('.editcat').click(function () {
          id = $(this).attr('id');
          btn = id.split('x')[0];
          // alert(btn);
          name=$("#"+btn+"xname").html();
          // alert(name);
          desc=$("#"+btn+"xdesc").html();
          // alert(desc);
          img=$("#"+btn+"ximg").attr('src');
          // alert(img);
          x = img.split('/');
          imgName=x[x.length-1];
          // alert(img);
          $('#name').val(name);
          $('#desc').val(desc);
          $('#flag').val("3");
          $('#pic2').val(imgName);
          $('#pic').html(imgName);
          $('#id').val(btn);
          $('#myModal').modal('show');

});

$('.deletecat').click(function () {
          id = $(this).attr('id');
          btn = id.split('x')[0];
         // alert(btn);

            $.ajax({
            type: "POST",
            url: "category.php",
            data:{id: btn,flag:"2"},
            dataType: 'json',
            success: function (result)
            {
               // alert('Done');
                $('#' + btn).remove();
            },
            error: function (XMLHttpRequest, textStatus, errorThrown)
            {

                alert('Error : ');

            }
        });
});