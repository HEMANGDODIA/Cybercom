<?php

require_once './View/template/header.php';

$rows=$this->getCustomers();
?>


<div class="container">
    <div class="row">
        <div class="col-12">
        <br>
        <a href="<?php echo $this->getUrl()->getUrl('form','Customer'); ?>"  class='btn btn-success pull-right'>Add Customer</a>
        <br><br>
    
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>FirstName</th>
                        <th>LastName</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>CreatedDate</th>
                        <th>UpdatedDate</th>
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
                    <td class="align-center"><?php echo $values->customerId?> </td>
                    <td class="align-center"><?php echo $values->firstname?> </td>
                    <td class="align-center"><?php echo $values->lastname?> </td>
                    <td class="align-center"><?php echo $values->email?> </td>

                    <?php if ($values->status == 1):?>
                        <td><span class="status text-success">&bull;</span><?php echo 'Enable' ?></td>
                        <?php  else: ?>
                        <td><span class="status text-warning">&bull;</span><?php echo 'Disable' ?></td>
                        <?php endif;?>

                        <td><?php echo $values->createdDate ?></td>
                        <td><?php echo $values->updatedDate ?></td> 

                        <td>
                            <div class="buttons">
                                <a href="<?php echo $this->getUrl()->getUrl('form', null, ['customerId' => $values->customerId]) ?>" class="btn btn-primary"
                                    >Edit</a>
                                <a href="<?php echo $this->getUrl()->getUrl('delete', null, ['customerId' => $values->customerId]) ?>"
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
</div>