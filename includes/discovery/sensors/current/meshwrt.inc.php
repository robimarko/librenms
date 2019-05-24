<?php
/**
 * meshwrt.inc.php
 *
 * LibreNMS current discovery module for Crisis Innovation Lab MeshPoint
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

$oid = '.1.3.6.1.4.1.51510.12.2.101.1';
$current = (snmp_get($device, $oid, '-Oqv') / $divisor);
if ($current > 0) {
    discover_sensor($valid['sensor'], 'current', $device, $oid, 1, 'meshwrt', 'Input Current', 1000, 1, 0.1, 0.01, 1, 1.5, $current);
}

$oid = '.1.3.6.1.4.1.51510.13.2.101.1';
$current = (snmp_get($device, $oid, '-Oqv') / $divisor);
if ($current > 0) {
    discover_sensor($valid['sensor'], 'current', $device, $oid, 2, 'meshwrt', 'POE Output Current', 1000, 1, 0.1, 0.01, 0.5, 0.75, $current);
}

$oid = '.1.3.6.1.4.1.51510.15.2.101.1';
$current = (snmp_get($device, $oid, '-Oqv') / $divisor);
if ($current > 0) {
    discover_sensor($valid['sensor'], 'current', $device, $oid, 3, 'meshwrt', 'BMS Current', 1000, 1, 0.1, 0.01, 2.5, 3, $current);
}