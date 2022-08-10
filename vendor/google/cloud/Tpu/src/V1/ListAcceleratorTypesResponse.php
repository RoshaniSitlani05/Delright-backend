<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/tpu/v1/cloud_tpu.proto

namespace Google\Cloud\Tpu\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Response for [ListAcceleratorTypes][google.cloud.tpu.v1.Tpu.ListAcceleratorTypes].
 *
 * Generated from protobuf message <code>google.cloud.tpu.v1.ListAcceleratorTypesResponse</code>
 */
class ListAcceleratorTypesResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * The listed nodes.
     *
     * Generated from protobuf field <code>repeated .google.cloud.tpu.v1.AcceleratorType accelerator_types = 1;</code>
     */
    private $accelerator_types;
    /**
     * The next page token or empty if none.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     */
    private $next_page_token = '';
    /**
     * Locations that could not be reached.
     *
     * Generated from protobuf field <code>repeated string unreachable = 3;</code>
     */
    private $unreachable;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\Tpu\V1\AcceleratorType[]|\Google\Protobuf\Internal\RepeatedField $accelerator_types
     *           The listed nodes.
     *     @type string $next_page_token
     *           The next page token or empty if none.
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $unreachable
     *           Locations that could not be reached.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Tpu\V1\CloudTpu::initOnce();
        parent::__construct($data);
    }

    /**
     * The listed nodes.
     *
     * Generated from protobuf field <code>repeated .google.cloud.tpu.v1.AcceleratorType accelerator_types = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getAcceleratorTypes()
    {
        return $this->accelerator_types;
    }

    /**
     * The listed nodes.
     *
     * Generated from protobuf field <code>repeated .google.cloud.tpu.v1.AcceleratorType accelerator_types = 1;</code>
     * @param \Google\Cloud\Tpu\V1\AcceleratorType[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setAcceleratorTypes($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Tpu\V1\AcceleratorType::class);
        $this->accelerator_types = $arr;

        return $this;
    }

    /**
     * The next page token or empty if none.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     * @return string
     */
    public function getNextPageToken()
    {
        return $this->next_page_token;
    }

    /**
     * The next page token or empty if none.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setNextPageToken($var)
    {
        GPBUtil::checkString($var, True);
        $this->next_page_token = $var;

        return $this;
    }

    /**
     * Locations that could not be reached.
     *
     * Generated from protobuf field <code>repeated string unreachable = 3;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getUnreachable()
    {
        return $this->unreachable;
    }

    /**
     * Locations that could not be reached.
     *
     * Generated from protobuf field <code>repeated string unreachable = 3;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setUnreachable($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->unreachable = $arr;

        return $this;
    }

}

