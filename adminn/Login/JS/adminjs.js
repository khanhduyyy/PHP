$(document).ready(function(){
    $("#loginBtn").on('click',function(){
        //errorMessage
        var user =  $("#username").val();
        var pass = $("#password").val();

        if(user == ""){
           $("#errorMessage").html("Vui lòng nhập Username");
            return;
        }
        if(pass == ""){
            $("#errorMessage").html("Vui lòng nhập Password");
            return;
        }

        $.ajax({
            type:"POST",
            datatype:"html",
            url:"../PHP/myphp.php",
            data:{
                username : $("#username").val(),
                password : $("#password").val(),
            },
            success:function(data){
                var value = parseInt(data);
                switch(value){
                    case -1:{
                        $("#errorMessage").html("Tài khoản không tồn tại");
                        break;
                    }
                    case 0:{
                        $("#errorMessage").html("Sai mật khẩu");
                        break;
                    }
                    case -2:{
                        $("#errorMessage").html("Tài khoản đã bị khóa .Vui lòng liên hệ với Admin");
                        break;
                    }
                    case 1:{
                        window.location.href ="../../NhanVienAdmin/index.php";
                        break;
                    }
                    case 2:{
                        window.location.href ="../../NhanVienBanHang/QuanLySanPham/HTML";
                        break;
                    }
                }
                
            }
        });
    
        
    });

    //Khi nhan vao muc user hoac pass thi se xoa thong bao loi
    $("#username").on('click',function(){
        $("#errorMessage").html("");
        return;
    });
    $("#password").on('click',function(){
        $("#errorMessage").html("");
        return;
    });

    
});