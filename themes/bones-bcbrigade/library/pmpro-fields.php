<?php 

$region_abbrevs_names = array(
  'AL'=>'ALABAMA',
  'AK'=>'ALASKA',
  'AZ'=>'ARIZONA',
  'AR'=>'ARKANSAS',
  'CA'=>'CALIFORNIA',
  'CO'=>'COLORADO',
  'CT'=>'CONNECTICUT',
  'DE'=>'DELAWARE',
  'DC'=>'DISTRICT OF COLUMBIA',
  'FL'=>'FLORIDA',
  'GA'=>'GEORGIA',
  'GU'=>'GUAM GU',
  'HI'=>'HAWAII',
  'ID'=>'IDAHO',
  'IL'=>'ILLINOIS',
  'IN'=>'INDIANA',
  'IA'=>'IOWA',
  'KS'=>'KANSAS',
  'KY'=>'KENTUCKY',
  'LA'=>'LOUISIANA',
  'ME'=>'MAINE',
  'MD'=>'MARYLAND',
  'MA'=>'MASSACHUSETTS',
  'MI'=>'MICHIGAN',
  'MN'=>'MINNESOTA',
  'MS'=>'MISSISSIPPI',
  'MO'=>'MISSOURI',
  'MT'=>'MONTANA',
  'NE'=>'NEBRASKA',
  'NV'=>'NEVADA',
  'NH'=>'NEW HAMPSHIRE',
  'NJ'=>'NEW JERSEY',
  'NM'=>'NEW MEXICO',
  'NY'=>'NEW YORK',
  'NC'=>'NORTH CAROLINA',
  'ND'=>'NORTH DAKOTA',
  'OH'=>'OHIO',
  'OK'=>'OKLAHOMA',
  'OR'=>'OREGON',
  'PW'=>'PALAU',
  'PA'=>'PENNSYLVANIA',
  'PR'=>'PUERTO RICO',
  'RI'=>'RHODE ISLAND',
  'SC'=>'SOUTH CAROLINA',
  'SD'=>'SOUTH DAKOTA',
  'TN'=>'TENNESSEE',
  'TX'=>'TEXAS',
  'UT'=>'UTAH',
  'VT'=>'VERMONT',
  'VI'=>'VIRGIN ISLANDS',
  'VA'=>'VIRGINIA',
  'WA'=>'WASHINGTON',
  'WV'=>'WEST VIRGINIA',
  'WI'=>'WISCONSIN',
  'WY'=>'WYOMING',
  'UK'=>'UNITED KINGDOM'
);

$fields = [];

$fields['birthday'] = new PMProRH_Field("birthday", "text", array("required"=>true, "label"=>"Birthday (mm/dd/yyyy)", "placeholder"=>"mm/dd/yyyy"));
$fields['address'] = new PMProRH_Field("address", "text", array("required"=>true, "label"=>"Address"));
$fields['city'] = new PMProRH_Field("city", "text", array("required"=>true, "label"=>"City"));
$fields['country'] = new PMProRH_Field("country", "text", array("required"=>true, "label"=>"Country"));
$fields['zip'] = new PMProRH_Field("zip", "text", array("required"=>true, "label"=>"Zip"));
$fields['state'] = new PMProRH_Field("state", "select", array("options"=>$region_abbrevs_names, "required"=>true));

foreach ($fields as $field) {
	pmprorh_add_registration_field("after_email", $field);
}