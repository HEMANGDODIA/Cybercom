<?php $customerGroups = $this->getCustomerGroups();?>
<div class="container">
    <div class="row">
        <div class="col-12 mb-15">
                    <h2>Product Group Price Details</h2>
                </div>
                <div class="col-sm-11 text-right ">
                <input class="submit-btn" type="button" id="group_price" value="Update">                </div>
            </div>
        <table class="table table-striped table-hover">
            <thead align="center">
                <th>Id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Group Price</th>
            </thead>
            <tbody>
                <?php if (!$customerGroups): ?>
                <tr>
                    <td colspan=" 5" al>No Record Found</td>
                </tr>
                <?php else: ?>
                <?php

foreach ($customerGroups->getData() as $key => $customerGroup): print_r($customerGroup) ?>
                <tr>
                    <?php $rowStatus = ($customerGroup->entityId) ? 'exist' : 'new';?>
                    <td><?php echo $customerGroup->productId ?></td>
                    <td><?php echo $customerGroup->name ?></td>
                    <td><?php echo $customerGroup->price ?></td>
                    <td><input type="text"
                            name="groupPrice[<?php echo $rowStatus; ?>][<?php echo $customerGroup->productId; ?>]"
                            value="<?php echo $customerGroup->groupPrice; ?>"></td>
                </tr>
                <?php endforeach;?>
                <?php endif;?>
            </tbody>
        </table>
    </div>
</div>
<script>
$(document).ready(function() {

$("#group_price").click(function() {
    $('form').attr('action',
        '<?php echo $this->getUrl()->getUrl('save', 'Product_GroupPrice'); ?>'
    );
    var dataString = $('#productForm').serialize();
    $.ajax({
        url: $('#productForm').prop('action'),
        type: "POST",
        data: dataString,
        success: function(response) {
            console.log(response);
            $.each(response.element, function(i, element) {
                $(element.selector).html(element
                    .html);
            });
        },
    })
});

});
</script>