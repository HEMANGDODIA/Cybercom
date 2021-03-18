
<head>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="<?php echo $this->subUrl('skin/admin/js/jquery-3.6.0.js'); ?>"></script>
  <script src="<?php echo $this->subUrl('skin/admin/js/mage.js'); ?>"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php \Mage::loadFileByClassName('Controller\Core\Admin');
$admin=new Controller\Core\Admin();
?>
<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php  echo  $admin->getUrl('index','Dashboard'); ?>">Questcom</a>
    </div>
    <ul class="nav navbar-nav">
    <li class="active"><a href="<?php  echo  $admin->getUrl('index','Dashboard'); ?>">Dashboard</a></li>
      <li><a href="<?php  echo  $admin->getUrl('grid','Product'); ?>">Product</a></li>
      <li><a href="<?php echo $admin->getUrl('grid','Admin'); ?>">Admin</a></li>
      <li><a href="<?php echo $admin->getUrl('grid','Customer'); ?>">Customer</a></li>
      <li><a href="<?php echo $admin->getUrl('grid','Category'); ?>">Category</a></li>
      <li><a href="<?php echo $admin->getUrl('grid','Customergroup'); ?>">Customergroup</a></li>
      <li><a href="<?php echo $admin->getUrl('grid','Payment'); ?>">Payment</a></li>
      <li><a href="<?php echo $admin->getUrl('grid','Shipping'); ?>">Shipping</a></li>

    </ul>
    <!-- <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul> -->
  </div>
</nav>
  


</body>
</html>
