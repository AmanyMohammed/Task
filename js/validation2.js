 function empty() {
 	if($('#flag').val() == '1'){

 	if (  $('#name').val() == "" || $('#desc').val() == "" || $('#pic').val() == "" ){
 		$('#addcategory').append("<b>Can't Be Blank");
 		return false;
 	}
 }else{
 	if (  $('#name').val() == "" || $('#desc').val() == "" ){
 		$('#addcategory').append("<b>Can't Be Blank");
 		return false;
 	}

 }

   
}