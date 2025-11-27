<?php 

function create_form_field($array){
	add_option($array['id'],'');
	if(isset($_POST[$array['slug']])){ update_option($array['id'],$_POST[$array['slug']]); }
	
	echo "<tr>";
		// Title
		echo "<th scope='row'><label for='{{$array['slug']}}'>{$array['name']}</label></th>";

		// Field
		if($array['type']=='text'){
		echo "<td><input class='regular-text' type='text' name='{$array['slug']}' id='{$array['slug']}' placeholder='{$array['placeholder']}' value='".get_option($array['id'])."'></p></td>";
		};

	echo "</tr>";
}

