<?php
/**
 * Meshwrt.php
 *
 * Cilab MeshWrt
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

namespace LibreNMS\OS;

use LibreNMS\Device\WirelessSensor;
use LibreNMS\Interfaces\Discovery\Sensors\WirelessClientsDiscovery;
use LibreNMS\OS;

class Meshwrt extends OS implements
    WirelessClientsDiscovery

{
	/**
	 * Discover wireless client counts. Type is clients.
	 * Returns an array of LibreNMS\Device\Sensor objects that have been discovered
	 *
	 * @return array Sensors
	 */
	public function discoverWirelessClients()
	{
	    $oid = '.1.3.6.1.4.1.51510.11.1.101.1';
	    return array(
	        new WirelessSensor('clients', $this->getDeviceId(), $oid, 'meshwrt', 1, 'Clients'),
	    );
	}
}