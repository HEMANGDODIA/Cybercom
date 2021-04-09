
<head>

<title>Welcome</title>

<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src= "https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"> 
  </script>
<link rel="stylesheet"
          href= 
"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> 
<script src= 
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> 
  </script> 
     <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
   
    <script src= 
"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"> 
  </script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="<?php echo $this->subUrl('skin/admin/js/jquery-3.6.0.js'); ?>"></script>
  <script src="<?php echo $this->subUrl('skin/admin/js/mage.js'); ?>"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script>
  var object = new Base();
  var Mage = new Base();

  // console.log(object);
  </script>

</head>
<body>
  
<?php 
?>
<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('index', 'Dashboard') ?>').resetParams().load();"  >Questcom</a>
    </div>
    <ul class="nav navbar-nav">
    <li class="active"><a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('index', 'Dashboard') ?>').resetParams().load();">Dashboard</a></li>
      <li><a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'Product') ?>').resetParams().load();">Product</a></li>
      <li><a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'Admin') ?>').resetParams().load();">Admin</a></li>
      <li><a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'Category') ?>').resetParams().load();">Category</a></li>
      <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown">Customer
        <span class="caret"></span></a>
      <ul class="dropdown-menu">
         <li>  <a  onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'Customer') ?>').resetParams().load();">Customer</a></li>
        <li> <a  onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'Customergroup') ?>').resetParams().load();">Customergroup</a> </li>
      </ul>
      </li>
      <li><a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'Payment') ?>').resetParams().load();">Payment</a></li>
      <li><a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'Shipping') ?>').resetParams().load();">Shipping</a></li>
      <li><a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'Cmspage') ?>').resetParams().load();">CmsPage</a></li>
      <li><a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'attribute') ?>').resetParams().load();">Attribute</a></li>
      <li><a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'brand') ?>').resetParams().load();">Brand</a></li>
      <li><a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'Config') ?>').resetParams().load();">Config</a></li>

    </ul>
    <!-- <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul> -->
  </div>
</nav>
  


</body>
</html>

