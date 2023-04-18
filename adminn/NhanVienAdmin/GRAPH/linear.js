google.charts.load('current', { 'packages': ['line'] });
google.charts.setOnLoadCallback(drawChart);

function drawGraph(){
    google.charts.load('current', { 'packages': ['line'] });
    google.charts.setOnLoadCallback(drawChart);
}

function drawChart() {
    var data = new google.visualization.DataTable();
    var content = document.getElementById('searchValue').value;
    if(content == "") content = 2021;
    data.addColumn('number', 'Tháng');
    data.addColumn('number', 'Doanh thu');

    document.getElementById('yearInfor').innerHTML = "Thống kê doanh thu năm : " + content;
    //Get data from ajax
    $.ajax({
        type:"POST",
        url:"./GRAPH/revenueStatistical.php",
        datatype:"json",
        data:{
            year:content
        },
        success:function(billData){
            var billData = JSON.parse(billData);
            var result = new Array();

            //Tao mang tu thang 1->12 va value = 0
            for (var i = 1;i <= 12;i++){
                result.push(new Array(i,0));
            }
            if(billData.length != 0){
            for (var i = 0;i < billData.length;i++){
                var index  = billData[i][0];
                var value = billData[i][1];

                result[index][1] = value;
            }
        }
            data.addRows(result);
        }
        
    });

   
    var options = {
        chart: {
            title: 'Thống kê doanh thu theo tháng',
            subtitle: 'VNĐ'
        },
        width: 1300,
        height: 500,
        axes: {
            x: {
                0: { side: 'top' }
            }
        }
    };

    var chart = new google.charts.Line(document.getElementById('line_top_x'));

    chart.draw(data, google.charts.Line.convertOptions(options));
}



$(document).ready(function () {
    $("#searchBtn").on('click', function () {
        
        var content = document.getElementById('searchValue').value;
        if(content == ""){
            alert("Vui lòng nhập năm cần thống kê");
            return;
        }
        if(isNaN(content)){
            alert("Năm phải là số nguyên");
            return;
        }
        var content = document.getElementById('searchValue').value;
        document.getElementById('graphDiv').innerHTML = '<div id="content-graph"><div id="line_top_x"></div></div>';
        drawGraph();
    });
    
    
    $.ajax({
        type:"POST",
        url:"./GRAPH/getAllProduct.php",
        datatype:"json",
        success:function(billData){

            var data = JSON.parse(billData);
            var numDayChuyen = 0;
            var numVongTay = 0;
            var numNhan = 0;
            var numKhuyenTai = 0;
            var numSum = 0;
            console.log(data);

            for (var i = 0; i < data.length; i++) {
                //console.log(data[i]['SoLuong']);
                numSum += parseInt(data[i]['SoLuong']);
                switch (parseInt(data[i]['MaLoai'])) {
                    case 1: {
                        numDayChuyen += parseInt(data[i]['SoLuong']);
                        break;
                    }
                    case 2: {
                        numVongTay += parseInt(data[i]['SoLuong']);
                        break;
                    }
                    case 3: {
                        numNhan += parseInt(data[i]['SoLuong']);
                        break;
                    }
                    case 4: {
                        numKhuyenTai += parseInt(data[i]['SoLuong']);
                        break;
                    }
                }
            }

            document.getElementById('numberProduct').innerHTML = numSum;
            document.getElementById('numberDayChuyen').innerHTML = numDayChuyen;
            document.getElementById('numberNhan').innerHTML = numNhan;
            document.getElementById('numberKhuyenTai').innerHTML = numKhuyenTai;
            document.getElementById('numberVongTay').innerHTML = numVongTay;
        }
        
    });

    /*Get number customer*/
    $.ajax({
        type:"POST",
        url:"./GRAPH/getNumberCustomer.php",
        datatype:"json",
        
        success:function(billData){
            var data = JSON.parse(billData);
            document.getElementById('numCustomer').innerHTML = data.length;
        }
        
    });
    /*Get number account*/
    $.ajax({
        type:"POST",
        url:"./GRAPH/getAccount.php",
        datatype:"json",
        
        success:function(billData){
            var data = JSON.parse(billData);
            document.getElementById('numAccount').innerHTML = data.length;
        }
        
    });
    /*Get number bill*/
    $.ajax({
        type:"POST",
        url:"./GRAPH/getBill.php",
        datatype:"json",
        
        success:function(billData){
            var data = JSON.parse(billData);
            document.getElementById('numBill').innerHTML = data.length;
        }
        
    });

    /*Get number bought product*/
    $.ajax({
        type:"POST",
        url:"./GRAPH/boughtProduct.php",
        datatype:"json",
        
        success:function(billData){
            var data = JSON.parse(billData);
            var sum = 0;
            for (var i = 0;i < data.length;i++){
                sum += parseInt(data[i]['SoLuong']);
                //console.log();
            }
            document.getElementById('buyProduct').innerHTML = sum;
        }
        
    });
});
