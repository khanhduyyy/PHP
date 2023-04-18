$(document).ready(function () {
    //Load table
    //$("#tablecontent").html();
    $.ajax({
        url:"../PHP/loadTable.php",
        type:"POST",
        datatype:"html",
        success:function(data){
            $("#tablecontent").html(data);
        }
    });
    //Hiện form thêm sản phẩm
    $("#addBtn").on('click', function () {
        // Khi ng dùng bấm vào btn thì sẽ kéo lên lại đầu trang
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        $("#addProduceBackground").show();
        $(".addNewProduct").hide();
        $(".addNewNumberProduct").hide();
    });
    //Ẩn form thêm sản phẩm
    $("#exitBtnAdd").on('click', function () {
        $("#addProduceBackground").hide();
        //Nếu đã thêm hàng thì load lại trang
        if(document.getElementById('errorMessage').innerText == "Cập nhật thành công"){
            location.reload();
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        }

        document.getElementById('nameProductAdd').value = "";
        document.getElementById('priceProductAdd').value = "";
        document.getElementById('materialProductAdd').value = "";
        document.getElementById('numberProductAdd').value = "";
        document.getElementById('colorProductAdd').value = "";
        document.getElementById('imageProductAdd').value = "";
        $("#errorMessage").html("");
    });

    //Bat onchange khi thay doi lua chon
    $("#selectChoise").change(function(){
        var type = parseInt($("#selectChoise").val());
        switch(type){
            case 0:{
                $(".addNewProduct").hide();
                $(".addNewNumberProduct").hide();
                break;
            }
            case 1:{
                $(".addNewProduct").show();
                $(".addNewNumberProduct").hide();
                break;
            }
            case 2:{
                $(".addNewProduct").hide();
                $(".addNewNumberProduct").show();
                break;
            }
        }
    });

    $("#addBtnAdd").on('click',function(){
        var type = $("#selectChoise").val();
        if(type == 0){
            $("#errorMessage").html("Vui lòng chọn chức năng cần dùng");
            return;
        }
        else if(type == 1){
            if ($("#nameProductAdd").val() == "") {
                //errorMessage
                $("#errorMessage").html("Lỗi : Vui lòng nhập tên sản phẩm");
                return;
            }
            if ($("#imageProductAdd").val() == "") {
                //errorMessage
                $("#errorMessage").html("Lỗi : Vui lòng chọn hình ảnh cho sản phẩm");
                return;
            }
            if ($("#materialProductAdd").val() == "") {
                //errorMessage
                $("#errorMessage").html("Lỗi : Vui lòng nhập mô tả chất liệu cho sản phẩm");
                return;
            }
            if ($("#colorProductAdd").val() == "") {
                //errorMessage
                $("#errorMessage").html("Lỗi : Vui lòng nhập màu sắc cho sản phẩm");
                return;
            }
            if ($("#priceProductAdd").val() == "") {
                //errorMessage
                $("#errorMessage").html("Lỗi : Vui lòng nhập giá cho sản phẩm");
                return;
            }
            if (isNaN($("#priceProductAdd").val())) {
                //errorMessage
                $("#errorMessage").html("Lỗi : Giá sản phẩm phải là số");
                return;
            }
            if($("#typeProductAdd").val() == 0){
                //errorMessage
                $("#errorMessage").html("Lỗi : Vui lòng chọn loại sản phẩm");
                return;
            }
            if ($("#numberProductAdd").val() == "") {
                //errorMessage
                $("#errorMessage").html("Lỗi : Vui lòng nhập số lượng cho sản phẩm");
                return;
            }
            if (isNaN($("#numberProductAdd").val())) {
                //errorMessage
                $("#errorMessage").html("Lỗi : Số lượng sản phẩm phải là số");
                return;
            }
            
            if($("#decreasePrice").val() == ""){
                //errorMessage
                $("#errorMessage").html("Lỗi : Vui lòng nhập phần trăm giảm");
                return;
            }
            if(isNaN($("#decreasePrice").val())){
                //errorMessage
                $("#errorMessage").html("Lỗi : Phần trăm giảm phải là số nguyên");
                return;
            }
            $("#errorMessage").html("");

        }else{
            if($("#typeOfProductAddNumber").val() == 0){
                $("#errorMessage").html("Vui lòng chọn sản phẩm");
                return;
            }
            if($("#numberAddProduct").val()==""){
                $("#errorMessage").html("Vui lòng nhập số lượng cần thêm");
                return;
            }
            if(isNaN($("#numberAddProduct").val())){
                $("#errorMessage").html("Số lượng phải là số nguyên");
                return;
            }
        }

        $.ajax({
            url:"../PHP/sqlUpdate.php",
            type:"POST",
            datatype:"html",
            data:{
                typeOfChoise : type,
                //Them SP
                tensp :$("#nameProductAdd").val(),
                gia :$("#priceProductAdd").val(),
                maloai :$("#typeProductAdd").val(),
                chatlieu :$("#materialProductAdd").val(),
                soluong :$("#numberProductAdd").val(),
                mau :$("#colorProductAdd").val(),
                hinhanh :$("#imageProductAdd").val(),
                giam : $("#decreasePrice").val(),

                //Updatesoluong
                id : $("#typeOfProductAddNumber").val(),
                numberAdd : $("#numberAddProduct").val()

            },
            success:function(data){
                if(parseInt(data) == 1){
                    $("#errorMessage").html("Cập nhật thành công");
                    clearForm();
                    return;
                }
                $("#errorMessage").html("Lỗi :"+data);
            }
        });
    });
    /* ============================ ĐĂNG XUẤT ======================================== */
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

    /*=============================== Sua san pham ==============================================*/
    //Hiện form sửa sản phẩm
    $('#editBtn').on('click', function () {
        // Khi ng dùng bấm vào btn thì sẽ kéo lên lại đầu trang
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        $("#editProduceBackground").show();
    });
    //Ẩn form sửa sản phẩm
    $('#exitBtnEdit').on('click', function () {
        document.getElementById('nameProductEdit').value = "";
        document.getElementById('typeProductEdit').value = 0;
        document.getElementById('materialProductEdit').innerText = "";
        document.getElementById('colorProductEdit').value = "";
        document.getElementById('priceProductEdit').value = "";
        document.getElementById('imageProductEdit').value = "";
        document.getElementById('nameIdProductEdit').value = 0;
        
        $("#editProduceBackground").hide();
        if ($("#errorMessageEdit").text() == "Sửa sản phẩm thành công") {
            location.reload();
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        }
        $("#errorMessageEdit").html("");
    });

    $("#nameIdProductEdit").change(function (){
        var id = $("#nameIdProductEdit").val();
        if (id == 0) {
            document.getElementById('nameProductEdit').value = "";
            document.getElementById('typeProductEdit').value = 0;
            document.getElementById('materialProductEdit').innerText = "";
            document.getElementById('colorProductEdit').value = "";
            document.getElementById('priceProductEdit').value = "";
            document.getElementById('imageProductEdit').value = "";
            document.getElementById('nameIdProductEdit').value = 0;
            document.getElementById('decreasePriceEdit').value = "0";
            return;
        }
        $.ajax({
            type:"POST",
            datatype:"html",
            url:"../PHP/getAllData.php",
            
            success:function(data){
                data = JSON.parse(data); 
                var index = 0;  
                for(var i = 0;i < data.length;i++){
                    if(data[i]['MaTrangSuc'] == id){
                        index = i;
                        break;
                    }
                }
                document.getElementById('nameProductEdit').value = data[index]['TenTrangSuc'];
                document.getElementById('typeProductEdit').value = parseInt(data[index]['MaLoai']);
                document.getElementById('materialProductEdit').value = data[index]['ChatLieu'];
                document.getElementById('colorProductEdit').value = data[index]['Mau'];
                document.getElementById('priceProductEdit').value = data[index]['Gia'];
                document.getElementById('decreasePriceEdit').value = data[index]['PhanTramGiam'];

            }
        });
    });

    $("#preventBtnEdit").on('click', function () {
        var id = $("#nameIdProductEdit").val();
        if(id == 0){
            alert("Bạn chưa chọn sản phẩm nào");
            return;
        }
        $.ajax({
            type:"POST",
            datatype:"html",
            url:"../PHP/getAllData.php",
            
            success:function(data){
                data = JSON.parse(data); 
                var index = 0;  
                for(var i = 0;i < data.length;i++){
                    if(data[i]['MaTrangSuc'] == id){
                        index = i;
                        break;
                    }
                }
                document.getElementById('nameProductEdit').value = data[index]['TenTrangSuc'];
                document.getElementById('typeProductEdit').value = parseInt(data[index]['MaLoai']);
                document.getElementById('materialProductEdit').value = data[index]['ChatLieu'];
                document.getElementById('colorProductEdit').value = data[index]['Mau'];
                document.getElementById('priceProductEdit').value = data[index]['Gia'];
                document.getElementById('decreasePriceEdit').value = data[index]['PhanTramGiam'];

            }
        });
    });




    /* ================================ NÚT SỬA SP =================================== */
    $("#updateBtnEdit").on('click',function (){
        if(document.getElementById('nameIdProductEdit').value == 0){
            $("#errorMessageEdit").html("Bạn chưa chọn sản phẩm nào để sửa");
            return;
        }
        $.ajax({
            type :"POST",
            url:"../PHP/editProduct.php",
            data:{
                masp :$("#nameIdProductEdit").val(),
                tensp :$("#nameProductEdit").val(),
                giasp :$("#priceProductEdit").val(),
                maloaisp :$("#typeProductEdit").val(),
                chatlieusp :$("#materialProductEdit").val(),
                mausp :$("#colorProductEdit").val(),
                hinhanhsp :$("#imageProductEdit").val(),
                phamtramgiam : $("#decreasePriceEdit").val()
            },
            datatype :"html",
            success:function (data){
                var result = parseInt(data);
                if(result == 1){
                    $("#errorMessageEdit").html("Sửa sản phẩm thành công");
                    
                }
                else{
                    $("#errorMessageEdit").html("Sửa sản phẩm không thành công");
                }
                
            }
        });
    });

    /*=================================== XÓA SẢN PHẨM ========================================*/
    $("#deleteBtn").on('click',function (){
        $("#deleteProduct").show();
        // Khi ng dùng bấm vào btn thì sẽ kéo lên lại đầu trang
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    });
    //cancelBtnAddNumber,errorMessageAddNumber
    $("#cancelBtnDelete").on('click',function (){
        $("#deleteProduct").hide();
        if ($("#errorMessageDelete").text() == "Xóa sản phẩm thành công") {
            location.reload();
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        }
        $("#errorMessageAddNumber").html("");
    });

    $("#donebtnUpdateDelete").on('click',function (){
        if($("#loaitrangsucdelete").val() == 0){
            $("#errorMessageDelete").html("Vui lòng chọn sản phẩm");
            return;
        }

        if(confirm("Bạn có muốn xóa sản phẩm này không ?") == true){
            $.ajax({
                url :"../PHP/deleteProduct.php",
                type :"POST",
                data:{
                    id:$("#loaitrangsucdelete").val()
                },
                datattype:"html",
                success:function (data){
                    if(parseInt(data) == 1){
                        $("#errorMessageDelete").html("Xóa sản phẩm thành công");
                    }
                    else{
                        $("#errorMessageDelete").html(data);
                    }
                }
            });
        }
    });

    /* ========================= TÌM KIẾM =============================== */
    $("#searchNumberBtn").on('click', function () {
        $("#searchForm").show();
        // Khi ng dùng bấm vào btn thì sẽ kéo lên lại đầu trang
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    });

    $("#cancelSearch").on('click', function () {
        $("#searchForm").hide();
        $("#typeOfProductSearch").hide();
        $("#nameProductSearch").hide();

        document.getElementById('typeOfProductSearch').value = 0;
        document.getElementById('choiseSearch').value = 0;
        document.getElementById('nameSearch').value = "";

    });
    $("#choiseSearch").change(function () {
        if ($("#choiseSearch").val() == 0) {
            $("#typeOfProductSearch").hide();
            $("#nameProductSearch").hide();
        }
        else if ($("#choiseSearch").val() == 1) {
            $("#typeOfProductSearch").show();
            $("#nameProductSearch").hide();
        }
        else if ($("#choiseSearch").val() == 2) {
            $("#typeOfProductSearch").hide();
            $("#nameProductSearch").show();
        }
    });


    $("#searchBtn").on('click', function () {
        var choise = $("#choiseSearch").val();
        if (choise == 0) {
            alert("Chưa chọn thể loại cần tìm");
            return;
        }
        if (choise == 1) {
            var type = $("#typeOfSearch").val();
            if (type == 0) {
                alert("Vui lòng chọn loại của sản ohẩm");
                return;
            }
            else{
                $.ajax({
                    url :"../PHP/getAllData.php",
                    type :"POST",
                    data:{
                        id:$("#loaitrangsucdelete").val()
                    },
                    datattype:"html",
                    success:function (data){
                        data = JSON.parse(data);
                        var htmls = '<table id="view_product" class="styled-table"><thead><tr>'+
                               ' <th style ="width : 1.5rem;">Mã Trang Sức</th>'+
                                '<th style ="width : 12rem;">Tên Trang Sức</th>'+
                                '<th style ="width : 8rem;">Loại</th>'+
                                '<th style ="width : 24rem;">Chất liệu</th>'+
                                '<th style ="width : 4rem;">Màu</th>'+
                                '<th>Giá</th>'+
                                '<th>Số lượng</th>'+
                                '<th>% Giảm Giá</th>'+
                                '<th style ="width : 8rem;">Hình Ảnh</th>'+
                            '</tr></thead>';

                        for (var i = 0;i < data.length;i++){
                            if(data[i]['TrangThai'] == 0){
                                continue;
                            }
                            if(data[i]['MaLoai'] == type){
                                var TenLoai = "";
                                var src = "..\\..\\..\\..\\img_product\\";
                                switch(parseInt(type)){
                                    case 1:{
                                        TenLoai = "Dây Chuyền";
                                        break;
                                    }
                                    case 2:{
                                        TenLoai = "Vòng Tay";
                                        break;
                                    }
                                    case 3:{
                                        TenLoai = "Nhẫn";
                                        break;
                                    }
                                    case 4:{
                                        TenLoai = "Khuyên Tai";
                                        break;
                                    }
                                }
                                htmls += '<tbody><tr>'+
                                    '<td>' + data[i]['MaTrangSuc'] + '</td>'+
                                    '<td>' + data[i]['TenTrangSuc'] + '</td>'+
                                    '<td>' + TenLoai + '</td>'+
                                    '<td>' + data[i]['ChatLieu'] + '</td>'+
                                    '<td>' + data[i]['Mau'] + '</td>'+
                                    '<td>' + data[i]['Gia'] + '</td>'+
                                    '<td>' + data[i]['SoLuong'] + '</td>'+
                                    '<td>'+data[i]['PhanTramGiam']+'</td>'+
                                    '<td><img src="'+src+data[i]['HinhAnh']+'" alt="logo" style="width : 64px"></td>'+
                                    
                                '</tr></tbody>';
                            }
                            
                        }
                        htmls+= '</table><div><button onclick="loadAllProduct();" style=";color:red;border-radius:0.5rem;margin-left:5%;font-size:1.5rem;border:2px solid black;background-color: white;width:90%;text-align:center;">Hủy tìm kiếm</button></div>';
                        $("#tablecontent").html(htmls);
                    }
                });
                
            }
        }
        //Tim kiem theo ten sp
        else{
            var content = convertStringToEnglish($("#nameSearch").val());
            $.ajax({
                url :"../PHP/getAllData.php",
                type :"POST",
                data:{
                    id:$("#loaitrangsucdelete").val()
                },
                datattype:"html",
                success:function (data){
                    data = JSON.parse(data);
                    var htmls = '<table id="view_product" class="styled-table"><thead><tr>'+
                           ' <th style ="width : 1.5rem;">Mã Trang Sức</th>'+
                            '<th style ="width : 12rem;">Tên Trang Sức</th>'+
                            '<th style ="width : 8rem;">Loại</th>'+
                            '<th style ="width : 24rem;">Chất liệu</th>'+
                            '<th style ="width : 4rem;">Màu</th>'+
                            '<th>Giá</th>'+
                            '<th>Số lượng</th>'+
                            '<th>% Giảm Giá</th>'+
                            '<th style ="width : 8rem;">Hình Ảnh</th>'+
                        '</tr></thead>';

                    for (var i = 0;i < data.length;i++){
                        if(data[i]['TrangThai'] == 0){
                            continue;
                        }
                        if(convertStringToEnglish(data[i]['TenTrangSuc']).includes(convertStringToEnglish(content))){
                            var TenLoai = "";
                            var src = "..\\..\\..\\..\\img_product\\";
                            switch(parseInt(data[i]['MaLoai'])){
                                case 1:{
                                    TenLoai = "Dây Chuyền";
                                    break;
                                }
                                case 2:{
                                    TenLoai = "Vòng Tay";
                                    break;
                                }
                                case 3:{
                                    TenLoai = "Nhẫn";
                                    break;
                                }
                                case 4:{
                                    TenLoai = "Khuyên Tai";
                                    break;
                                }
                            }
                            htmls += '<tbody><tr>'+
                                '<td>' + data[i]['MaTrangSuc'] + '</td>'+
                                '<td>' + data[i]['TenTrangSuc'] + '</td>'+
                                '<td>' + TenLoai + '</td>'+
                                '<td>' + data[i]['ChatLieu'] + '</td>'+
                                '<td>' + data[i]['Mau'] + '</td>'+
                                '<td>' + data[i]['Gia'] + '</td>'+
                                '<td>' + data[i]['SoLuong'] + '</td>'+
                                '<td>'+data[i]['PhanTramGiam']+'</td>'+
                                '<td><img src="'+src+data[i]['HinhAnh']+'" alt="logo" style="width : 64px"></td>'+
                                
                            '</tr></tbody>';
                        }
                        
                    }
                    htmls+= '</table><div><button onclick="loadAllProduct();" style=";color:red;border-radius:0.5rem;margin-left:5%;font-size:1.5rem;border:2px solid black;background-color: white;width:90%;text-align:center;">Hủy tìm kiếm</button></div>';
                    $("#tablecontent").html(htmls);
                }
            });
        }
        $("#searchForm").hide();
        $("#typeOfProductSearch").hide();
        $("#nameProductSearch").hide();

        document.getElementById('typeOfProductSearch').value = 0;
        document.getElementById('choiseSearch').value = 0;
        document.getElementById('nameSearch').value = "";
    });
});


function clearForm(){
    document.getElementById('nameProductAdd').value = "";
    document.getElementById('priceProductAdd').value = "";
    document.getElementById('materialProductAdd').value = "";
    document.getElementById('numberProductAdd').value = "";
    document.getElementById('colorProductAdd').value = "";
    document.getElementById('imageProductAdd').value = "";
    document.getElementById('typeProductAdd').value = 0;
    document.getElementById('typeOfProductAddNumber').value = 0;
    document.getElementById('numberAddProduct').value = "";
    document.getElementById('decreasePriceEdit').value = 0;
}

function loadAllProduct(){
    $.ajax({
        url:"../PHP/loadTable.php",
        type:"POST",
        datatype:"html",
        success:function(data){
            $("#tablecontent").html(data);
        }
    });
}

function convertStringToEnglish(dataString){
    var aVN = ["á","à","ả","ã","ạ","ắ","ằ","ẳ","ẵ","ặ","ă","â","ấ","ầ","ẩ","ẫ","ậ"];
    var dVN = ["đ"];
    var eVN = ["é","è","ẻ","ẽ","ẹ","ê","ế","ề","ể","ễ","ệ"];
    var iVN = ["í","ì","ỉ","ĩ","ị"];
    var oVN = ["ó","ò","ỏ","õ","ọ","ô","ố","ồ","ổ","ỗ","ộ","ơ","ớ","ờ","ở","ỡ","ợ"];
    var uVN = ["ú","ù","ủ","ũ","ụ","ư","ứ","ừ","ử","ữ","ự"];
    var yVN = ["ý","ỳ","ỷ","ỹ","ỵ"];

    dataString = dataString.toLowerCase();
    for (var i = 0;i < dataString.length;i++){
        for (var j = 0;j < aVN.length;j++){
            if(dataString[i] == aVN[j]){
                dataString = dataString.replaceAt(i,"a");
            }
        }
        for (var j = 0;j < dVN.length;j++){
            if(dataString[i] == dVN[j]){
                dataString = dataString.replaceAt(i,"d");
            }
        }
        for (var j = 0;j < eVN.length;j++){
            if(dataString[i] == eVN[j]){
                dataString = dataString.replaceAt(i,"e");
            }
        }
        for (var j = 0;j < iVN.length;j++){
            if(dataString[i] == iVN[j]){
                dataString = dataString.replaceAt(i,"i");
            }
        }
        for (var j = 0;j < oVN.length;j++){
            if(dataString[i] == oVN[j]){
                dataString = dataString.replaceAt(i,"o");
            }
        }
        for (var j = 0;j < uVN.length;j++){
            if(dataString[i] == uVN[j]){
                dataString = dataString.replaceAt(i,"i");
            }
        }
        for (var j = 0;j < yVN.length;j++){
            if(dataString[i] == yVN[j]){
                dataString = dataString.replaceAt(i,"y");
             }
        }
    }
    console.log(dataString);
    return dataString.replace(/\s/g, '');
}




String.prototype.replaceAt = function(index, replacement) {
    return this.substr(0, index) + replacement + this.substr(index + replacement.length);
}

