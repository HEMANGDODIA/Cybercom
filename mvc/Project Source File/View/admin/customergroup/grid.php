<?php


$rows=$this->getCustomergroups();

?>
<script>
  var object = new Base();
  // console.log(object);
  </script>


<div class="container">
    <div class="row">
        <div class="col-12">
        <br>
        <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Customergroup') ?>').resetParams().load();"  class='btn btn-success pull-right'>Add Customer Group</a>
        <br><br>
    
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>Id</th>
                    <th>Name</th>
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
                <?php foreach ($rows->getData() as $key => $values):
                // print_r($values->groupId);

                ?>
                <tr>  
                    <td class="align-center"><?php echo $values->groupId?> </td>
                    <td class="align-center"><?php echo $values->name?> </td>
                    <?php if ($values->status == 1):?>
                        <td><span class="status text-success">&bull;</span><?php echo 'Enable' ?></td>
                        <?php  else: ?>
                        <td><span class="status text-warning">&bull;</span><?php echo 'Disable' ?></td>
                        <?php endif;?>

                        <td><?php echo $values->createdDate ?></td>

                        <td>
                            <div class="buttons">
                                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'customergroup',['groupId' => $values->groupId]) ?>').resetParams().load();" class="btn btn-primary"
                                    >Edit</a>
                                    <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete', 'customergroup',['groupId' => $values->groupId]) ?>').resetParams().load();" class="btn btn-danger"
                                    >Delete</a>
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
</div>