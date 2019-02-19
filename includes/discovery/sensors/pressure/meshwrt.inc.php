<?php
/**
 * meshwrt.inc.php
 *
 * LibreNMS pressure discovery module for Crisis Innovation Lab MeshPoint
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

$oid = '.1.3.6.1.4.1.51510.14.2.101.1';
$current = (snmp_get($device, $oid, '-Oqv') / $divisor);
if ($current > 0) {
	discover_sensor($valid['sensor'], 'pressure', $device, $oid, 1, 'meshwrt', 'Air pressure', 1, 1, 101.2, 101, 101.6, 102, $current);
}