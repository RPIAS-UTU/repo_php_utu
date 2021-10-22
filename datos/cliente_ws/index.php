#!/usr/bin/env php

<?php

$params = getopt('l:i:');

if (!isset($params['l'])) $params['l'] = 'YOUR_LICENSE_KEY';
if (!isset($params['i'])) $params['i'] = '24.24.24.24';

$query = 'https://geoip.maxmind.com/v1.0/insights?' . http_build_query($params);

$insights_keys =
  array(
    'country_code',
    'country_name',
    'region_code',
    'region_name',
    'city_name',
    'latitude',
    'longitude',
    'metro_code',
    'area_code',
    'time_zone',
    'continent_code',
    'postal_code',
    'isp_name',
    'organization_name',
    'domain',
    'as_number',
    'netspeed',
    'user_type',
    'accuracy_radius',
    'country_confidence',
    'city_confidence',
    'region_confidence',
    'postal_confidence',
    'error'
    );

$curl = curl_init();
curl_setopt_array(
    $curl,
    array(
        CURLOPT_URL => $query,
        CURLOPT_USERAGENT => 'MaxMind PHP Sample',
        CURLOPT_RETURNTRANSFER => true
    )
);

$resp = curl_exec($curl);

if (curl_errno($curl)) {
    throw new Exception(
        'GeoIP request failed with a curl_errno of '
        . curl_errno($curl)
    );
}

$insights_values = str_getcsv($resp);
$insights_values = array_pad($insights_values, sizeof($insights_keys), '');
$insights = array_combine($insights_keys, $insights_values);

echo "Peticion :: " . $query;

print_r($insights);