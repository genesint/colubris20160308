<?php

global $user;
module_load_include('inc', 'node', 'node.pages');
function create_attribute($line)
{
	
	$line= str_replace ( "\n" , "" , $line );
	$data=explode ( "|" , $line , 3);

    global $user;
    $child = new stdClass();
    $child->title = $data[0];
    $child->type = "attribute";
    node_object_prepare($child); // Sets some defaults. Invokes hook_prepare() and hook_node_prepare().
    $child->language = LANGUAGE_NONE; // Or e.g. 'en' if locale is enabled
    $child->uid = $user->uid;
    $child->status = 1; //(1 or 0): published or not
    $child->promote = 0; //(1 or 0): promoted to front page
    $child->comment = 0; // 0 = comments disabled, 1 = read only, 2 = read/write
    $child->field_data_type['und'][0]['value'] = $data[1];
    $child->field_radius_message_type['und'][0]['value'] = $data[2];
    $child->field_category['und'][0]['value'] = $data[3];
    $child->field_vendor['und'][0]['value'] =  $data[4];
    $child->field_field_description['und'][0]['value'] = $data[5];
    $child = node_submit($child); // Prepare node for saving
    node_save($child);
}

$filename="sites/all/modules/custom/colubris/tools/data/User-attributes.csv";
$filearray = file($filename);
$i=-1;
foreach($filearray as $line){
	$i=$i+1;
	if($i==0) {
		continue;
	}
	
	create_attribute($line);
}
