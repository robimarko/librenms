<?php

$data = snmp_get_multi_oid($device, ['.1.3.6.1.4.1.5150.2.1', '.1.3.6.1.4.1.5150.2.2', '.1.3.6.1.4.1.5150.2.3', '.1.3.6.1.4.1.5150.2.4']);

$version = $data['.1.3.6.1.4.1.5150.2.1'];
$hardware = $data['.1.3.6.1.4.1.5150.2.2'];
$features = $data['.1.3.6.1.4.1.5150.2.3'];
$serial = $data['.1.3.6.1.4.1.5150.2.4'];