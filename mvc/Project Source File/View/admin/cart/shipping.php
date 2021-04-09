<?php $shippings = $this->getShippings();?>
<h3>Shipping Method</h3>
<hr>
<?php if ($shippings): ?>
<?php foreach ($shippings as $shipping): ?>
<div class="form-check">
    <label class="form-check-label">
        <input type="radio" class="form-check-input" name="shipping" id="" value="<?=$shipping->methodId?>">
        <?=$shipping->name?>
    </label>
</div>
<?php endforeach;?>
<?php endif;?>
<input type="button" value="Save" class="btn btn-primary" id="saveShippingMethod">
<script type="text/javascript">
$(document).ready(function() {

    $("#saveShippingMethod").click(function() {
        $('form').attr('action',
            '<?php echo $this->getUrl()->getUrl('saveShippingMethod', 'Cart'); ?>'
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