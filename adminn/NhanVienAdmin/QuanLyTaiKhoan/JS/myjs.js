$(document).ready(function(){
    //Load Table
    $.ajax({
        type:"POST",
        datatype:"html",
        url:"../PHP/loadTable.php",
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
            alert("Vui lòng chọn loại cần tìm");
            return;
        }
        if (content == "") {
            alert("Vui lòng nhập vào từ khóa cần tìm");
            return;
        }
        $("#searchForm").hide();
        $.ajax({
            type :"POST",
            url :"../PHP/search.php",
            datattype:"html",
            data:{
                typeS :type,
                contentS:content
            },
            success:function (data){
               $("#tableContent").html(data);
            }
        });
    });
});


function changeStatusAccount(username,status){
    $.ajax({
        type: "POST",
        datatype: "html",
        url: "../PHP/changeStatus.php",
        data: {
            user: username,
            trangthai: status
        },

        success: function (data) {
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

function loadAllAccount(){
    location.reload();
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
}
