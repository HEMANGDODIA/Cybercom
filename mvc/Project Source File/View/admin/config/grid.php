 <?php
 $rows=$this->getConfigGroup();
 ?>
 <script>
  var object = new Base();
  // console.log(object);
  </script>
<div class="container">
    <div class="row">
        <div class="col-12">
        <br>
        <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Config') ?>').resetParams().load();"  class='btn btn-success pull-right'>Add ConfigInfo</a>
        <br><br>
        <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>CreatedDate</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(!$rows):?>
                <tr>
                    <td colspan="4">No records available.</td>
                </tr>
                <?php else: ?>
                <?php foreach ($rows->getData() as $key => $values):
                ?>
                <tr>  
                    <td class="align-center"><?php echo $values->groupId?> </td>
                    <td class="align-center"><?php echo $values->name?> </td>

                        <td><?php echo $values->createdDate ?></td>

                        <td>
                            <div class="buttons">
                                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Config',['groupId' => $values->groupId]) ?>').resetParams().load();" class="btn btn-primary"
                                    >Edit</a>
                                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete', 'Config',['groupId' => $values->groupId]) ?>').resetParams().load();"
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