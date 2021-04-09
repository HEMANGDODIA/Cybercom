<?php

 
$rows = $this->getCategorys();

?>
  <script>
  var object = new Base();
  // console.log(object);
  </script>

<div class="container">
    <div class="row">
        <div class="col-12">
        <br>
        <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Category') ?>').resetParams().load();"  class='btn btn-success pull-right'>Add Category</a>
        <br><br>
    
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Parent</th>
                        <th>Name</th>
                        <th>Discription</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(!$rows):?>
                <tr>
                    <td colspan="6">No records available.</td>
                </tr>
                <?php else: ?> 
                <?php foreach ($rows->getData() as $key => $values):
                ?>
                
                <tr>
                    <td class="align-center"><?php echo $values->categoryId?> </td>
                    <td><?php echo $this->getName($values); ?></td>

                    <td class="align-center"><?php echo $values->name?> </td>
                    <td class="align-center"><?php echo $values->description?> </td>
                    
                    <?php if ($values->status == 1):?>
                        <td><span class="status text-success">&bull;</span><?php echo 'Enable' ?></td>
                       
                        <?php else:?>
                        <td><span class="status text-warning">&bull;</span><?php echo 'Disable' ?></td>
                        <?php endif;?>


                        <td> 
                            <div class="buttons">
                                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Category' , ['categoryId' => $values->categoryId]) ?>').resetParams().load();" class="btn btn-primary"
                                    >Edit</a>
                                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete', 'Category' , ['categoryId' => $values->categoryId]) ?>').resetParams().load();"
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
