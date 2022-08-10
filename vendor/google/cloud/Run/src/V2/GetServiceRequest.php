<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/run/v2/service.proto

namespace Google\Cloud\Run\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for obtaining a Service by its full name.
 *
 * Generated from protobuf message <code>google.cloud.run.v2.GetServiceRequest</code>
 */
class GetServiceRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The full name of the Service.
     * Format: projects/{projectnumber}/locations/{location}/services/{service}
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    private $name = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           Required. The full name of the Service.
     *           Format: projects/{projectnumber}/locations/{location}/services/{service}
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Run\V2\Service::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The full name of the Service.
     * Format: projects/{projectnumber}/locations/{location}/services/{service}
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Required. The full name of the Service.
     * Format: projects/{projectnumber}/locations/{location}/services/{service}
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

}

