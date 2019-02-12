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
use LibreNMS\Interfaces\Discovery\Sensors\WirelessPowerDiscovery;
use LibreNMS\Interfaces\Discovery\Sensors\WirelessFrequencyDiscovery;
use LibreNMS\OS;

class Meshwrt extends OS implements
    WirelessClientsDiscovery,
    WirelessPowerDiscovery,
    WirelessFrequencyDiscovery

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

	/**
	 * Discover wireless tx or rx power. This is in dBm. Type is power.
	 * Returns an array of LibreNMS\Device\Sensor objects that have been discovered
	 *
	 * @return array
	 */
	public function discoverWirelessPower()
	{
	    $tx_oid_5ghz = '.1.3.6.1.4.1.51510.11.2.101.1';
	    $tx_oid_2ghz = '.1.3.6.1.4.1.51510.11.2.101.2';
	    $rx_oid_5ghz = '.1.3.6.1.4.1.51510.11.3.101.1';
	    $rx_oid_2ghz = '.1.3.6.1.4.1.51510.11.3.101.1';
	    return array(
	        new WirelessSensor('power', $this->getDeviceId(), $tx_oid_5ghz, 'meshwrt-tx-5ghz', 1, '5 GHz Tx Power'),
	        new WirelessSensor('power', $this->getDeviceId(), $tx_oid_2ghz, 'meshwrt-tx-2ghz', 1, '2.4 GHz Tx Power'),
	        new WirelessSensor('power', $this->getDeviceId(), $rx_oid_5ghz, 'meshwrt-rx-5ghz', 1, '5 GHz Signal Level'),
	        new WirelessSensor('power', $this->getDeviceId(), $rx_oid_2ghz, 'meshwrt-rx-2ghz', 1, '2.4 GHz Signal Level'),
	    );
	}

	/**
	 * Discover wireless frequency.  This is in Hz. Type is frequency.
	 * Returns an array of LibreNMS\Device\Sensor objects that have been discovered
	 *
	 * @return array Sensors
	 */
	public function discoverWirelessFrequency()
	{
	    $oid_5ghz = '.1.3.6.1.4.1.51510.11.4.101.1';
	    $oid_2ghz = '.1.3.6.1.4.1.51510.11.4.101.2';
	    return array(
	        new WirelessSensor('frequency', $this->getDeviceId(), $oid_5ghz, 'meshwrt-5ghz', 1, '5 GHz Radio Frequency'),
	        new WirelessSensor('frequency', $this->getDeviceId(), $oid_2ghz, 'meshwrt-2ghz', 1, '2.4 GHz Radio Frequency'),
	    );
	}
}