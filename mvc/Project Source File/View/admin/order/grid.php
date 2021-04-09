<?php 
$order=$this->getOrder();
// print_r($order->getData());?>
<div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
            <div class="form-group row">
                    <fieldset>
                         <legend>
                            Order Details
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
        </div>
 </div>