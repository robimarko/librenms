<?php

$data = snmp_get_multi_oid($device, ['.1.3.6.1.4.1.5150.2.1.101.1', '.1.3.6.1.4.1.5150.2.2.101.1', '.1.3.6.1.4.1.5150.2.3.101.1', '.1.3.6.1.4.1.5150.2.4.101.1']);

$version = $data['.1.3.6.1.4.1.5150.2.1.101.1'];
$hardware = $data['.1.3.6.1.4.1.5150.2.2.101.1'];
$features = $data['.1.3.6.1.4.1.5150.2.3.101.1'];
$serial = $data['.1.3.6.1.4.1.5150.2.4.101.1'];