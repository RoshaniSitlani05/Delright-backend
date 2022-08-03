<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/managedidentities/v1beta1/resource.proto

namespace Google\Cloud\ManagedIdentities\V1beta1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represents a relationship between two domains. This allows a controller in
 * one domain to authenticate a user in another domain.
 *
 * Generated from protobuf message <code>google.cloud.managedidentities.v1beta1.Trust</code>
 */
class Trust extends \Google\Protobuf\Internal\Message
{
    /**
     * The fully qualified target domain name which will be in trust with the
     * current domain.
     *
     * Generated from protobuf field <code>string target_domain_name = 1;</code>
     */
    private $target_domain_name = '';
    /**
     * The type of trust represented by the trust resource.
     *
     * Generated from protobuf field <code>.google.cloud.managedidentities.v1beta1.Trust.TrustType trust_type = 2;</code>
     */
    private $trust_type = 0;
    /**
     * The trust direction, which decides if the current domain is trusted,
     * trusting, or both.
     *
     * Generated from protobuf field <code>.google.cloud.managedidentities.v1beta1.Trust.TrustDirection trust_direction = 3;</code>
     */
    private $trust_direction = 0;
    /**
     * The trust authentication type, which decides whether the trusted side has
     * forest/domain wide access or selective access to an approved set of
     * resources.
     *
     * Generated from protobuf field <code>bool selective_authentication = 4;</code>
     */
    private $selective_authentication = false;
    /**
     * The target DNS server IP addresses which can resolve the remote domain
     * involved in the trust.
     *
     * Generated from protobuf field <code>repeated string target_dns_ip_addresses = 5;</code>
     */
    private $target_dns_ip_addresses;
    /**
     * Input only. The trust secret used for the handshake
     * with the target domain. It will not be stored.
     *
     * Generated from protobuf field <code>string trust_handshake_secret = 6 [(.google.api.field_behavior) = INPUT_ONLY];</code>
     */
    private $trust_handshake_secret = '';
    /**
     * Output only. The time the instance was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $create_time = null;
    /**
     * Output only. The last update time.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $update_time = null;
    /**
     * Output only. The current state of the trust.
     *
     * Generated from protobuf field <code>.google.cloud.managedidentities.v1beta1.Trust.State state = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $state = 0;
    /**
     * Output only. Additional information about the current state of the
     * trust, if available.
     *
     * Generated from protobuf field <code>string state_description = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $state_description = '';
    /**
     * Output only. The last heartbeat time when the trust was known to be
     * connected.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp last_trust_heartbeat_time = 12 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $last_trust_heartbeat_time = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $target_domain_name
     *           The fully qualified target domain name which will be in trust with the
     *           current domain.
     *     @type int $trust_type
     *           The type of trust represented by the trust resource.
     *     @type int $trust_direction
     *           The trust direction, which decides if the current domain is trusted,
     *           trusting, or both.
     *     @type bool $selective_authentication
     *           The trust authentication type, which decides whether the trusted side has
     *           forest/domain wide access or selective access to an approved set of
     *           resources.
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $target_dns_ip_addresses
     *           The target DNS server IP addresses which can resolve the remote domain
     *           involved in the trust.
     *     @type string $trust_handshake_secret
     *           Input only. The trust secret used for the handshake
     *           with the target domain. It will not be stored.
     *     @type \Google\Protobuf\Timestamp $create_time
     *           Output only. The time the instance was created.
     *     @type \Google\Protobuf\Timestamp $update_time
     *           Output only. The last update time.
     *     @type int $state
     *           Output only. The current state of the trust.
     *     @type string $state_description
     *           Output only. Additional information about the current state of the
     *           trust, if available.
     *     @type \Google\Protobuf\Timestamp $last_trust_heartbeat_time
     *           Output only. The last heartbeat time when the trust was known to be
     *           connected.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Managedidentities\V1Beta1\Resource::initOnce();
        parent::__construct($data);
    }

    /**
     * The fully qualified target domain name which will be in trust with the
     * current domain.
     *
     * Generated from protobuf field <code>string target_domain_name = 1;</code>
     * @return string
     */
    public function getTargetDomainName()
    {
        return $this->target_domain_name;
    }

    /**
     * The fully qualified target domain name which will be in trust with the
     * current domain.
     *
     * Generated from protobuf field <code>string target_domain_name = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setTargetDomainName($var)
    {
        GPBUtil::checkString($var, True);
        $this->target_domain_name = $var;

        return $this;
    }

    /**
     * The type of trust represented by the trust resource.
     *
     * Generated from protobuf field <code>.google.cloud.managedidentities.v1beta1.Trust.TrustType trust_type = 2;</code>
     * @return int
     */
    public function getTrustType()
    {
        return $this->trust_type;
    }

    /**
     * The type of trust represented by the trust resource.
     *
     * Generated from protobuf field <code>.google.cloud.managedidentities.v1beta1.Trust.TrustType trust_type = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setTrustType($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\ManagedIdentities\V1beta1\Trust\TrustType::class);
        $this->trust_type = $var;

        return $this;
    }

    /**
     * The trust direction, which decides if the current domain is trusted,
     * trusting, or both.
     *
     * Generated from protobuf field <code>.google.cloud.managedidentities.v1beta1.Trust.TrustDirection trust_direction = 3;</code>
     * @return int
     */
    public function getTrustDirection()
    {
        return $this->trust_direction;
    }

    /**
     * The trust direction, which decides if the current domain is trusted,
     * trusting, or both.
     *
     * Generated from protobuf field <code>.google.cloud.managedidentities.v1beta1.Trust.TrustDirection trust_direction = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setTrustDirection($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\ManagedIdentities\V1beta1\Trust\TrustDirection::class);
        $this->trust_direction = $var;

        return $this;
    }

    /**
     * The trust authentication type, which decides whether the trusted side has
     * forest/domain wide access or selective access to an approved set of
     * resources.
     *
     * Generated from protobuf field <code>bool selective_authentication = 4;</code>
     * @return bool
     */
    public function getSelectiveAuthentication()
    {
        return $this->selective_authentication;
    }

    /**
     * The trust authentication type, which decides whether the trusted side has
     * forest/domain wide access or selective access to an approved set of
     * resources.
     *
     * Generated from protobuf field <code>bool selective_authentication = 4;</code>
     * @param bool $var
     * @return $this
     */
    public function setSelectiveAuthentication($var)
    {
        GPBUtil::checkBool($var);
        $this->selective_authentication = $var;

        return $this;
    }

    /**
     * The target DNS server IP addresses which can resolve the remote domain
     * involved in the trust.
     *
     * Generated from protobuf field <code>repeated string target_dns_ip_addresses = 5;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getTargetDnsIpAddresses()
    {
        return $this->target_dns_ip_addresses;
    }

    /**
     * The target DNS server IP addresses which can resolve the remote domain
     * involved in the trust.
     *
     * Generated from protobuf field <code>repeated string target_dns_ip_addresses = 5;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setTargetDnsIpAddresses($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->target_dns_ip_addresses = $arr;

        return $this;
    }

    /**
     * Input only. The trust secret used for the handshake
     * with the target domain. It will not be stored.
     *
     * Generated from protobuf field <code>string trust_handshake_secret = 6 [(.google.api.field_behavior) = INPUT_ONLY];</code>
     * @return string
     */
    public function getTrustHandshakeSecret()
    {
        return $this->trust_handshake_secret;
    }

    /**
     * Input only. The trust secret used for the handshake
     * with the target domain. It will not be stored.
     *
     * Generated from protobuf field <code>string trust_handshake_secret = 6 [(.google.api.field_behavior) = INPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setTrustHandshakeSecret($var)
    {
        GPBUtil::checkString($var, True);
        $this->trust_handshake_secret = $var;

        return $this;
    }

    /**
     * Output only. The time the instance was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. The time the instance was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. The last update time.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. The last update time.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. The current state of the trust.
     *
     * Generated from protobuf field <code>.google.cloud.managedidentities.v1beta1.Trust.State state = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Output only. The current state of the trust.
     *
     * Generated from protobuf field <code>.google.cloud.managedidentities.v1beta1.Trust.State state = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setState($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\ManagedIdentities\V1beta1\Trust\State::class);
        $this->state = $var;

        return $this;
    }

    /**
     * Output only. Additional information about the current state of the
     * trust, if available.
     *
     * Generated from protobuf field <code>string state_description = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getStateDescription()
    {
        return $this->state_description;
    }

    /**
     * Output only. Additional information about the current state of the
     * trust, if available.
     *
     * Generated from protobuf field <code>string state_description = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setStateDescription($var)
    {
        GPBUtil::checkString($var, True);
        $this->state_description = $var;

        return $this;
    }

    /**
     * Output only. The last heartbeat time when the trust was known to be
     * connected.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp last_trust_heartbeat_time = 12 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getLastTrustHeartbeatTime()
    {
        return $this->last_trust_heartbeat_time;
    }

    public function hasLastTrustHeartbeatTime()
    {
        return isset($this->last_trust_heartbeat_time);
    }

    public function clearLastTrustHeartbeatTime()
    {
        unset($this->last_trust_heartbeat_time);
    }

    /**
     * Output only. The last heartbeat time when the trust was known to be
     * connected.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp last_trust_heartbeat_time = 12 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setLastTrustHeartbeatTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->last_trust_heartbeat_time = $var;

        return $this;
    }

}
