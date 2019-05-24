<?php
/**
 * meshwrt.inc.php
 *
 * LibreNMS temperature discovery module for Crisis Innovation Lab MeshPoint
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    LibreNMS
 * @link       http://librenms.org
 * @copyright  2019 Robert Marko
 * @author     Robert Marko <robimarko@gmail.com>
 */

$oid = '.1.3.6.1.4.1.51510.14.1.101.1';
$current = (snmp_get($device, $oid, '-Oqv') / $divisor);
if ($current > 0) {
	discover_sensor($valid['sensor'], 'temperature', $device, $oid, 1, 'meshwrt', 'Board temperature', 1000, 1, 0, -5, 40, 50, $current);
}

$oid = '.1.3.6.1.4.1.51510.14.1.101.2';
$current = (snmp_get($device, $oid, '-Oqv') / $divisor);
if ($current > 0) {
	discover_sensor($valid['sensor'], 'temperature', $device, $oid, 2, 'meshwrt', 'Outside temperature', 1000, 1, 0, -5, 40, 50, $current);
}

$oid = '.1.3.6.1.4.1.51510.15.3.101.1';
$current = (snmp_get($device, $oid, '-Oqv') / $divisor);
if ($current > 0) {
	discover_sensor($valid['sensor'], 'temperature', $device, $oid, 3, 'meshwrt', 'BMS temperature', 1, 1, 0, -5, 40, 50, $current);
}