<?php


$rows = $this->getPayments();

?>
  <script>
  var object = new Base();
  // console.log(object);
  </script>

<div class="container">
    <div class="row">
        <div class="col-12">
        <br>
        <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Payment') ?>').resetParams().load();"   class='btn btn-success pull-right'>Add Payment</a>
        <br><br>
    
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>CreatedDate</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(!$rows):?>
                <tr>
                    <td colspan="6">No records available.</td>
                </tr>
                <?php else: ?>
                <?php foreach($rows->getData() as $key => $values):
                ?>
                <tr>
                    <td class="align-center"><?php echo  $values->methodId ?> </td>
                    <td class="align-center"><?php echo  $values->name ?> </td>
                    <td class="align-center"><?php echo  $values->code ?> </td>
                    <td class="align-center"><?php echo  $values->description?> </td>
                    <?php if ($values->status == 1):?>
                        <td><span class="status text-success">&bull;</span><?php echo 'Enable' ?></td>
                        <?php  else: ?>
                        <td><span class="status text-warning">&bull;</span><?php echo 'Disable' ?></td>
                        <?php endif;?>


                        <td><?php echo $values->createdDate ?></td>
                        
                        <td>
                            <div class="buttons">
                                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'payment',['methodId' => $values->methodId]) ?>').resetParams().load();" class="btn btn-primary"
                                    >Edit</a>
                                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete', 'payment',['methodId' => $values->methodId]) ?>').resetParams().load();"
                                    class="btn btn-danger" >Delete</a>
                            </div>
                        </td>


                    
                </tr>
                <?php
                    endforeach;
                endif;

                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
