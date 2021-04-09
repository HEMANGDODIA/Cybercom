<?php $attributes = $this->getAttributes();?>

<body>

    <div class="container">
        <div class="row">
            <div class="col-12">
            <br>
                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Attribute', [], true) ?>').resetParams().load(); "
                            class="btn btn-success pull-right">Add New Attribute</a>
                            <br><br>
                  
            <table class="table table-striped table-hover">
                <thead>
                    <th>Id</th>
                    <th>Entity Type</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Input Type</th>
                    <th>Backend Type</th>
                    <th>Sort Order</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php if (!$attributes): ?>
                    <tr>
                        <td colspan="8">No Record Found</td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($attributes->getData() as $key => $attribute): ?>

                    <tr>
                        <td><?php echo $attribute->attributeId ?></td>
                        <td><?php echo $attribute->entityTypeId ?></td>
                        <td><?php echo $attribute->name ?></td>
                        <td><?php echo $attribute->code ?></td>
                        <td><?php echo $attribute->inputType ?></td>
                        <td><?php echo $attribute->backendType ?></td>
                        <td><?php echo $attribute->sortOrder ?></td>
                        <td>
                            <div class="buttons">
                                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Attribute', ['attributeId' => $attribute->attributeId]) ?>').resetParams().load(); "
                                    class="btn btn-primary edit" title="Edit" data-toggle="tooltip">Edit</a>
                                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete', 'Attribute', ['attributeId' => $attribute->attributeId]) ?>').resetParams().load(); "
                                    class="btn btn-danger delete" title="Delete" data-toggle="tooltip">Delete</a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>
                    <?php endif;?>
                </tbody>

            </table>

        </div>
    </div>

</body>