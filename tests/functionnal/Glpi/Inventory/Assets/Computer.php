<?php

/**
 * ---------------------------------------------------------------------
 *
 * GLPI - Gestionnaire Libre de Parc Informatique
 *
 * http://glpi-project.org
 *
 * @copyright 2015-2022 Teclib' and contributors.
 * @copyright 2003-2014 by the INDEPNET Development Team.
 * @licence   https://www.gnu.org/licenses/gpl-3.0.html
 *
 * ---------------------------------------------------------------------
 *
 * LICENSE
 *
 * This file is part of GLPI.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 *
 * ---------------------------------------------------------------------
 */

namespace tests\units\Glpi\Inventory\Asset;

include_once __DIR__ . '/../../../../abstracts/AbstractInventoryAsset.php';

/* Test for inc/inventory/asset/computer.class.php */

class Computer extends AbstractInventoryAsset
{
    const INV_FIXTURES = GLPI_ROOT . '/vendor/glpi-project/inventory_format/examples/';

    protected function assetProvider(): array
    {
        return [
            [ //both bios and hardware
                'xml' => "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>
<REQUEST>
  <CONTENT>
    <BIOS>
      <ASSETTAG />  <BDATE>06/02/2016</BDATE>
      <BMANUFACTURER>Dell Inc.</BMANUFACTURER>
      <BVERSION>1.4.3</BVERSION>
      <MMANUFACTURER>Dell Inc.</MMANUFACTURER>
      <MMODEL>07TYC2</MMODEL>
      <MSN>/640HP72/CN129636460078/</MSN>
      <SKUNUMBER>0704</SKUNUMBER>
      <SMANUFACTURER>Dell Inc.</SMANUFACTURER>
      <SMODEL>XPS 13 9350</SMODEL>
      <SSN>640HP72</SSN>
    </BIOS>
    <HARDWARE>
      <CHASSIS_TYPE>Laptop</CHASSIS_TYPE>
      <CHECKSUM>131071</CHECKSUM>
      <DATELASTLOGGEDUSER>Wed Oct 3 06:56</DATELASTLOGGEDUSER>
      <DEFAULTGATEWAY>192.168.1.1</DEFAULTGATEWAY>
      <DNS>192.168.1.1/172.28.200.20</DNS>
      <ETIME>3</ETIME>
      <IPADDR>192.168.1.119/192.168.122.1/192.168.11.47</IPADDR>
      <LASTLOGGEDUSER>trasher</LASTLOGGEDUSER>
      <MEMORY>7822</MEMORY>
      <NAME>glpixps</NAME>
      <OSCOMMENTS>#1 SMP Thu Sep 20 02:43:23 UTC 2018</OSCOMMENTS>
      <OSNAME>Fedora 28 (Workstation Edition)</OSNAME>
      <OSVERSION>4.18.9-200.fc28.x86_64</OSVERSION>
      <PROCESSORN>1</PROCESSORN>
      <PROCESSORS>2300</PROCESSORS>
      <PROCESSORT>Intel(R) Core(TM) i5-6200U CPU @ 2.30GHz</PROCESSORT>
      <SWAP>7951</SWAP>
      <USERID>trasher</USERID>
      <UUID>4c4c4544-0034-3010-8048-b6c04f503732</UUID>
      <VMSYSTEM>Physical</VMSYSTEM>
      <WORKGROUP>teclib.infra</WORKGROUP>
    </HARDWARE>
    <VERSIONCLIENT>FusionInventory-Inventory_v2.4.1-2.fc28</VERSIONCLIENT>
  </CONTENT>
  <DEVICEID>glpixps.teclib.infra-2018-10-03-08-42-36</DEVICEID>
  <QUERY>INVENTORY</QUERY>
  </REQUEST>",
                'asset' => '{"chassis_type":"Laptop","datelastloggeduser":"Wed Oct 3 06:56","defaultgateway":"192.168.1.1","dns":"192.168.1.1\\/172.28.200.20","lastloggeduser":"trasher","memory":7822,"name":"glpixps","swap":7951,"uuid":"4c4c4544-0034-3010-8048-b6c04f503732","vmsystem":"Physical","workgroup":"teclib.infra","domains_id":"teclib.infra","users_id":0,"contact":"trasher","manufacturers_id":"Dell Inc.","computermodels_id":"XPS 13 9350","serial":"640HP72","mserial":"\\/640HP72\\/CN129636460078\\/","computertypes_id":"Laptop","autoupdatesystems_id":"GLPI Native Inventory","last_inventory_update": "DATE_NOW"}'
            ], [ //only hardware
                'xml' => "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>
<REQUEST>
  <CONTENT>
    <HARDWARE>
      <CHASSIS_TYPE>Laptop</CHASSIS_TYPE>
      <CHECKSUM>131071</CHECKSUM>
      <DATELASTLOGGEDUSER>Wed Oct 3 06:56</DATELASTLOGGEDUSER>
      <DEFAULTGATEWAY>192.168.1.1</DEFAULTGATEWAY>
      <DNS>192.168.1.1/172.28.200.20</DNS>
      <ETIME>3</ETIME>
      <IPADDR>192.168.1.119/192.168.122.1/192.168.11.47</IPADDR>
      <LASTLOGGEDUSER>trasher</LASTLOGGEDUSER>
      <MEMORY>7822</MEMORY>
      <NAME>glpixps</NAME>
      <OSCOMMENTS>#1 SMP Thu Sep 20 02:43:23 UTC 2018</OSCOMMENTS>
      <OSNAME>Fedora 28 (Workstation Edition)</OSNAME>
      <OSVERSION>4.18.9-200.fc28.x86_64</OSVERSION>
      <PROCESSORN>1</PROCESSORN>
      <PROCESSORS>2300</PROCESSORS>
      <PROCESSORT>Intel(R) Core(TM) i5-6200U CPU @ 2.30GHz</PROCESSORT>
      <SWAP>7951</SWAP>
      <USERID>trasher</USERID>
      <UUID>4c4c4544-0034-3010-8048-b6c04f503732</UUID>
      <VMSYSTEM>Physical</VMSYSTEM>
      <WORKGROUP>teclib.infra</WORKGROUP>
    </HARDWARE>
    <VERSIONCLIENT>FusionInventory-Inventory_v2.4.1-2.fc28</VERSIONCLIENT>
  </CONTENT>
  <DEVICEID>glpixps.teclib.infra-2018-10-03-08-42-36</DEVICEID>
  <QUERY>INVENTORY</QUERY>
  </REQUEST>",
                'asset' => '{"chassis_type":"Laptop","datelastloggeduser":"Wed Oct 3 06:56","defaultgateway":"192.168.1.1","dns":"192.168.1.1\\/172.28.200.20","lastloggeduser":"trasher","memory":7822,"name":"glpixps","swap":7951,"uuid":"4c4c4544-0034-3010-8048-b6c04f503732","vmsystem":"Physical","workgroup":"teclib.infra","domains_id":"teclib.infra","users_id":0,"contact":"trasher","computertypes_id":"Laptop","autoupdatesystems_id":"GLPI Native Inventory","last_inventory_update": "DATE_NOW"}'
            ], [ //only bios
                'xml' => "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>
<REQUEST>
  <CONTENT>
    <BIOS>
      <ASSETTAG />  <BDATE>06/02/2016</BDATE>
      <BMANUFACTURER>Dell Inc.</BMANUFACTURER>
      <BVERSION>1.4.3</BVERSION>
      <MMANUFACTURER>Dell Inc.</MMANUFACTURER>
      <MMODEL>07TYC2</MMODEL>
      <MSN>/640HP72/CN129636460078/</MSN>
      <SKUNUMBER>0704</SKUNUMBER>
      <SMANUFACTURER>Dell Inc.</SMANUFACTURER>
      <SMODEL>XPS 13 9350</SMODEL>
      <SSN>640HP72</SSN>
    </BIOS>
    <VERSIONCLIENT>FusionInventory-Inventory_v2.4.1-2.fc28</VERSIONCLIENT>
  </CONTENT>
  <DEVICEID>glpixps.teclib.infra-2018-10-03-08-42-36</DEVICEID>
  <QUERY>INVENTORY</QUERY>
  </REQUEST>",
                'asset' => '{"manufacturers_id":"Dell Inc.","computermodels_id":"XPS 13 9350","serial":"640HP72","mserial":"\\/640HP72\\/CN129636460078\\/","autoupdatesystems_id":"GLPI Native Inventory","last_inventory_update": "DATE_NOW"}'
            ], [ //only bios - with otherserial
                'xml' => "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>
<REQUEST>
  <CONTENT>
    <BIOS>
      <ASSETTAG>SER1234</ASSETTAG>
      <BDATE>06/02/2016</BDATE>
      <BMANUFACTURER>Dell Inc.</BMANUFACTURER>
      <BVERSION>1.4.3</BVERSION>
      <MMANUFACTURER>Dell Inc.</MMANUFACTURER>
      <MMODEL>07TYC2</MMODEL>
      <MSN>/640HP72/CN129636460078/</MSN>
      <SKUNUMBER>0704</SKUNUMBER>
      <SMANUFACTURER>Dell Inc.</SMANUFACTURER>
      <SMODEL>XPS 13 9350</SMODEL>
      <SSN>640HP72</SSN>
    </BIOS>
    <VERSIONCLIENT>FusionInventory-Inventory_v2.4.1-2.fc28</VERSIONCLIENT>
  </CONTENT>
  <DEVICEID>glpixps.teclib.infra-2018-10-03-08-42-36</DEVICEID>
  <QUERY>INVENTORY</QUERY>
  </REQUEST>",
                'asset' => '{"manufacturers_id":"Dell Inc.","computermodels_id":"XPS 13 9350","serial":"640HP72","mserial":"\\/640HP72\\/CN129636460078\\/","otherserial":"SER1234","autoupdatesystems_id":"GLPI Native Inventory","last_inventory_update": "DATE_NOW"}'
            ]
        ];
    }

    /**
     * @dataProvider assetProvider
     */
    public function testPrepare($xml, $asset)
    {
        $date_now = date('Y-m-d H:i:s');
        $_SESSION['glpi_currenttime'] = $date_now;
        $asset = str_replace('DATE_NOW', $date_now, $asset);
        $converter = new \Glpi\Inventory\Converter();
        $data = $converter->convert($xml);
        $json = json_decode($data);

        $computer = getItemByTypeName('Computer', '_test_pc01');
        $main = new \Glpi\Inventory\Asset\Computer($computer, $json);
        $main->setExtraData((array)$json->content);
        $result = $main->prepare();
        $this->object($result[0])->isEqualTo(json_decode($asset));
    }

    public function testHandle()
    {
        $json_str = file_get_contents(self::INV_FIXTURES . 'computer_1.json');
        $json = json_decode($json_str);

        $computer = new \Computer();

        $data = (array)$json->content;
        $inventory = new \Glpi\Inventory\Inventory();
        $this->boolean($inventory->setData($json))->isTrue();

        $agent = new \Agent();
        $this->integer($agent->handleAgent($inventory->extractMetadata()))->isGreaterThan(0);

        $main = new \Glpi\Inventory\Asset\Computer($computer, $json);
        $main->setAgent($agent)->setExtraData($data);
        $result = $main->prepare();
        $this->array($result)->hasSize(1);

        $main->handle();
        $this->boolean($main->areLinksHandled())->isTrue();
    }

    public function testHandleMserial()
    {
        global $DB;

        $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>
<REQUEST>
  <CONTENT>
    <HARDWARE>
      <NAME>glpixps</NAME>
      <UUID>25C1BB60-5BCB-11D9-B18F-5404A6A534C4</UUID>
    </HARDWARE>
    <BIOS>
      <MSN>640HP72</MSN>
      <SSN>000</SSN>
    </BIOS>
    <VERSIONCLIENT>FusionInventory-Inventory_v2.4.1-2.fc28</VERSIONCLIENT>
  </CONTENT>
  <DEVICEID>glpixps.teclib.infra-2018-10-03-08-42-36</DEVICEID>
  <QUERY>INVENTORY</QUERY>
  </REQUEST>";

        $converter = new \Glpi\Inventory\Converter();
        $data = $converter->convert($xml);
        $json = json_decode($data);

        $this->doInventory($json);

        //check matchedlogs
        $criteria = [
            'FROM' => \RuleMatchedLog::getTable(),
            'LEFT JOIN' => [
                \Rule::getTable() => [
                    'ON' => [
                        \RuleMatchedLog::getTable() => 'rules_id',
                        \Rule::getTable() => 'id'
                    ]
                ]
            ],
            'WHERE' => []
        ];
        $iterator = $DB->request($criteria);
        $this->string($iterator->current()['name'])->isIdenticalTo('Computer import (by serial + uuid)');

        //check created agent
        $agents = $DB->request(['FROM' => \Agent::getTable()]);
        $this->integer(count($agents))->isIdenticalTo(1);
        $agent = $agents->current();
        $this->array($agent)
            ->string['deviceid']->isIdenticalTo('glpixps.teclib.infra-2018-10-03-08-42-36')
            ->string['itemtype']->isIdenticalTo('Computer');

        //check created computer
        $computers_id = $agent['items_id'];

        $this->integer($computers_id)->isGreaterThan(0);
        $computer = new \Computer();
        $this->boolean($computer->getFromDB($computers_id))->isTrue();

        //check serial came from "MSN" node.
        $this->string($computer->fields['serial'])->isIdenticalTo('640HP72');

        //Reimport, should not create a new computer
        $this->doInventory($json);

        $agents = $DB->request(['FROM' => \Agent::getTable()]);
        $this->integer(count($agents))->isIdenticalTo(1);
        $agent = $agents->current();
        $this->array($agent)
            ->string['deviceid']->isIdenticalTo('glpixps.teclib.infra-2018-10-03-08-42-36')
            ->string['itemtype']->isIdenticalTo('Computer');

        //check created computer - the same as before
        $this->integer($agent['items_id'])->isIdenticalTo($computers_id);
        $computers_id = $agent['items_id'];

        $this->integer($computers_id)->isGreaterThan(0);
        $computer = new \Computer();
        $this->boolean($computer->getFromDB($computers_id))->isTrue();

        //check serial came from "MSN" node.
        $this->string($computer->fields['serial'])->isIdenticalTo('640HP72');
    }

    public function testHandleMserialOnly()
    {
        global $DB;

        $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>
<REQUEST>
  <CONTENT>
    <HARDWARE>
      <NAME>glpixps</NAME>
      <UUID>25C1BB60-5BCB-11D9-B18F-5404A6A534C4</UUID>
    </HARDWARE>
    <BIOS>
      <MSN>640HP72</MSN>
    </BIOS>
    <VERSIONCLIENT>FusionInventory-Inventory_v2.4.1-2.fc28</VERSIONCLIENT>
  </CONTENT>
  <DEVICEID>glpixps.teclib.infra-2018-10-03-08-42-36</DEVICEID>
  <QUERY>INVENTORY</QUERY>
  </REQUEST>";

        $converter = new \Glpi\Inventory\Converter();
        $data = $converter->convert($xml);
        $json = json_decode($data);

        $this->doInventory($json);

        //check matchedlogs
        $criteria = [
            'FROM' => \RuleMatchedLog::getTable(),
            'LEFT JOIN' => [
                \Rule::getTable() => [
                    'ON' => [
                        \RuleMatchedLog::getTable() => 'rules_id',
                        \Rule::getTable() => 'id'
                    ]
                ]
            ],
            'WHERE' => []
        ];
        $iterator = $DB->request($criteria);
        $this->string($iterator->current()['name'])->isIdenticalTo('Computer import (by serial + uuid)');

        //check created agent
        $agents = $DB->request(['FROM' => \Agent::getTable()]);
        $this->integer(count($agents))->isIdenticalTo(1);
        $agent = $agents->current();
        $this->array($agent)
            ->string['deviceid']->isIdenticalTo('glpixps.teclib.infra-2018-10-03-08-42-36')
            ->string['itemtype']->isIdenticalTo('Computer');

        //check created computer
        $computers_id = $agent['items_id'];

        $this->integer($computers_id)->isGreaterThan(0);
        $computer = new \Computer();
        $this->boolean($computer->getFromDB($computers_id))->isTrue();

        //check serial came from "MSN" node.
        $this->string($computer->fields['serial'])->isIdenticalTo('640HP72');

        //Reimport, should not create a new computer
        $this->doInventory($json);

        $agents = $DB->request(['FROM' => \Agent::getTable()]);
        $this->integer(count($agents))->isIdenticalTo(1);
        $agent = $agents->current();
        $this->array($agent)
            ->string['deviceid']->isIdenticalTo('glpixps.teclib.infra-2018-10-03-08-42-36')
            ->string['itemtype']->isIdenticalTo('Computer');

        //check created computer - the same as before
        $this->integer($agent['items_id'])->isIdenticalTo($computers_id);
        $computers_id = $agent['items_id'];

        $this->integer($computers_id)->isGreaterThan(0);
        $computer = new \Computer();
        $this->boolean($computer->getFromDB($computers_id))->isTrue();

        //check serial came from "MSN" node.
        $this->string($computer->fields['serial'])->isIdenticalTo('640HP72');
    }

    public function testLastBoot()
    {
        global $DB;
        $json_str = file_get_contents(self::INV_FIXTURES . 'computer_1.json');
        $json = json_decode($json_str);

        $this->doInventory($json);

        //check created agent
        $agents = $DB->request(['FROM' => \Agent::getTable()]);
        $this->integer(count($agents))->isIdenticalTo(1);
        $agent = $agents->current();
        $this->array($agent)
            ->string['deviceid']->isIdenticalTo('glpixps-2018-07-09-09-07-13')
            ->string['itemtype']->isIdenticalTo('Computer');

        //check created computer
        $computers_id = $agent['items_id'];

        $this->integer($computers_id)->isGreaterThan(0);
        $computer = new \Computer();
        $this->boolean($computer->getFromDB($computers_id))->isTrue();

        //check last_boot came from "operatingsystem->boot_time" node.
        $this->string($computer->fields['last_boot'])->isIdenticalTo('2020-06-09 07:58:08');
    }
}
