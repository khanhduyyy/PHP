<?php
  include('../class/product.php');
  $p=new product;
  $a=array();
  for($i=1;$i<=4;$i++)
  {
  $a[$i]=$p->stacticalProductByCategory($i);
  }
  //var_dump($a);
  $b=array();
  for($i=1;$i<=12;$i++)
  {
    $b[$i]=$p->stacticalMoneyByMonth($i);
    if($b[$i]==null)
    {
      $b[$i]=0;
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/06272aca3f.js" crossorigin="anonymous"></script>
    <style>
        .card-img-top {
            width: 285px;
            height: 200px;
        }
        .card{
            margin-top: 20px;
        }
    </style>
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Giày nam',<?php echo $a[1]; ?>],
          ['Giày nữ',<?php echo $a[2]; ?>],
          ['Giày trẻ em',<?php echo $a[3]; ?>],
          ['Phụ kiện',<?php echo $a[4]; ?>]
        ]);

        var options = {
          title: 'Xu hướng mua hàng'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Tháng', 'Doanh số(VNĐ)'],
          ['1',  <?php echo $b[1] ?>],
          ['2', <?php echo $b[2]?>],
          ['3',  <?php echo $b[3]?>],
          ['4',  <?php echo $b[4]?>],
          ['5',  <?php echo $b[5]?>],
          ['6',  <?php echo $b[6]?>],
          ['7',  <?php echo $b[7]?>],
          ['8',  <?php echo $b[8]?>],
          ['9',  <?php echo $b[9]?>],
          ['10',  <?php echo $b[10]?>],
          ['11',  <?php echo$b[11]?>],
          ['12',  <?php echo $b[12]?>]
        ]);

        var options = {
          title: 'Doanh số mỗi tháng năm 2021',
          hAxis: {title: 'Tháng',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="admin-index.php">TRANG QUẢN TRỊ</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-tasks"></i> QUẢN LÍ
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="admin-index.php">QUẢN LÍ SẢN PHẨM</a>
                            <a class="dropdown-item" href="qldh.php">QUẢN LÍ ĐƠN HÀNG</a>
                            <a class="dropdown-item" href="qlkh.php">QUẢN LÍ KHÁCH HÀNG</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-calculator"></i> THỐNG KÊ</a>
                    </li>
                </ul>
                <!--<form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>-->
            </div>
        </nav>
        <h2 style="text-align: center; margin-top: 30px;color:rgb(51, 204, 255);">THỐNG KÊ</h2>
        <div id="piechart" style=" width: 900px; height: 500px; margin-left: 30px;"></div>
         <div id="chart_div" style="width: 100%; height: 500px;"></div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="viewsp.js"></script>
</body>

</html>