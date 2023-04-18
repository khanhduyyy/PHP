$(document).ready(function(){
    $("#logout").on('click',function(){
        $.ajax({
            type:"POST",
            datatype:"html",
            url:"./destroySession.php",
            
            success:function(data){    
                if(parseInt(data) == 1){
                    window.location.href ="../Login/HTML/index.php";
                }
            }
        });
    });
});