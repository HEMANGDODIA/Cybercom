<?php
$tabs=$this->getTabs();

foreach ($tabs as $key=>$tab) {?>
    
    <a class="btn btn-primary" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl(null, null, ['tab' =>$key]) ?>').resetParams().load();"><?php echo $tab['label'] ?></a>

<?php


if (!$this->getRequest()->getGet('attributeId')) {
    break;
}

}



?>