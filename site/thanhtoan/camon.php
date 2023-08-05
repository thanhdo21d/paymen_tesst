<?php
function currency_format($number) {
     if (!empty($number)) {
         return number_format($number, 0, ',', '.') . " VNĐ";
     }
     if($number==0)return "0 VNĐ";
 }
if(isset($_POST['submit'])){
     $phone=$_POST['phone'];
     $location=$_POST['location'];
     $name=$_POST['name'];
     $email=$_POST['email'];
     $money=$_GET['tong'];
     // if(isset($phone) &&isset($location)&&isset($email)&&isset($name)){
          $subject="Payment%20Success";
          // $Mem=mysqli_fetch_array(mysqli_query($db_con,"SELECT * FROM user WHERE email=$email"));
          $Sp='';
          foreach($_SESSION['cart'] as $n){
               $Sp=$Sp.$n[1];
          }
          $message=urlencode('
          <div style="margin-left:30px;width:350px;padding:40px;border:1px #ccc solid;border-radius:10px;color:#000;background-image: linear-gradient(-45deg, #cfcfcf, transparent);">
          <h1 style="font-weight:400;text-align:center">Xác nhận đã thanh toán</h1>
                                  <div>🔵 <b style="padding-left:5px;color:#888a8d;margin-top:">Người nhận : </b><b style="color:#478fcc;font-weight: 500;margin-top:-30px;margin-left:30px">'.$name.'</b>
                                  <div>🔵 <b style="padding-left:5px;color:#888a8d;margin-top:">Địa chỉ nhận hàng : </b><b style="color:#478fcc;font-weight: 500;margin-top:-30px;margin-left:30px">'.$location.'</b>
                                  <div>🔵 <b style="padding-left:5px;color:#888a8d;margin-top:">Sản phẩm : </b><b style="color:#959595;font-weight: 500;margin-top:-30px;margin-left:30px">'.$Sp.'</b>
      
      
                          <div style="border-bottom: 1px #ccc dashed;width:250px;height:10px;margin:10px 0px"></div>
                          <div style="margin: 20px 0px;">
                                 
                                  <div>Price : <b style="color:#009688;font-weight: bold;">'. currency_format($money).'</b></div>
                          </div>
      </div>
      ');
          echo '
          
          ';
     // }

    
}
?>
<style>
     #main{
          display:grid;
          grid-template-columns: 1fr;
     }
     .form_wrapper{
          margin: 10px;
          width:50%;
          border: 1px #000 solid;
     }
     .form_wrapper>input{
          width:100%;
          border:none;
          object-fit: cover;
     }
</style>
<?php if(isset($_POST['submit'])){?>
     <script>
     var xhttp = new XMLHttpRequest();
    xhttp.open("GET","https://ketquaday99.com/api/AutoSendEmail.php?email=<?=$email?>&message=<?=$message?>&subject=<?=$subject?>",true);
    xhttp.send();
     alert("Thành công");
          window.location.href="http://localhost/duan1/site/index.php?act=detail_order";
          </script>
<?php }?>
<div id="main">
	<center>
		<form action="" method="post">
			<div class="form_wrapper">
				<input type="text" name="location" id=""  placeholder="Địa chỉ nhận hàng">
			</div>
			<div class="form_wrapper">
				<input type="tel" name="phone" id=""  placeholder="Số điện thoại">
			</div>
			<div class="form_wrapper">
				<input type="text" name="name" id=""  placeholder="Tên người nhận">
			</div>
               <div class="form_wrapper">
				<input type="email" name="email" id=""  placeholder="Xác nhận email đăng kí">
			</div>
               <button type="submit" name="submit" style="">Xác nhận thanh toán</button>
			
		</form>
	</center>
</div>