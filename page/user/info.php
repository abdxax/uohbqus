<?php
session_start();
require "../connect/user_Opret.php";
$user=new User();
$msg='';
if (isset($_POST['conta'])) {
  if ($user->updateStaus($_GET['id'],$_SESSION['user'])) {
    $msg="<div class=alert alert-success text-center> تم تحديث الحاله </div>";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">
	<title></title>
</head>
<body>
<section>
	<div class="conatiner">
		<div class="row">
      <div class="col-12">
        <?echo $msg;?>
      </div>
			<div class="col-10">
				 <?php
       $order=$user->displayOrder($_GET['id']);
       foreach ($order as $key ) {
       	echo '
         <h4>العنوان :</h4>
         <p>'.$key['title'].'</p>
         <h4>الشرح :</h4>
         <p>'.$key['des'].'</p>
          <h4>الحاله</h4>
         <p>'.$key['status'].'</p>
          <h4>الجواب </h4>
         <p>'.$key['answer'].'</p>

      
           <table class="table">
            <tr>
            
             <td> '.$key['create_at'].'</td>
              <th>تاريخ رفع الطلب </th>
              <td> '.$user->getName($key['user_order']).'</td>
              <th>الموظف </th>
            </tr>
            <tr>
            
             <td> '.$key['answer_at'].'</td>
              <th>تاريخ الجواب </th>
              <td> '.$user->getName($key['user_answer']).'</td>
              <th>الموظف </th>
            </tr>
            <tr>
            
             <td> '.$key['contact_at'].'</td>
              <th>تاريخ التواصل </th>
              <td> '.$user->getName($key['user_contact']).'</td>
              <th>الموظف </th>
            </tr>
           </table>

           
       

       	';

        if ($key['status']=='answ') {
          echo'<div class="col-12">
            <form method="POST">
             <input type="submit" class="btn btn-info" value="تم التواصل " name="conta">
            </form>
           </div>';
        }
       }

       ?>
			</div>
		</div>
	</div>
</section>
</body>
</html>