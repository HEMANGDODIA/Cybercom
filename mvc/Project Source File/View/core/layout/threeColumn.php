
<div class="card text-center">

            <!-- Header -->
    <div class="card-header" >
      <?php 
      $content=$this->getChild('header');
      echo $content->toHtml();
      ?>
    </div>

            <!-- Message -->
    <div>
      <?php echo $this->createBlock('Block\Core\Layout\Message')->toHtml();?>
    </div>

    
    

            <!-- Content -->
          


    <div class="card-body col-md-6" style="width:150px;margin-top:60px;margin-left:20px;margin-right:40px;">
    <?php echo $this->getChild('left')->toHtml();?>
    </div>

    <div class="card-body " style="height:100%;overflow:auto;">
      <?php 
      $content=$this->getChild('content');
      echo $content->toHtml();
      ?>
     
    </div>
    
           <!-- Footer -->
    <div class="card-footer text-muted"  >
    <?php 
    $content=$this->getChild('footer');
    echo $content->toHtml();
    ?> 
    </div>
</div>
            
         