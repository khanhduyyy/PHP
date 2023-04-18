<?php
    include '../../Database/Connection.php';

    $user = $_POST['username'];
    $pass = $_POST['password'];
    $data = getData(getResultSQL("select * from `nhanvien`"));
    $MaQuyen  = -1;
    foreach($data as $value){
        if($value['TenDangNhap'] == $user ){
            if($value['MatKhau'] == $pass && $value['TrangThai'] == 1){
                //Dang nhap thanh cong tra ve quyen nv
                session_start();
                $_SESSION['MaNhanVien'] = $value['MaNhanVien'];
                $MaQuyen = $value['MaQuyen'];
                break;
            }
            else if($value['MatKhau'] == $pass && $value['TrangThai'] == 0){
                //Bi block
                $MaQuyen = -2;
            }
            else{
                //Sai mat khau
                $MaQuyen = 0;
                break;
            }
        }
        
        else{
            //Tai khoan khong ton tai
            $MaQuyen = -1;
        }
    }

    echo $MaQuyen;
    
?>