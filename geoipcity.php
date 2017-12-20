<?php

$ip = $_SERVER['REMOTE_ADDR'];
if($_GET['ip']) $ip = $_GET['ip'];

include("/var/www/vhosts/freestuffmyway.com/httpdocs/includes/geo/geoipcity.inc");
$gi = geoip_open("/var/www/vhosts/freestuffmyway.com/httpdocs/includes/geo/GeoCity.dat",GEOIP_STANDARD);
$country = trim(geoip_country_code_by_addr($gi,$ip));
//echo $country;
$record = geoip_record_by_addr($gi,$ip);
print $record->country_code . " " . $record->country_code3 . " " . $record->country_name . "\n";
print $record->region . " " . $GEOIP_REGION_NAME[$record->country_code][$record->region] . "\n";
print $record->city . "\n";
print $record->postal_code . "\n";
print $record->latitude . "\n";
print $record->longitude . "\n";
print $record->metro_code . "\n";
print $record->area_code . "\n";
print $record->continent_code . "\n";


geoip_close($gi);


?>