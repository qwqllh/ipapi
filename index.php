<?php
	header('Content-type: text/json;charset=utf-8');

	require_once 'vendor/autoload.php';
	use GeoIp2\Database\Reader;

    $ip = $_SERVER["REMOTE_ADDR"];
	$refip = $_GET["ip"];

	if (!empty($refip)) $ip = $refip;

	$reader = new Reader('./GeoLite2-City.mmdb');
	$record = $reader->city($ip);
	
	$countryISO = $record->country->isoCode;
	$country = $record->country->name;
	$countryCN = $record->country->names['zh-CN'];

	$continent = $record->continent->name;
	$continentCN = $record->continent->names['zh-CN'];

	$regionISO = $record->mostSpecificSubdivision->isoCode;
	$region = $record->mostSpecificSubdivision->name;
	$regionCN = $record->mostSpecificSubdivision->names['zh-CN'];

	$city = $record->city->name;
    $cityCN = $record->city->names['zh-CN'];

	$postCode = $record->postal->code;

	$latitude = $record->location->latitude;
	$longitude = $record->location->longitude;

	$data = array(
		'query' => $ip,
		'countryCode' => $countryISO,
		'country' => $country,
		'countryCN' => $countryCN,
		'continent' => $continent,
		'continentCN' => $continentCN,
		'regionCode' => $regionISO,
		'region' => $region,
		'regionCN' => $regionCN,
		'city' => $city,
		'cityCN' => $cityCN,
		'postCode' => $postCode,
		'latitude' => $latitude,
		'longitude' => $longitude
	);

	$data_json = json_encode($data, JSON_UNESCAPED_UNICODE);
	echo $data_json;
?>
