<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/baremetalsolution/v2/instance.proto

namespace Google\Cloud\BareMetalSolution\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A server.
 *
 * Generated from protobuf message <code>google.cloud.baremetalsolution.v2.Instance</code>
 */
class Instance extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The resource name of this `Instance`.
     * Resource names are schemeless URIs that follow the conventions in
     * https://cloud.google.com/apis/design/resource_names.
     * Format:
     * `projects/{project}/locations/{location}/instances/{instance}`
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $name = '';
    /**
     * An identifier for the `Instance`, generated by the backend.
     *
     * Generated from protobuf field <code>string id = 11;</code>
     */
    private $id = '';
    /**
     * Output only. Create a time stamp.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $create_time = null;
    /**
     * Output only. Update a time stamp.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $update_time = null;
    /**
     * The server type.
     * [Available server
     * types](https://cloud.google.com/bare-metal/docs/bms-planning#server_configurations)
     *
     * Generated from protobuf field <code>string machine_type = 4;</code>
     */
    private $machine_type = '';
    /**
     * The state of the server.
     *
     * Generated from protobuf field <code>.google.cloud.baremetalsolution.v2.Instance.State state = 5;</code>
     */
    private $state = 0;
    /**
     * True if you enable hyperthreading for the server, otherwise false.
     * The default value is false.
     *
     * Generated from protobuf field <code>bool hyperthreading_enabled = 6;</code>
     */
    private $hyperthreading_enabled = false;
    /**
     * Labels as key value pairs.
     *
     * Generated from protobuf field <code>map<string, string> labels = 7;</code>
     */
    private $labels;
    /**
     * List of LUNs associated with this server.
     *
     * Generated from protobuf field <code>repeated .google.cloud.baremetalsolution.v2.Lun luns = 8;</code>
     */
    private $luns;
    /**
     * List of networks associated with this server.
     *
     * Generated from protobuf field <code>repeated .google.cloud.baremetalsolution.v2.Network networks = 9;</code>
     */
    private $networks;
    /**
     * True if the interactive serial console feature is enabled for the instance,
     * false otherwise.
     * The default value is false.
     *
     * Generated from protobuf field <code>bool interactive_serial_console_enabled = 10;</code>
     */
    private $interactive_serial_console_enabled = false;
    /**
     * The OS image currently installed on the server.
     *
     * Generated from protobuf field <code>string os_image = 12;</code>
     */
    private $os_image = '';
    /**
     * Immutable. Pod name.
     * Pod is an independent part of infrastructure.
     * Instance can be connected to the assets (networks, volumes) allocated
     * in the same pod only.
     *
     * Generated from protobuf field <code>string pod = 13 [(.google.api.field_behavior) = IMMUTABLE];</code>
     */
    private $pod = '';
    /**
     * Instance network template name. For eg, bondaa-bondaa, bondab-nic, etc.
     * Generally, the template name follows the syntax of
     * "bond<bond_mode>" or "nic".
     *
     * Generated from protobuf field <code>string network_template = 14 [(.google.api.resource_reference) = {</code>
     */
    private $network_template = '';
    /**
     * List of logical interfaces for the instance. The number of logical
     * interfaces will be the same as number of hardware bond/nic on the chosen
     * network template. For the non-multivlan configurations (for eg, existing
     * servers) that use existing default network template (bondaa-bondaa), both
     * the Instance.networks field and the Instance.logical_interfaces fields will
     * be filled to ensure backward compatibility. For the others, only
     * Instance.logical_interfaces will be filled.
     *
     * Generated from protobuf field <code>repeated .google.cloud.baremetalsolution.v2.LogicalInterface logical_interfaces = 15;</code>
     */
    private $logical_interfaces;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           Output only. The resource name of this `Instance`.
     *           Resource names are schemeless URIs that follow the conventions in
     *           https://cloud.google.com/apis/design/resource_names.
     *           Format:
     *           `projects/{project}/locations/{location}/instances/{instance}`
     *     @type string $id
     *           An identifier for the `Instance`, generated by the backend.
     *     @type \Google\Protobuf\Timestamp $create_time
     *           Output only. Create a time stamp.
     *     @type \Google\Protobuf\Timestamp $update_time
     *           Output only. Update a time stamp.
     *     @type string $machine_type
     *           The server type.
     *           [Available server
     *           types](https://cloud.google.com/bare-metal/docs/bms-planning#server_configurations)
     *     @type int $state
     *           The state of the server.
     *     @type bool $hyperthreading_enabled
     *           True if you enable hyperthreading for the server, otherwise false.
     *           The default value is false.
     *     @type array|\Google\Protobuf\Internal\MapField $labels
     *           Labels as key value pairs.
     *     @type \Google\Cloud\BareMetalSolution\V2\Lun[]|\Google\Protobuf\Internal\RepeatedField $luns
     *           List of LUNs associated with this server.
     *     @type \Google\Cloud\BareMetalSolution\V2\Network[]|\Google\Protobuf\Internal\RepeatedField $networks
     *           List of networks associated with this server.
     *     @type bool $interactive_serial_console_enabled
     *           True if the interactive serial console feature is enabled for the instance,
     *           false otherwise.
     *           The default value is false.
     *     @type string $os_image
     *           The OS image currently installed on the server.
     *     @type string $pod
     *           Immutable. Pod name.
     *           Pod is an independent part of infrastructure.
     *           Instance can be connected to the assets (networks, volumes) allocated
     *           in the same pod only.
     *     @type string $network_template
     *           Instance network template name. For eg, bondaa-bondaa, bondab-nic, etc.
     *           Generally, the template name follows the syntax of
     *           "bond<bond_mode>" or "nic".
     *     @type \Google\Cloud\BareMetalSolution\V2\LogicalInterface[]|\Google\Protobuf\Internal\RepeatedField $logical_interfaces
     *           List of logical interfaces for the instance. The number of logical
     *           interfaces will be the same as number of hardware bond/nic on the chosen
     *           network template. For the non-multivlan configurations (for eg, existing
     *           servers) that use existing default network template (bondaa-bondaa), both
     *           the Instance.networks field and the Instance.logical_interfaces fields will
     *           be filled to ensure backward compatibility. For the others, only
     *           Instance.logical_interfaces will be filled.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Baremetalsolution\V2\Instance::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The resource name of this `Instance`.
     * Resource names are schemeless URIs that follow the conventions in
     * https://cloud.google.com/apis/design/resource_names.
     * Format:
     * `projects/{project}/locations/{location}/instances/{instance}`
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Output only. The resource name of this `Instance`.
     * Resource names are schemeless URIs that follow the conventions in
     * https://cloud.google.com/apis/design/resource_names.
     * Format:
     * `projects/{project}/locations/{location}/instances/{instance}`
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * An identifier for the `Instance`, generated by the backend.
     *
     * Generated from protobuf field <code>string id = 11;</code>
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * An identifier for the `Instance`, generated by the backend.
     *
     * Generated from protobuf field <code>string id = 11;</code>
     * @param string $var
     * @return $this
     */
    public function setId($var)
    {
        GPBUtil::checkString($var, True);
        $this->id = $var;

        return $this;
    }

    /**
     * Output only. Create a time stamp.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    public function hasCreateTime()
    {
        return isset($this->create_time);
    }

    public function clearCreateTime()
    {
        unset($this->create_time);
    }

    /**
     * Output only. Create a time stamp.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setCreateTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->create_time = $var;

        return $this;
    }

    /**
     * Output only. Update a time stamp.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getUpdateTime()
    {
        return $this->update_time;
    }

    public function hasUpdateTime()
    {
        return isset($this->update_time);
    }

    public function clearUpdateTime()
    {
        unset($this->update_time);
    }

    /**
     * Output only. Update a time stamp.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setUpdateTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->update_time = $var;

        return $this;
    }

    /**
     * The server type.
     * [Available server
     * types](https://cloud.google.com/bare-metal/docs/bms-planning#server_configurations)
     *
     * Generated from protobuf field <code>string machine_type = 4;</code>
     * @return string
     */
    public function getMachineType()
    {
        return $this->machine_type;
    }

    /**
     * The server type.
     * [Available server
     * types](https://cloud.google.com/bare-metal/docs/bms-planning#server_configurations)
     *
     * Generated from protobuf field <code>string machine_type = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setMachineType($var)
    {
        GPBUtil::checkString($var, True);
        $this->machine_type = $var;

        return $this;
    }

    /**
     * The state of the server.
     *
     * Generated from protobuf field <code>.google.cloud.baremetalsolution.v2.Instance.State state = 5;</code>
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * The state of the server.
     *
     * Generated from protobuf field <code>.google.cloud.baremetalsolution.v2.Instance.State state = 5;</code>
     * @param int $var
     * @return $this
     */
    public function setState($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\BareMetalSolution\V2\Instance\State::class);
        $this->state = $var;

        return $this;
    }

    /**
     * True if you enable hyperthreading for the server, otherwise false.
     * The default value is false.
     *
     * Generated from protobuf field <code>bool hyperthreading_enabled = 6;</code>
     * @return bool
     */
    public function getHyperthreadingEnabled()
    {
        return $this->hyperthreading_enabled;
    }

    /**
     * True if you enable hyperthreading for the server, otherwise false.
     * The default value is false.
     *
     * Generated from protobuf field <code>bool hyperthreading_enabled = 6;</code>
     * @param bool $var
     * @return $this
     */
    public function setHyperthreadingEnabled($var)
    {
        GPBUtil::checkBool($var);
        $this->hyperthreading_enabled = $var;

        return $this;
    }

    /**
     * Labels as key value pairs.
     *
     * Generated from protobuf field <code>map<string, string> labels = 7;</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * Labels as key value pairs.
     *
     * Generated from protobuf field <code>map<string, string> labels = 7;</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setLabels($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::STRING);
        $this->labels = $arr;

        return $this;
    }

    /**
     * List of LUNs associated with this server.
     *
     * Generated from protobuf field <code>repeated .google.cloud.baremetalsolution.v2.Lun luns = 8;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getLuns()
    {
        return $this->luns;
    }

    /**
     * List of LUNs associated with this server.
     *
     * Generated from protobuf field <code>repeated .google.cloud.baremetalsolution.v2.Lun luns = 8;</code>
     * @param \Google\Cloud\BareMetalSolution\V2\Lun[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setLuns($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\BareMetalSolution\V2\Lun::class);
        $this->luns = $arr;

        return $this;
    }

    /**
     * List of networks associated with this server.
     *
     * Generated from protobuf field <code>repeated .google.cloud.baremetalsolution.v2.Network networks = 9;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getNetworks()
    {
        return $this->networks;
    }

    /**
     * List of networks associated with this server.
     *
     * Generated from protobuf field <code>repeated .google.cloud.baremetalsolution.v2.Network networks = 9;</code>
     * @param \Google\Cloud\BareMetalSolution\V2\Network[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setNetworks($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\BareMetalSolution\V2\Network::class);
        $this->networks = $arr;

        return $this;
    }

    /**
     * True if the interactive serial console feature is enabled for the instance,
     * false otherwise.
     * The default value is false.
     *
     * Generated from protobuf field <code>bool interactive_serial_console_enabled = 10;</code>
     * @return bool
     */
    public function getInteractiveSerialConsoleEnabled()
    {
        return $this->interactive_serial_console_enabled;
    }

    /**
     * True if the interactive serial console feature is enabled for the instance,
     * false otherwise.
     * The default value is false.
     *
     * Generated from protobuf field <code>bool interactive_serial_console_enabled = 10;</code>
     * @param bool $var
     * @return $this
     */
    public function setInteractiveSerialConsoleEnabled($var)
    {
        GPBUtil::checkBool($var);
        $this->interactive_serial_console_enabled = $var;

        return $this;
    }

    /**
     * The OS image currently installed on the server.
     *
     * Generated from protobuf field <code>string os_image = 12;</code>
     * @return string
     */
    public function getOsImage()
    {
        return $this->os_image;
    }

    /**
     * The OS image currently installed on the server.
     *
     * Generated from protobuf field <code>string os_image = 12;</code>
     * @param string $var
     * @return $this
     */
    public function setOsImage($var)
    {
        GPBUtil::checkString($var, True);
        $this->os_image = $var;

        return $this;
    }

    /**
     * Immutable. Pod name.
     * Pod is an independent part of infrastructure.
     * Instance can be connected to the assets (networks, volumes) allocated
     * in the same pod only.
     *
     * Generated from protobuf field <code>string pod = 13 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @return string
     */
    public function getPod()
    {
        return $this->pod;
    }

    /**
     * Immutable. Pod name.
     * Pod is an independent part of infrastructure.
     * Instance can be connected to the assets (networks, volumes) allocated
     * in the same pod only.
     *
     * Generated from protobuf field <code>string pod = 13 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @param string $var
     * @return $this
     */
    public function setPod($var)
    {
        GPBUtil::checkString($var, True);
        $this->pod = $var;

        return $this;
    }

    /**
     * Instance network template name. For eg, bondaa-bondaa, bondab-nic, etc.
     * Generally, the template name follows the syntax of
     * "bond<bond_mode>" or "nic".
     *
     * Generated from protobuf field <code>string network_template = 14 [(.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getNetworkTemplate()
    {
        return $this->network_template;
    }

    /**
     * Instance network template name. For eg, bondaa-bondaa, bondab-nic, etc.
     * Generally, the template name follows the syntax of
     * "bond<bond_mode>" or "nic".
     *
     * Generated from protobuf field <code>string network_template = 14 [(.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setNetworkTemplate($var)
    {
        GPBUtil::checkString($var, True);
        $this->network_template = $var;

        return $this;
    }

    /**
     * List of logical interfaces for the instance. The number of logical
     * interfaces will be the same as number of hardware bond/nic on the chosen
     * network template. For the non-multivlan configurations (for eg, existing
     * servers) that use existing default network template (bondaa-bondaa), both
     * the Instance.networks field and the Instance.logical_interfaces fields will
     * be filled to ensure backward compatibility. For the others, only
     * Instance.logical_interfaces will be filled.
     *
     * Generated from protobuf field <code>repeated .google.cloud.baremetalsolution.v2.LogicalInterface logical_interfaces = 15;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getLogicalInterfaces()
    {
        return $this->logical_interfaces;
    }

    /**
     * List of logical interfaces for the instance. The number of logical
     * interfaces will be the same as number of hardware bond/nic on the chosen
     * network template. For the non-multivlan configurations (for eg, existing
     * servers) that use existing default network template (bondaa-bondaa), both
     * the Instance.networks field and the Instance.logical_interfaces fields will
     * be filled to ensure backward compatibility. For the others, only
     * Instance.logical_interfaces will be filled.
     *
     * Generated from protobuf field <code>repeated .google.cloud.baremetalsolution.v2.LogicalInterface logical_interfaces = 15;</code>
     * @param \Google\Cloud\BareMetalSolution\V2\LogicalInterface[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setLogicalInterfaces($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\BareMetalSolution\V2\LogicalInterface::class);
        $this->logical_interfaces = $arr;

        return $this;
    }

}
