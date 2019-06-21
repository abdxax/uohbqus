<?php
session_start();
require "../connect/user_Opret.php";

$user=new User();
$user->checkPerm ($_SESSION['user'],$_SESSION['pass'],$_SESSION['role']);
$data='';
$count=0;
$msg='';

//echo $id_stus;
if (isset($_POST['serc'])) {
	$txts=strip_tags($_POST['inp']);
	$option=strip_tags($_POST['serchty']);
    $data=$user->getDataPep($option,$txts);
    $count= $data->rowCount();
    
}

if (isset($_POST['upda'])) {
	# code...
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$id=$_POST['ids'];


}

if (isset($_POST['SAV'])) {
	# code...
	$name=strip_tags($_POST['name']);
	$id_gov=strip_tags($_POST['id_gov']);
	$id_uohb=strip_tags($_POST['uohb_id']);
	$phone=strip_tags($_POST['phone']);
	if($user->addNewpeop($name,$phone,$id_uohb,$id_gov)){

	}

}

if (isset($_POST['ordersave'])) {
	$title=$_POST['title'];
	$des=$_POST['prob'];
	$is_att=$_POST['atts'];
	$depa=$_POST['depa'];
	$user_order="xxx";
	$vals='';
	if ($is_att=='has att') {
		# code...
		$vals='يوجد مرفاقات ';
	}
	else{
		$vals='لا يوجد مرفاقات ';
	}
	if($user->saveOrder($_SESSION['id_item'],$depa,$title,$des,'new',$user_order,$vals)){
		$msg='<div class="lert alert-success text-center">تم رفع الاستفسار </div>';
	}
	else{
		echo "s";
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
	<title></title>
</head>
<body dir="rtl">
<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#"><?php echo" مرحبا ".$user->getName($_SESSION['user'])."" ?></a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#"></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
     <a href="logout.php" class="btn btn-info">تسجيل خروج</a>
    </form>
  </div>
</nav>
</header>
<section>
	<div class="container">
		<div class="row">
      <div class="col-12">
        <?php echo $msg;?>
      </div>
			<div class="col-12">
				<div class="col-6  offset-md-4 form1" >
					<form class="form-inline" method="POST">
						<div class="form-group">
							<div class="col-sm-3">
								<select class="form-control" name="serchty">
								<!--<option value="1">الاسم</option>-->
								<option value="2">الرقم الجامعي </option>
								<option value="3">السجل المدني </option>
							</select>
							</div>

						</div>

						<div class="form-group">
							<div class="col-4">
								<input type="text" name="inp" class="form-control" placeholder="">
							</div>

						</div>

						<div class="form-group">
							<div class="col-4">
								<input type="submit" name="serc" class="btn btn-info" value="بحث">
							</select>
							</div>

						</div>


					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class=" row">
					<div class="col-12">
				<?php
                   if($count==0){
                     echo '
                     <div class="col-12 offset-md-1">
                      			<form class="form-inline" method="POST">
						<div class="form-group">
							<div class="col-3">
								<input type="text" name="name" class="form-control" placeholder="name">
							</div>
							

						</div>

						<div class="form-group">
							<div class="col-2">
								<input type="text" name="uohb_id" class="form-control">
							</div>

						</div>
						<div class="form-group">
							<div class="col-2">
								<input type="text" name="id_gov" class="form-control">
							</div>

						</div>
						<div class="form-group">
							<div class="col-2">
								<input type="text" name="phone" class="form-control">
							</div>

						</div>

						<div class="form-group">
							<div class="col-2">
								<input type="submit" name="SAV" class="btn btn-info" value="حفظ">
							</select>
							</div>

						</div>


					</form>
                     </div>


                     ';
                   }
                   else if($count==1){
                   	$names='';
                   	$phone='';
                   	$id_stu="";
                   	$id_gov='';
                   	$id='';
                   	foreach ($data as $key ) {
                   		# code...
                   		$name=$key['name'];
                   		$phone=$key['phone'];
                   		$id_atu=$key['id_uohb'];
                   		$id_gov=$key['id_gov'];
                   		$id=$key['id_stu'];
                   		$_SESSION['id_item']=$key['id_stu'];
                   	}
                   	 echo '
                     <div class="col-12 offset-md-3">
                      			<form class="form-inline" method="POST">
						<div class="form-group">
							<div class="col-3">
								<input type="text" name="name" class="form-control" value='.$name.'>
							</div>
							

						</div>

						<div class="form-group">
							<div class="col-2">
								<input type="text" name="phone" class="form-control" value='.$phone.'>
							</div>

						</div>
						<div class="form-group">
							<div class="col-2">
								<input type="text" name="uohb" class="form-control" value='.$id_stu.'>
							</div>

						</div>
						<div class="form-group">
							<div class="col-2">
								<input type="hidden" name="ids" class="form-control" value='.$id.'>
							</div>

						</div>

						<div class="form-group">
							<div class="col-2">
								<input type="submit" name="upda" class="btn btn-info" value="تحديث ">
							</select>
							</div>

						</div>


					</form>
                     </div>
                     <div class="col-12">
                     <div class="col-3 offset-md-6">
                       <a href=# class="btn btn-info orderbtn" data-toggle="modal" data-target="#exampleModal"> اضافة طلب جديد</a>
                     </div>
                     </div>

                     <div class="col-12">
                       <div class="col-6 offset-md-5">
                        <h4>الطلبات السابقه </h4>
                       </div>

                       <div class="col-10">
                         <table class="table">
                           <thead>
                             <tr>
                             <th>العنوان</th>
                             <th>القسم </th>
                             <th>الحاله</th>
                             <th>التاريخ</th>
                             

                             </tr>
                           </thead>

                           <tbody>';

                           $ord=$user->displayallReq($_SESSION['id_item']);
                           foreach ($ord as $key ) {
                           	# code...
                         
                           	echo '
                           	<tr>';
                              	$_SESSION['ord']=$key['id_prob'];
                           echo'  <td><a href="info.php?id='.$key['id_prob'].'" target="_blank">'.$key['title'].'</a></td>
                             <td>'.$key['depart_name'].'</td>
                             <td>'.$key['status'].'</td>
                             <td>'.$key['create_at'].'</td>
                           	</tr>


                           	';
                           }
                              
                           echo '</tbody>
                         </table>
                       </div>
                     </div>


                     ';

                   }
                   else if($count>1){

                   }
				?>
			</div>
	</div>
</section>

<section>
	<div class=""></div>
</section>




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel">اضافة طلب جديد </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="POST">
       	<div class="form-group">
       		<h3>القسم</h3>
       		<select name="depa">
       			<?php  
       			$sql=$user->getDepartment();
       			foreach ($sql as $key ) {
       				# code...
       				echo "<option value=".$key['depart_id'].">".$key['depart_name']."</option>";
       			}

       			?>
       		</select>
       	</div>

       	<div class="form-group">
       	<h3>الموضوع</h3>
       	<input type="text" name="title" class="form-control">
       	</div>

       		<div class="form-group">
       	<h3>الشرح </h3>
       <textarea class="form-control" rows="5" name="prob"></textarea>
       	</div>
       	
       	<div class="form-group">
       
      هل يوجد المرفقات <input type="checkbox" name="atts" value="has att">
       	</div>
       	
       	
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="ordersave" class="btn btn-primary" value="حفظ">
        </form>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="displ" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel">اضافة طلب جديد </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <?php
       $order=$user->displayOrder($_GET['id']);
       foreach ($order as $key ) {
       	echo '
         <h4></h4>
         <p>'.$key['title'].'</p>
         <h4></h4>
         <p>'.$key['des'].'</p>
          <h4></h4>
         <p>'.$_SESSION['ord'].'</p>

       	';
       }

       ?>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="ordersave" class="btn btn-primary" value="حفظ">
        
      </div>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="../../js/bootstrap.js"></script>
</body>
</html>