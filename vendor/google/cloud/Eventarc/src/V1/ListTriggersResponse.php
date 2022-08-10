<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/eventarc/v1/eventarc.proto

namespace Google\Cloud\Eventarc\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The response message for the `ListTriggers` method.
 *
 * Generated from protobuf message <code>google.cloud.eventarc.v1.ListTriggersResponse</code>
 */
class ListTriggersResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * The requested triggers, up to the number specified in `page_size`.
     *
     * Generated from protobuf field <code>repeated .google.cloud.eventarc.v1.Trigger triggers = 1;</code>
     */
    private $triggers;
    /**
     * A page token that can be sent to ListTriggers to request the next page.
     * If this is empty, then there are no more pages.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     */
    private $next_page_token = '';
    /**
     * Unreachable resources, if any.
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
     *     @type \Google\Cloud\Eventarc\V1\Trigger[]|\Google\Protobuf\Internal\RepeatedField $triggers
     *           The requested triggers, up to the number specified in `page_size`.
     *     @type string $next_page_token
     *           A page token that can be sent to ListTriggers to request the next page.
     *           If this is empty, then there are no more pages.
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $unreachable
     *           Unreachable resources, if any.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Eventarc\V1\Eventarc::initOnce();
        parent::__construct($data);
    }

    /**
     * The requested triggers, up to the number specified in `page_size`.
     *
     * Generated from protobuf field <code>repeated .google.cloud.eventarc.v1.Trigger triggers = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getTriggers()
    {
        return $this->triggers;
    }

    /**
     * The requested triggers, up to the number specified in `page_size`.
     *
     * Generated from protobuf field <code>repeated .google.cloud.eventarc.v1.Trigger triggers = 1;</code>
     * @param \Google\Cloud\Eventarc\V1\Trigger[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setTriggers($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Eventarc\V1\Trigger::class);
        $this->triggers = $arr;

        return $this;
    }

    /**
     * A page token that can be sent to ListTriggers to request the next page.
     * If this is empty, then there are no more pages.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     * @return string
     */
    public function getNextPageToken()
    {
        return $this->next_page_token;
    }

    /**
     * A page token that can be sent to ListTriggers to request the next page.
     * If this is empty, then there are no more pages.
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
     * Unreachable resources, if any.
     *
     * Generated from protobuf field <code>repeated string unreachable = 3;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getUnreachable()
    {
        return $this->unreachable;
    }

    /**
     * Unreachable resources, if any.
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

