$(document).ready(function(){
    //LoadTable
    $.ajax({
        url:"./loadTable.php",
        type:"POST",
        datatype:"html",
        success:function(data){
            $("#tableContent").html(data);
        }
    });

    
    $("#searchBtnForm").on('click',function(){
        $("#searchForm").show();
    });

    $("#cancelSearch").on('click',function(){
        $("#searchForm").hide();
    });

    $("#searchBtn").on('click',function(){
        var value = $("#choiseSearch").val();
        if(value == 0){
            $("#errorMessage").html("Vui lòng chọn loại cần tìm");
            return;
        }
        if($("#valueSearch").val() == ""){
            $("#errorMessage").html("Vui lòng nhập nội dung tìm kiếm");
            return;
        }
        
        $("#searchForm").hide();
        $.ajax({
            url:"./search.php",
            type:"POST",
            datatype:"html",
            data:{
                value:value,
                content :$("#valueSearch").val(),
            },
            success:function(data){
                $("#tableContent").html(data);
            }
        });
    });
});


function loadAll(){
    $.ajax({
        url:"./loadTable.php",
        type:"POST",
        datatype:"html",
        success:function(data){
            $("#tableContent").html(data);
        }
    });
}