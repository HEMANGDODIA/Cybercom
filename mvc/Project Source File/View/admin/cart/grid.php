<?php $cart = $this->getCart();
$cartItem = $cart->getItems();
$customers = $cart->getCustomers()->getData();


 
?>
<form action="<?php echo $this->getUrl()->getUrl('save', 'Cart'); ?>" id="cartForm">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
            <div class="form-group row">
                    <fieldset>
                         <legend>
                            Cart Details
                         </legend>
                    </fieldset>
                    </div>
                <div class="row">
                   
                    <div class="col-sm-12">
                        <a class='btn btn-success pull-right' onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'Product', [], true) ?>').resetParams().load(); "
                             > Go Back</a>

                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col">
                    <label for="status">Select Customer</label>
                </div>
                <div class="col">

                    <select name="customerId" class="form-control" id="customerSelect">
                        <option >Select</option>
                        <?php foreach ($customers as $key => $customer): ?>
                        <option value="<?php echo $customer->customerId; ?>" <?php if ($customer->customerId == $cart->customerId) {
    echo 'selected';
}
?>><?php echo $customer->firstname ?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead align="center">
                    <th>Cart Item Id</th>
                    <th>CartId</th>
                    <th>ProdcutId</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>BasePrice</th>
                    <th>Created Date</th>
                </thead>
                <tbody align="center">
                    <?php if (!$cartItem): ?>
                    <tr>
                        <td colspan="7" al>No Record Found</td>
                    </tr>
                    <?php else: ?>
                    <?php

foreach ($cartItem->getData() as $key => $value):
?>

                    <tr>
                        <td><?php echo $value->cartItemId; ?></td>
                        <td><?php echo $value->cartId; ?></td>
                        <td><?php echo $value->productId; ?></td>
                        <td><input type="number" value="<?php echo $value->quantity; ?>" class="quantityUpdate"
                                name="quantity[<?php echo $value->cartItemId ?>]"></td>
                        </td>
                        <td><input type="number" value="<?php echo $value->price; ?>" class="priceUpdate"
                                name="price[<?php echo $value->cartItemId ?>]"></td>
                        </td>
                        <td><?php echo $value->basePrice; ?></td>
                        <td><?php echo $value->createdDate; ?></td>
                        <td>
                            <div class="buttons">
                                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete', 'Cart', ['cartItemId' => $value->cartItemId]) ?>').resetParams().load(); "
                                class="btn btn-danger">Delete</a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>
                    <?php endif;?>
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <div class="container contact-edit bt" id="container">
        <?=$this->createBlock('Block\Admin\Cart\Address')->setCart($cart)->toHtml();?>
    </div>
    <div class="container mt-2">
        <div class="row">
            <!-- payemnt method -->
            <div class="col">
                <?=$this->createBlock('Block\Admin\Cart\Payment')->toHtml()?>
            </div>
            <!-- shipping method -->
            <div class="col">
                <?=$this->createBlock('Block\Admin\Cart\Shipping')->toHtml()?>
            </div>
        </div>

    </div>
    <div class="col-md-12">
        <div class="d-flex justify-content-center">

            <ul class="list-unstyled">
                <li>
                    <div class="row">
                        <div class="col"> Base Total</div>
                        <div class="col"><?php echo $this->getTotal() ?> </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col">Shipping Charges</div>
                        <div class="col"><?php echo $this->getShippingAmount() ?></div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col"><b>Discount</b></div>
                        <div class="col"><input type="number" value="<?php echo $cart->discount; ?>" class="itemUpdate"
                                name="discount"> </div>
                    </div>
                </li>
                <li>
                    <hr>
                    <div class="row font-weight-bold">
                        <div class="col"> Grand Total</div>
                        <div class="col"><?php echo $this->grandTotal() ?></div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
                   
                    <div class="col-sm-7">
                        <a class='btn btn-success pull-right' onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('save', 'order', [], true) ?>').resetParams().load(); "
                             > Place Order</a>

                    </div>
                </div>

</form>
<script type="text/javascript">
$(document).ready(function() {

    $(".quantityUpdate").change(function() {
        $('form').attr('action',
            '<?php echo $this->getUrl()->getUrl('save', 'Cart'); ?>'
        );
        var dataString = $('#cartForm').serialize();
        $.ajax({
            url: $('#cartForm').prop('action'),
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
    $(".priceUpdate").change(function() {
        $('form').attr('action',
            '<?php echo $this->getUrl()->getUrl('save', 'Cart'); ?>'
        );
        var dataString = $('#cartForm').serialize();
        $.ajax({
            url: $('#cartForm').prop('action'),
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
    $("#customerSelect").change(function() {
        $('form').attr('action',
            '<?php echo $this->getUrl()->getUrl('change', 'Cart'); ?>'
        );
        var dataString = $('#cartForm').serialize();
        $.ajax({
            url: $('#cartForm').prop('action'),
            type: "POST",
            data: dataString,
            success: function(response) {
                $.each(response.element, function(i, element) {
                    $(element.selector).html(element
                        .html);
                });
            },
        })
    });

});
</script>