<?php $configs = $this->getTableRow()->getConfigs();
// print_r($configs);
// var_dump($configs);
?>

<div class="table-responsive">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-5">
                    <h2>Configuration Details</h2>
                </div>
                <div class="col-sm-7">
                    <input class="btn btn-success" type="button" id="configUpdate" value="Update">
                    <input class="btn btn-success add-row" type="button" value="Add Config">

                </div>
            </div>
        </div>
        
        <div class="col-sm-12">
        
        <table class="table ">
            <thead >
            <th></th>
                <th>Title</th>
                <th>Code</th>
                <th>Value</th>
            </thead>

            <tbody id="exitsTableBody">
                <?php if ($configs): ?>
                <?php foreach ($configs->getData() as $config): ?>
                <tr>
                <td></td>
                    <td><input type="text" name="exist[<?=$config->configId?>][title]" 
                            value="<?=$config->title?>"></td>
                    <td><input type="text"  name="exist[<?=$config->configId?>][code]"
                            value="<?=$config->code?>">
                    </td>
                    <td><input type="text"  name="exist[<?=$config->configId?>][value]"
                            value="<?=$config->value?>">
                    </td>
                    <td><input class="btn btn-danger delete-btn" type="button" value="Delete Option" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete', 'ConfigGroup_Config',['configId' => $config->configId]) ?>').resetParams().load();"></td>
                </tr>
                <?php endforeach;?>
                <?php endif;?>
            </tbody>

        </table>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $(".add-row").click(function() {
        var markup =
            '<tr><td><input type="text" name="new[config][title]" /></td><td><input type="text"   name="new[config][code]" class="form - control"/></td><td><input type="text" name="new[config][value]" class="form - control"/></td><td><input class="btn btn-success delete-btn" type="button" value="Delete Config"></td></tr>';
        $("table tbody").append(markup);
    });
    $("#configUpdate").click(function() {

        var dataString = $('input').serializeArray()
        $.ajax({
            url: '<?php echo $this->getUrl()->getUrl('save', 'ConfigGroup_Config'); ?>',
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