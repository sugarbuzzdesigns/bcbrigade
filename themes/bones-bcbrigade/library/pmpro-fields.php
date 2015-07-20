<?php 

$region_abbrevs_names = get_state_abbrevs();

$after_email_fields = [];

$after_email_fields['birthday'] = new PMProRH_Field("birthday", "text", array("required"=>true, "label"=>"Birthday (mm/dd/yyyy)", "placeholder"=>"mm/dd/yyyy"));

// Address
$after_email_fields['address'] = new PMProRH_Field("address", "text", array("required"=>true, "label"=>"Address"));
$after_email_fields['city'] = new PMProRH_Field("city", "text", array("required"=>true, "label"=>"City"));
$after_email_fields['country'] = new PMProRH_Field("country", "text", array("required"=>true, "label"=>"Country"));
$after_email_fields['zip'] = new PMProRH_Field("zip", "text", array("required"=>true, "label"=>"Zip"));
$after_email_fields['state'] = new PMProRH_Field("state", "select", array("options"=>$region_abbrevs_names, "required"=>true));

foreach ($after_email_fields as $field) {
	pmprorh_add_registration_field("after_email", $field);
}


$after_username_fields = [];

$after_username_fields['first_name'] = new PMProRH_Field("first_name", "text", array("required"=>true, "label"=>"First Name"));
$after_username_fields['last_name'] = new PMProRH_Field("last_name", "text", array("required"=>true, "label"=>"Last Name"));

foreach ($after_username_fields as $field) {
  pmprorh_add_registration_field("after_username", $field);
}