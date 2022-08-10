<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/monitoring/v3/alert.proto

namespace Google\Cloud\Monitoring\V3\AlertPolicy\AlertStrategy;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Control over the rate of notifications sent to this alert policy's
 * notification channels.
 *
 * Generated from protobuf message <code>google.monitoring.v3.AlertPolicy.AlertStrategy.NotificationRateLimit</code>
 */
class NotificationRateLimit extends \Google\Protobuf\Internal\Message
{
    /**
     * Not more than one notification per `period`.
     *
     * Generated from protobuf field <code>.google.protobuf.Duration period = 1;</code>
     */
    private $period = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Protobuf\Duration $period
     *           Not more than one notification per `period`.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Monitoring\V3\Alert::initOnce();
        parent::__construct($data);
    }

    /**
     * Not more than one notification per `period`.
     *
     * Generated from protobuf field <code>.google.protobuf.Duration period = 1;</code>
     * @return \Google\Protobuf\Duration|null
     */
    public function getPeriod()
    {
        return $this->period;
    }

    public function hasPeriod()
    {
        return isset($this->period);
    }

    public function clearPeriod()
    {
        unset($this->period);
    }

    /**
     * Not more than one notification per `period`.
     *
     * Generated from protobuf field <code>.google.protobuf.Duration period = 1;</code>
     * @param \Google\Protobuf\Duration $var
     * @return $this
     */
    public function setPeriod($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Duration::class);
        $this->period = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NotificationRateLimit::class, \Google\Cloud\Monitoring\V3\AlertPolicy_AlertStrategy_NotificationRateLimit::class);

