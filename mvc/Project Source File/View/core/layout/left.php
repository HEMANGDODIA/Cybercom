<div id="leftHtml">

<?php

$children = $this->getChildren();
foreach ($children as $child) {
    echo $child->toHtml();
}
?>
<script>
    var object = new Base();
    </script>

</div>