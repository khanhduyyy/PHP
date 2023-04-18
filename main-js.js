mybutton = document.getElementById("myBtn");
//Khi load lai trang thi se khong hieen form submit
if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
}

// Khi ng dùng kéo xuống cách đầu trang 20px thì sẽ hiện button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// Khi ng dùng bấm vào btn thì sẽ kéo lên lại đầu trang
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

function shoppingcart() {
  document.getElementById("shopping-cart").style.display = "block";
}
function closeshoppingcart() {
  document.getElementById("shopping-cart").style.display = "none";
}

function addToCart(id){
  $.ajax({
    url:"./addToCart.php",
    type:"POST",
    datatype:"html",
    data:{
      idP:id
    },
    success:function(data){
      if(parseInt(data) == -1){
        alert('Sản phẩm đã hết.Vui lòng chọn loại khác');
        return;
      }
      document.getElementById('counter').innerHTML = data;
      alert("Đã thêm vào giỏ hàng");
    }
  });
}


function addToCartSub(id){
  $.ajax({
    url:"../addToCart.php",
    type:"POST",
    datatype:"html",
    data:{
      idP:id
    },
    success:function(data){
      if(parseInt(data) == -1){
        alert('Sản phẩm đã hết.Vui lòng chọn loại khác');
        return;
      }
      document.getElementById('counter').innerHTML = data;
      alert("Đã thêm vào giỏ hàng");
    }
  });
}

function regiterCustomerAccount(){
  var hoten = document.getElementById('nameCus').value;
  var tendangnhap = document.getElementById('userCus').value;
  var matkhau = document.getElementById('passCus').value;
  var xacnhanmatkhau = document.getElementById('rePassCus').value;
  var sdt = document.getElementById('phoneCus').value;
  var diachi = document.getElementById('addressCus').value;


  if(JSON.stringify(matkhau) != JSON.stringify(xacnhanmatkhau)){
    alert("Mật khẩu và xác nhận mật khẩu không hợp lệ");
    return;
  }



  //alert(hoten + "\n" + tendangnhap + "\n" + matkhau+ "\n"+xacnhanmatkhau+ "\n" + sdt+ "\n" + diachi);
  $.ajax({
    url:"../addUserAccount.php",
    type:"POST",
    datatype:"html",
    data:{
      hotenKH:hoten,
      tendangnhapKH:tendangnhap,
      matkhauKH:matkhau,
      sdtKH:sdt,
      diachiKH:diachi
    },
    success:function(data){
      if(parseInt(data) == 1){
        alert("Đăng ký thành công");
        window.location.href ="./login.php";
        return;
      }
      alert(data);
    }
  });
}

function loginAccount(){
  var user = document.getElementById('userLogin').value;
  var pass = document.getElementById('passLogin').value;

  if(user == "" || pass == ""){
    alert("Tên đăng nhập và mật khẩu không được để trống");
    return;
  }

  $.ajax({
    url:"../loginAccount.php",
    type:"POST",
    datatype:"html",
    data:{
      user:user,
      pass:pass
    },
    success:function(data){
      if(parseInt(data) == -1){
        alert('Tài khoản này đang bị khóa.Vui lòng liên hệ bộ phận CSKH : 0843739379 để đc giải đáp');
        window.location.href ="./login.php";
        return;
      }
      if(parseInt(data) == 0){
        alert('Đang có tài khoản đăng vào hệ thống.Vui lòng đăng xuất để đăng nhập tài khoảng khác');
        window.location.href ="../index.php";
        return;
      }
      if(parseInt(data) == 1){
        window.location.href ="../index.php";
        return;
      }
      alert(data);
    }
  });
}

function changePassword(){
  var oldPass = document.getElementById('oldPass').value;
  var newPass = document.getElementById('newPass').value;
  var newPassConfirm = document.getElementById('newPassReType').value;
  
  if(oldPass == ""){
    alert("Vui lòng nhập mật khẩu cũ");
    return;
  }
  if(newPass == ""){
    alert("Vui lòng nhập mật khẩu mới");
    return;
  }
  if(newPassConfirm == ""){
    alert("Vui lòng nhập xác nhận mật khẩu");
    return;
  }
  if(newPassConfirm != newPass){
    alert("Mật khẩu mới và xác nhận mật khẩu không khớp");
    return;
  }
  $.ajax({
    url:"../changePasswordPHP.php",
    type:"POST",
    datatype:"html",
    data:{
      oldpass:oldPass,
      newpass:newPass
    },
    success:function(data){
      if(parseInt(data) == 1){
        alert("Thay đổi mật khẩu thành công.Vui lòng đăng nhập lại");
        window.location.href ="../user-php/login.php";
        return;
      }
      alert(data);
    }
  });
}

function checkNumberProductInCast(id,price,decrease){
  //Nếu thay đổi và Số lượng <= 0
    //Hỏi người dùng xem có xóa SP hay ?
    //Có : Xóa SP và cộng số lượng Sản phẩm trong session vào DB
  //Kiểm tra độ lệch giữa SL cũ và SL mới
    //Nếu delta < 0 thì cộng thêm |delta| vào DB
    //Nếu delta > 0 thí trừ |delta| vào DB

    var numberProduct = document.getElementById('numberProductCast_' + String(id)).value;
    
    $.ajax({
      url: "../onchangeProductCart.php",
      type: "POST",
      datatype: "json",
      data: {
        id: id,
        number:numberProduct
      },
      success: function (data) {
        data = JSON.parse(data);
        if(data[0] == 0){
          if(confirm("Bạn có muốn xóa sản phẩm này không ?")){
             deleteProductInCast(id,1);
             $.ajax({
              url:"../computeSumOfPrice.php",
              type:"POST",
              datatype:"json",
              success:function(data){
                data = JSON.parse(data);
                for(var i = 0;i < data.length;i++){
                  console.log(data[i]);
                }
                if(data[0] == 0){
                  document.getElementById('sumPriceOfCast').innerHTML = 0 + ' <sup>đ</sup>';
                  document.getElementById('codeDiscount').value  = "";
                  document.getElementById('codeDiscount').disabled  = false;
                  document.getElementById('checkCodeBtn').disabled = false;
                  document.getElementById('shopping-content-php').innerHTML = '<h1 style="width:100%;text-align:center;">Chưa có sản phẩm nào trong giỏ hàng<h1><img  style="width:128px;margin-left:45%;" src="https://img.icons8.com/ios/452/sad.png" alt="" srcset="">';
                }
                else if(data[0] == 1){
                  document.getElementById('sumPriceOfCast').innerHTML = convertToMoneyFormat(data[1]) + ' <sup>đ</sup>';
                }
              }
            });
          }
          else{
            document.getElementById('priceProductCast_' + String(id)).innerHTML = convertToMoneyFormat(data[1]*price*(1-decrease/100.0)) + ' <sup>đ</sup>';
            document.getElementById('numberProductCast_' + String(id)).value = data[1];
          }
         
        }
        else if(data[0] == 1){
          alert("Số lượng sản phẩm vượt quá số lượng trong kho. Số lượng tối đa " + parseInt(parseInt(data[1]) + parseInt(data[2])));
          //Gan lai so luong cu
          document.getElementById('numberProductCast_' + String(id)).value = data[2];
        }
        else if(data[0] == 2){
          //Thay doi Gia cho chi tiet
          document.getElementById('priceProductCast_' + String(id)).innerHTML = convertToMoneyFormat(numberProduct*price*(1-decrease/100.0)) + ' <sup>đ</sup>';
          //Thay doi Tongtien
          $.ajax({
            url:"../computeSumOfPrice.php",
            type:"POST",
            datatype:"json",
            success:function(data){
              data = JSON.parse(data);
              if(data[0] == 0){
                document.getElementById('sumPriceOfCast').innerHTML = 0 + ' <sup>đ</sup>';
                document.getElementById('codeDiscount').value  = "";
                document.getElementById('codeDiscount').disabled  = false;
                document.getElementById('checkCodeBtn').disabled = false;
              }
              else if(data[0] == 1){
                //Không có mã giảm giá
                if(data[2] == 0){
                  document.getElementById('sumPriceOfCast').innerHTML = convertToMoneyFormat(data[1]) + ' <sup>đ</sup>';
                  document.getElementById('codeDiscount').value  = "";
                  document.getElementById('codeDiscount').disabled  = false;
                  document.getElementById('checkCodeBtn').disabled = false;
                  console.log("Ko giam gia");
                }
                else{
                  document.getElementById('sumPriceOfCast').innerHTML = convertToMoneyFormat(data[1]) + ' <sup>đ</sup>(Đã áp dụng mã giảm giá)';
                  document.getElementById('codeDiscount').value  = data[2];
                  document.getElementById('codeDiscount').disabled  = true;
                  document.getElementById('checkCodeBtn').disabled = true;
                  console.log("Giam gia");
                }
                //document.getElementById('sumPriceOfCast').innerHTML = convertToMoneyFormat(data[1]) + ' <sup>đ</sup>';
              }
            }
          });
        }
        else{
          alert(data);
        }
      }
    });
    
}

   




function deleteProductInCast(id,check){
  if(check == 0){
    if(confirm("Bạn có muốn xóa sản phẩm này ?") == false) return;
  }

  $.ajax({
    url:"../deleteProductInSession.php",
    type:"POST",
    datatype:"html",
    data:{
      id:id
    },
    success:function(data){
      $("#shopping-content-php").html(data);
      $.ajax({
        url:"../computeSumOfPrice.php",
        type:"POST",
        datatype:"json",
        success:function(data){
          data = JSON.parse(data);
          if(data[0] == 0){
            document.getElementById('sumPriceOfCast').innerHTML = 0 + ' <sup>đ</sup>';
            document.getElementById('codeDiscount').value  = "";
            document.getElementById('codeDiscount').disabled  = false;
            document.getElementById('checkCodeBtn').disabled = false;
            document.getElementById('shopping-content-php').innerHTML = '<h1 style="width:100%;text-align:center;">Chưa có sản phẩm nào trong giỏ hàng<h1><img  style="width:128px;margin-left:45%;" src="https://img.icons8.com/ios/452/sad.png" alt="" srcset="">';
          }
          else if(data[0] == 1){
            //Không có mã giảm giá
            if(data[2] == 0){
              document.getElementById('sumPriceOfCast').innerHTML = convertToMoneyFormat(data[1]) + ' <sup>đ</sup>';
              document.getElementById('codeDiscount').value  = "";
              document.getElementById('codeDiscount').disabled  = false;
              document.getElementById('checkCodeBtn').disabled = false;
              console.log("Ko giam gia");
            }
            else{
              document.getElementById('sumPriceOfCast').innerHTML = convertToMoneyFormat(data[1]) + ' <sup>đ</sup>(Đã áp dụng mã giảm giá)';
              document.getElementById('codeDiscount').value  = data[2];
              document.getElementById('codeDiscount').disabled  = true;
              document.getElementById('checkCodeBtn').disabled = true;
              console.log("Giam gia");
            }
          }
        }
      });
    }
  });
}



function convertToMoneyFormat(money) {
  money = String(money);
  var i = String(money).length-1;
  var result = "";
  while(i >= 0){
    while(i-3 >= 0){
      result = '.' + money.substring(i-2,i+1) + result;
      i-=3;
    }
    if(i >= 0){
      result = money.substring(0,i+1) + result;
      break;
    }
  }
  return result;
}


function checkCodeDiscount(){
  var code = document.getElementById('codeDiscount').value;
  $.ajax({
    url:"../checkCodeDiscount.php",
    type:"POST",
    datatype:"json",
    data:{
      code : code
    },
    success:function(codeDecrease){
      codeDecrease = JSON.parse(codeDecrease);
      if(codeDecrease[0] == 0){
        alert("Mã giảm giá không hợp lệ hoặc hết số lượng");
      }
      else{
        //Thay doi tong tien
        var sum = convertStringFomatToMoney(document.getElementById('sumPriceOfCast').innerText);
        document.getElementById('sumPriceOfCast').innerHTML = convertToMoneyFormat(sum*(1-codeDecrease[1]/100.0)) + "<sup>đ</sup>(Đã áp dụng giảm giá)";
        document.getElementById('codeDiscount').disabled  = true;
        document.getElementById('checkCodeBtn').disabled = true;
      }
    }
  });
}


 function payCart(){
  $.ajax({
    url:"../payBill.php",
    type:"POST",
    datatype:"html",
    success:function(data){
      //Chưa đăng nhập
      if(parseInt(data) == 0){
        alert("Bạn chưa đăng nhập .Vui lòng đăng nhập để xác nhận Hóa Đơn !!!");
        window.location.href ="./login.php";
        return;
      }
      else if(parseInt(data) == 1){
        alert("Xác nhận hóa đơn thành công.Vui lòng vào lịch sử mua hàng để cập nhật tình trạng");
        window.location.href ="../index.php";
        return;
      }
      alert(data);
    }
  });
 }

  function viewDetail(id) {
    $.ajax({
      url:"../viewDetailBill.php",
      type:"POST",
      datatype:"html",
      data:{
        id:id
      },
      success:function(data){
        $("#viewDetail").html(data);
      }
    });
  }

function closeViewDetail(){
  $("#formDetailBill").hide();
}

//1.235.000đ

//1235000

function convertStringFomatToMoney(input){
  
  input = input.substring(0,input.length);
  var i = input.length - 1;
  while(i >= 0){
    while(i >= 0 && Number.isInteger(parseInt(input[i]))){
        i--;
    }
    input = input.substring(0,i) + input.substring(i+1,input.length);
    console.log(input);
    i--;
  }

  return parseInt(input);
}

function searchContent(type){
  var input = document.getElementById('inputSearch').value;
  console.log(input);
  //searchContent.php
  $.ajax({
    url:"../searchContent.php",
    type:"POST",
    datatype:"html",
    data:{
      type:type,
      content:input
    },
    success:function(data){
      $("#allProductContent").html(data);
    }
  });
}

function submitReceive(id){
  $.ajax({
    url:"../submitBill.php",
    type:"POST",
    datatype:"html",
    data:{
      id:id
    },
    success:function(data){
      if(parseInt(data) == 1){
        alert("Cập nhật thành công.Cảm ơn quý khách đã mua sản phẩm tại cửa hàng");
        location.reload();
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        return;
      }
      alert(data);
    }
  });
  
}