 function empty() {
if($('#flag').val() == '1'){
 	if (  $('#bookName').val() == "" || $('#bookAuther').val() == "" || $('#bookDescription').val() == "" 
 		|| $('#bookBody').val() == "" || $('#bookPicture').val() == ""  ){
 		$('#addBook').append("<b>Can't Be Blank");
 		return false;
 	}
}else{
	if (  $('#bookName').val() == "" || $('#bookAuther').val() == "" || $('#bookDescription').val() == "" 
 		|| $('#bookBody').val() == "" ){
 		$('#addBook').append("<b>Can't Be Blank");
 		return false;
 	}

}
   
}