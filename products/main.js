$(document).ready(function()
{
    $('minus-btn').prop('disabled', true);
    $('#plus-btn').click(function(){
    	$('#qty_input').val(parseInt($('#qty_input').val()) + 1 );
    	    });
        $('#minus-btn').click(function()
        {
    	    $('#qty_input').val(parseInt($('#qty_input').val()) - 1 );
    	    if ($('#qty_input').val() == 0) {
			$('#qty_input').val(1);
		}

     });
 });
 // click vào size

function changeColor(data)
{
	$value = data.value;
	$xhtml = "";
	for($i =38;$i <= 45;$i++){
		if($i == $value){
			$xhtml+="<input type=button class=none value='"+$i+"' style='background-color: black; color:white;' onclick='changeColor(this)'>";	
		}else{
			$xhtml+="<input type=button class=none value='"+$i+"' onclick='changeColor(this)'>";
		}
	}
	$("#buttonContainer").html($xhtml);
}
