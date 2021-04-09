<?php $imageData = $this->getProductMedia();
// print_r($imageData);
// die();
?>

<div class="container">
    <div class="row">
        <div class="col-12 mb-15">
                    <h3>Product Media</h3>
                </div>
                <div class="col-sm-11">
                    <input class="btn btn-success" type="button" id="image_update" value="Update">
                    <input class="btn btn-danger" id="image_delete" type="button" value="Remove">
                    <!-- <input type="submit" class="btn btn-success" id="image_update" value="Update">
                    <input class="btn btn-danger" id="image_delete" type="submit" value="Remove"> -->
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
                    <td><img src="View/admin/template/image/product/<?php echo $value->image ?>" alt="no image" width="100px"
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
            <input id="image" name="image" class="input-text js-input" type="file">
        </div>
        <div class="form-field col-lg-6">
            <input class="btn btn-primary" type="button" id="image_upload" value="Upload">
        </div>
       
    </div>
</div>  
<script>
$(document).ready(function() {

    $("#image_update").click(function() {
        $('form').attr('action',
            '<?php echo $this->getUrl()->getUrl('save', 'Product_Media'); ?>'
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
$(document).ready(function() {

    $("#image_upload").click(function() {
        $('form').attr('action',
            '<?php echo $this->getUrl()->getUrl('save', 'Product_Media'); ?>'
        );
        var fd = new FormData();
        var files = $('#image')[0].files;
        if (files.length > 0) {
            fd.append('image', files[0]);
            $.ajax({
                url: $('#productForm').prop('action'),
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    $.each(response.element, function(i, element) {
                        $(element.selector).html(element.html);
                    });
                },

            });
        } else {
            alert("Please select a file.");
        }
    });
});

$(document).ready(function() {
    $('#image_delete').click(function() {
        $('form').attr('action',
            '<?php echo $this->getUrl()->getUrl('delete', 'Product_Media'); ?>'
        );
        var id = [];
        $(".checkeditem:checkbox:checked").each(function(key) {
            id[key] = $(this).val();
        })
        if (id.length === 0) {
            alert("Please Select atleast one checkbox");
        } else {
            $.ajax({
                url: $('#productForm').prop('action'),
                type: "POST",
                data: {
                    id: id
                },
                success: function() {
                    for (var i = 0; i < id.length; i++) {
                        $('tr#' + id[i] + '').css('background',
                            'linear-gradient(125deg, #a72879, #064497)'
                        );
                        $('tr#' + id[i] + '').fadeOut('slow');
                    }
                }
            })
        }

    });

});
</script>