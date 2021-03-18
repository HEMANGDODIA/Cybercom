<?php

require_once './View/template/header.php';

$rows = $this->getProducts();

?>


<div class="container">
    <div class="row">
        <div class="col-12">
        <br>
        <a href="<?php echo $this->getUrl()->getUrl('form','Product'); ?>"  class='btn btn-success pull-right'>Add Product</a>
        <br><br>
    
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>SKU </th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Quantity</th>
                        <th>Description</th>
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
                    <td class="align-center"><?php echo  $values->productId ?> </td>
                    <td class="align-center"><?php echo  $values->sku ?> </td>
                    <td class="align-center"><?php echo  $values->name ?> </td>
                    <td class="align-center"><?php echo  $values->price ?> </td>
                    <td class="align-center"><?php echo  $values->discount?> </td>
                    <td class="align-center"><?php echo  $values->quantity?> </td>
                    <td class="align-center"><?php echo  $values->description?> </td>
                    <?php if ($values->status == 1):?>
                        <td><span class="status text-success">&bull;</span><?php echo 'Enable' ?></td>
                        <?php  else:?>
                        <td><span class="status text-warning">&bull;</span><?php echo 'Disable' ?></td>
                        <?php endif;?>


                        <td><?php echo $values->createdDate ?></td>
                        <td><?php echo $values->updatedDate ?></td>
                        
                        <td>
                            <div class="buttons">
                                <a href="<?php echo $this->getUrl()->getUrl('form', null, ['productId' => $values->productId]) ?>" class="btn btn-primary"
                                    >Edit</a>
                                <a href="<?php echo $this->getUrl()->getUrl('delete', null, ['productId' => $values->productId]) ?>"
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
