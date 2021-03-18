<?php $imageData = $this->getProductMedia();
// print_r($imageData);
// die();
?>

<div class="container">
    <div class="row">
        <div class="col-12 mb-15">
                    <h3>Product Media</h3>
                </div>
                <div class="col-sm-11 text-right ">
                    <input class="btn btn-success" type="submit" value="Update">
                    <input class="btn btn-danger" id="target" type="submit" value="Remove">
                </div><br><br>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead align="center">
                <th>Image</th>
                <th>Label</th>
                <th>Small</th>
                <th>Thumb</th>
                <th>Base</th>
                <th>Gallery</th>
                <th>Remove</th>
            </thead>
            <tbody>
                <?php if (!$imageData): ?>
                <tr>
                    <td>No Record Found</td>
                </tr>
                <?php else: ?>
                <?php foreach ($imageData->getData() as $key => $value): ?>
                <tr>
                    <td><img src="View/template/image/product/<?php echo $value->image ?>" alt="no image" width="100px"
                            height="100px"></td>
                    <th><input type="text" name="data[<?php echo $value->imageId ?>][label]"></th>
                    <th><input type="radio" name="data[small]" value="<?php echo $value->imageId ?>"></th>
                    <th><input type="radio" name="data[thumb]" value="<?php echo $value->imageId ?>"></th>
                    <th><input type="radio" name="data[base]" value="<?php echo $value->imageId ?>"></th>
                    <th><input type="checkbox" name="data[<?php echo $value->imageId ?>][gallery]"
                            value="<?php echo $value->imageId ?>"></th>
                    <th><input type="checkbox" name="imageId[<?php echo $value->imageId ?>]"></th>
                </tr>
                <?php endforeach;?>
                <?php endif;?>
            </tbody>
        </table>
        <div class="form-field col-lg-6">
            <input id="image" name="image" class="input-text js-input " type="file">
        </div>
        <div class="form-field col-lg-6">
            <input class="btn btn-primary" type="submit" value="Upload">
        </div>
    </div>
</div>  
 
<script>
var self = "<?php echo $this->getRequest()->getGet('productId') ?>";
// console.log(self);
$('form').attr('action',
    '<?php echo $this->getUrl()->getUrl('save', 'ProductMedia', []); ?>'
);

$("#target").click(function() {
    var self = "<?php echo $this->getRequest()->getGet('imageId') ?>";
    $('form').attr('action',
        '<?php echo $this->getUrl()->getUrl('delete', 'ProductMedia', []); ?>'
    );
});
</script>