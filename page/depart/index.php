<?php
session_start();
require "../connect/depart.php";

$user=new depaer();
$user->checkPerm ($_SESSION['user'],$_SESSION['pass'],$_SESSION['role']);
$data='';
$count=0;


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
      <div class="col-10">
        <table class="table">
          <thead>
            <tr>
              <th>الموضوع</th>
              <th>مقدم الطلب </th>
              <th>تاريخ التقديم </th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $ord=$user->getNewOrder($_SESSION['user']);
            foreach ($ord as $key ) {
              # code...
              echo '<tr>

              <td><a href="answer.php?id='.$key['id_prob'].'">'.$key['title'].'</a></td>
              <td>'.$key['name'].'</td>
              <td>'.$key['create_at'].'</td>


              </tr>';
            }

            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>


<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="../../js/bootstrap.js"></script>
</body>
</html>