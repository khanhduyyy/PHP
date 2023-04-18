$(document).ready(function(){
    //LoadTable
    $.ajax({
        url:"../PHP/loadTable.php",
        type:"POST",
        datatype:"html",
        success:function(data){
            $("#tableContent").html(data);
        }
    });

    $("#logout").on('click',function(){
        $.ajax({
            type:"POST",
            datatype:"html",
            url:"../../destroySession.php",
            
            success:function(data){    
                if(parseInt(data) == 1){
                    window.location.href ="../../../Login/HTML/index.php";
                }
            }
        });
    });

    $("#searchBtnForm").on('click', function () {
        $("#searchForm").show();
        // Khi ng dùng bấm vào btn thì sẽ kéo lên lại đầu trang
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    });
    $("#cancelSearch").on('click', function () {
        $("#searchForm").hide();
    });

    $("#searchBtn").on('click', function () {
        var type = $("#choiseSearch").val();
        var content = $("#valueSearch").val();
        if (type == 0) {
            $("#errorMessage").html("Chọn loại dữ liệu cần tìm");
            return;
        }
        if (content == "") {
            $("#errorMessage").html("Vui lòng nhập vào từ khóa cần tìm");
            return;
        }
        $("#searchForm").hide();
        $("#errorMessage").html("");

        $.ajax({
            url:"../PHP/search.php",
            datatype:"html",
            type:"POST",
            data:{
                typeS : $("#choiseSearch").val(),
                content :$("#valueSearch").val()
            },
            success:function(data){
                $("#tableContent").html(data);
            }
        });
        
    });
});

function changeStatusStaff(idStaff,sta){
    $.ajax({
        type:"POST",
        datatype:"html",
        url:"../PHP/changeStatus.php",
        data:{
            id:idStaff,
            status : sta
        },
        success:function(data){
            if (parseInt(data) == 1) {
                location.reload();
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
            }
            else {
                alert(data);
            }
        }
    });
}

function loadAllStaff(){
    location.reload();
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
}