<?php

 
$cms = $this->getCmspage();

?>
<script>
  var object = new Base();
  // console.log(object);
  </script>


<div class="container">
    <div class="row">
        <div class="col-12">
        <br>
        <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Cmspage') ?>').resetParams().load();"  class='btn btn-success pull-right'>Add Cmspage</a>
        <br><br>
    
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Identifier</th>
                        <th>Content</th>
                        <th>Status</th>
                        <th>CreatedDate</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(!$cms):?>
                <tr>
                    <td colspan="6">No records available.</td>
                </tr>
                <?php else: ?> 
                <?php foreach ($cms->getData() as $key => $values):
                ?>
                
                <tr>
                    <td class="align-center"><?php echo $values->id?> </td>
                    <td class="align-center"><?php echo $values->title?> </td>
                    <td class="align-center"><?php echo $values->identifier?> </td>
                    <td class="align-center"><?php echo $values->content?> </td>
                    
                    <?php if ($values->status == 1):?>
                        <td><span class="status text-success">&bull;</span><?php echo 'Enable' ?></td>
                       
                        <?php else:?>
                        <td><span class="status text-warning">&bull;</span><?php echo 'Disable' ?></td>
                        <?php endif;?>
                    <td class="align-center"><?php echo $values->createdDate?> </td>


                        <td>
                            <div class="buttons">
                                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Cmspage',['id' => $values->id]) ?>').resetParams().load();" class="btn btn-primary"
                                    >Edit</a>
                                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete', 'Cmspage',['id' => $values->id]) ?>').resetParams().load();"
                                    class="btn btn-danger" >Delete</a>
                            </div>
                        </td>

                </tr>
                <?php endforeach;?>
                <?php endif; ?>
                </tbody>

            </table>
        </div>
    </div>
</div>
