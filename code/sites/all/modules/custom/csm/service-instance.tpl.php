<?php
global $base_url;
$nid = $_GET['nid'];
$product=node_load($nid);
if(!$product){
    drupal_goto($base_url."/products");
}
?>


<div class="row">
    <div class="col-md-10">

        <ul class="nav nav-tabs">
            <li role="presentation"><a href="<?php echo $base_url; ?>/product/<?php echo $nid; ?>"
                                       target="view">Basic properties</a>
            </li>
            <li role="presentation"><a
                    href="<?php echo $base_url; ?>/product-settings/<?php echo $nid; ?>"
                    target="view">Product settings</a></li>
            <li role="presentation"><a href="<?php echo $base_url; ?>/colubris-avpair-settings/<?php echo $nid; ?>"
                                       target="view">Colubris-AVPair settings</a>
            </li>
        </ul>
    </div>

    <div class="col-md-2"></div>
</div>

<div class="row">
    <div class="col-md-12">
        <iframe class="view" name="view" src="<?php echo $base_url; ?>/product/<?php echo $nid; ?>" width="100%"
                height="400px"
                style="border-width:0px;"></iframe>
    </div>
</div>
