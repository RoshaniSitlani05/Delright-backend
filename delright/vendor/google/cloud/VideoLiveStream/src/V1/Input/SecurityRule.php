<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/video/livestream/v1/resources.proto

namespace Google\Cloud\Video\LiveStream\V1\Input;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Security rules for access control. Each field represents one security rule.
 * Only when the source of the input stream satisfies all the fields, this
 * input stream can be accepted.
 *
 * Generated from protobuf message <code>google.cloud.video.livestream.v1.Input.SecurityRule</code>
 */
class SecurityRule extends \Google\Protobuf\Internal\Message
{
    /**
     * At least one ip range must match unless none specified. The IP range is
     * defined by CIDR block: for example, `192.0.1.0/24` for a range and
     * `192.0.1.0/32` for a single IP address.
     *
     * Generated from protobuf field <code>repeated string ip_ranges = 1;</code>
     */
    private $ip_ranges;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $ip_ranges
     *           At least one ip range must match unless none specified. The IP range is
     *           defined by CIDR block: for example, `192.0.1.0/24` for a range and
     *           `192.0.1.0/32` for a single IP address.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Video\Livestream\V1\Resources::initOnce();
        parent::__construct($data);
    }

    /**
     * At least one ip range must match unless none specified. The IP range is
     * defined by CIDR block: for example, `192.0.1.0/24` for a range and
     * `192.0.1.0/32` for a single IP address.
     *
     * Generated from protobuf field <code>repeated string ip_ranges = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getIpRanges()
    {
        return $this->ip_ranges;
    }

    /**
     * At least one ip range must match unless none specified. The IP range is
     * defined by CIDR block: for example, `192.0.1.0/24` for a range and
     * `192.0.1.0/32` for a single IP address.
     *
     * Generated from protobuf field <code>repeated string ip_ranges = 1;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setIpRanges($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->ip_ranges = $arr;

        return $this;
    }

}


