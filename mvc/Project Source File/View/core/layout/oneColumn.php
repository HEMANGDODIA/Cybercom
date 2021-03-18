<html>
<!-- <head>

<script type="text/javascript" src="<?php // echo $this->baseUrl('skin/admin/js/jQuery.js');?>"></script>
<script type="text/javascript" src="<?php // echo $this->baseUrl('skin/admin/js/mage.js');?>"></script>
</head>  -->
<body>
<div class="card text-center">
  <div class="card-header" >
  <?php 
  $content=$this->getChild('header');
  echo $content->toHtml();
  ?>
  </div>
  <div>
  <?php $this->createBlock('Block\Core\Layout\Message')->toHtml();?>
  </div>
  <div class="card-body" style="height:100%;overflow:auto;">
  <?php 
  $content=$this->getChild('content');
  echo $content->toHtml();
  ?>
  </div>
  <div class="card-footer text-muted"  >
  <?php 
  $content=$this->getChild('footer');
  echo $content->toHtml();
  ?> 
  </div>
</div>
</body>            
</html>