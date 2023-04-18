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

