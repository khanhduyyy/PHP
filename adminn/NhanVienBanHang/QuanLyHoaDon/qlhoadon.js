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

    $("#choiseSearch").change(function(){
        var value = $("#choiseSearch").val();
        if(value == 0){
            $("#findByNameAndAdress").hide();
            $("#findByDate").hide();
            $("#findByStatus").hide();
        }
        else if(value == 1 || value == 3){
            $("#findByNameAndAdress").show();
            $("#findByDate").hide();
            $("#findByStatus").hide();
        }
        else if(value == 2){
            $("#findByNameAndAdress").hide();
            $("#findByDate").show();
            $("#findByStatus").hide();
        }
        else if(value == 4){
            $("#findByNameAndAdress").hide();
            $("#findByDate").hide();
            $("#findByStatus").show();
        }
    });

    $("#searchBtnForm").on('click',function(){
        $("#searchForm").show();
    });

    $("#cancelSearch").on('click',function(){
        $("#searchForm").hide();
        $("#findByNameAndAdress").hide();
        $("#findByDate").hide();
        $("#findByStatus").hide();
    });

    $("#searchBtn").on('click',function(){
        var value = $("#choiseSearch").val();
        if(value == 0){
            $("#errorMessage").html("Vui lòng chọn loại cần tìm");
            return;
        }
        else if(value == 1 || value == 3){
            if($("#valueSearch").val() == ""){
                $("#errorMessage").html("Vui lòng nhập nội dung tìm kiếm");
                return;
            }
        }
        else if(value == 2){
            if($("#valueSearchDate").val() == ""){
                $("#errorMessage").html("Vui lòng nhập ngày tìm kiếm");
                return;
            }
        }
        else if(value == 4){
            if($("#selectTypeFind").val() == 0){
                $("#errorMessage").html("Vui chọn tình trạng hóa đơn cần tìm kiếm");
                return;
            }
        }
        $("#searchForm").hide();
        $.ajax({
            url:"./search.php",
            type:"POST",
            datatype:"html",
            data:{
                value:value,
                content :$("#valueSearch").val(),
                contentDate:$("#valueSearchDate").val(),
                contentType:$("#selectTypeFind").val()
            },
            success:function(data){
                $("#tableContent").html(data);
            }
        });
    });
});


function viewDetail(id){
    $.ajax({
        url:"./viewDetail.php",
        type:"POST",
        datatype:"html",
        data:{
            id:id
        },
        success:function(data){
            $("#viewDetailContent").html(data);
        }
    });
    $("#viewDetailContent").show();
}

function closeViewDetail(){
    $("#viewDetailContent").hide();
}

function submitReceive(id){
    $.ajax({
        url:"./submitBill.php",
        type:"POST",
        datatype:"html",
        data:{
            id:id
        },
        success:function(data){
            if(parseInt(data) == 1){    
                location.reload();
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
            }
        }
    });

}


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