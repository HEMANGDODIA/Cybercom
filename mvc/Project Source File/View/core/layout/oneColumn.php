
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
            
         