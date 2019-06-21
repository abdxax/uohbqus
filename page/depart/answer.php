<?php
session_start();
require "../connect/depart.php";

$user=new depaer();
$user->checkPerm ($_SESSION['user'],$_SESSION['pass'],$_SESSION['role']);
$data='';
$count=0;
$ids=0;
if ($_GET['id']) {
  $ids=$_GET['id'];
}
else{
  header("location:index.php");
}
if (isset($_POST['subs'])) {
  $ans=strip_tags($_POST['ans']);
  $user->addAnswer($ids,$_SESSION['user'],$ans);
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
  <style type="text/css">
    .vs{
      margin: 15px;
    }
  </style>
</head>
<body dir="rtl">
<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#">Hidden brand</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
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

              <td><a href="">'.$key['title'].'</a></td>
              <td>'.$key['name'].'</td>
              <td>'.$key['create_at'].'</td>


              </tr>';
            }

            ?>
          </tbody>
        </table>
      </div>
      <div class="col-12">
        <div class="prm">
          <?php
           $pron=$user->getProblem ($ids);
           foreach ($pron as $key ) {
             echo'
             <h5>'.$key['title'].'</h5>
             <p>'.$key['des'].'</p>
             <div class="col-6">
             <form method="POST">
             <textarea class="form-control" name="ans" rows="5"></textarea>
             <div class="text-center vs">
              <input type="submit" name="subs" value="جواب " class="btn btn-info">
             </div>
             </form>

             </div>

             ';
           }

          ?>
        </div>
      </div>
    </div>
  </div>
</section>


<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="../../js/bootstrap.js"></script>
</body>
</html>