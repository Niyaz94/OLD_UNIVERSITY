function validation_date(data){
	if(	/^(19|20)\d{2}-(0[1-9]|1[0-2])-(0[1-9]|1\d|2\d|3[01])$/.test(data))
		return true;
	else
		return false;
}
function validation_number(number,max,min){
	if(Number.isInteger(Number(number)) && number >= min && number<max)
			return true;
		else
			return false;	
}
function validation_text(text){
	if(/^([A-Za-z ]+|[\u0600-\u06FF ]+)$/.test(text))
		return true;
	else
		return false;
}
function validation_text_number(text){
	if(/^([A-Za-z 0-9]+|[\u0600-\u06FF 0-9]+)$/.test(text))
		return true;
	else
		return false;
}