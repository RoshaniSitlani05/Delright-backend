<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/channel/v1/service.proto

namespace Google\Cloud\Channel\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for [CloudChannelService.SuspendEntitlement][google.cloud.channel.v1.CloudChannelService.SuspendEntitlement].
 *
 * Generated from protobuf message <code>google.cloud.channel.v1.SuspendEntitlementRequest</code>
 */
class SuspendEntitlementRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The resource name of the entitlement to suspend.
     * Name uses the format:
     * accounts/{account_id}/customers/{customer_id}/entitlements/{entitlement_id}
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $name = '';
    /**
     * Optional. You can specify an optional unique request ID, and if you need to retry
     * your request, the server will know to ignore the request if it's complete.
     * For example, you make an initial request and the request times out. If you
     * make the request again with the same request ID, the server can check if
     * it received the original operation with the same request ID. If it did, it
     * will ignore the second request.
     * The request ID must be a valid [UUID](https://tools.ietf.org/html/rfc4122)
     * with the exception that zero UUID is not supported
     * (`00000000-0000-0000-0000-000000000000`).
     *
     * Generated from protobuf field <code>string request_id = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $request_id = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           Required. The resource name of the entitlement to suspend.
     *           Name uses the format:
     *           accounts/{account_id}/customers/{customer_id}/entitlements/{entitlement_id}
     *     @type string $request_id
     *           Optional. You can specify an optional unique request ID, and if you need to retry
     *           your request, the server will know to ignore the request if it's complete.
     *           For example, you make an initial request and the request times out. If you
     *           make the request again with the same request ID, the server can check if
     *           it received the original operation with the same request ID. If it did, it
     *           will ignore the second request.
     *           The request ID must be a valid [UUID](https://tools.ietf.org/html/rfc4122)
     *           with the exception that zero UUID is not supported
     *           (`00000000-0000-0000-0000-000000000000`).
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Channel\V1\Service::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The resource name of the entitlement to suspend.
     * Name uses the format:
     * accounts/{account_id}/customers/{customer_id}/entitlements/{entitlement_id}
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Required. The resource name of the entitlement to suspend.
     * Name uses the format:
     * accounts/{account_id}/customers/{customer_id}/entitlements/{entitlement_id}
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED];</code>
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
     * Optional. You can specify an optional unique request ID, and if you need to retry
     * your request, the server will know to ignore the request if it's complete.
     * For example, you make an initial request and the request times out. If you
     * make the request again with the same request ID, the server can check if
     * it received the original operation with the same request ID. If it did, it
     * will ignore the second request.
     * The request ID must be a valid [UUID](https://tools.ietf.org/html/rfc4122)
     * with the exception that zero UUID is not supported
     * (`00000000-0000-0000-0000-000000000000`).
     *
     * Generated from protobuf field <code>string request_id = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getRequestId()
    {
        return $this->request_id;
    }

    /**
     * Optional. You can specify an optional unique request ID, and if you need to retry
     * your request, the server will know to ignore the request if it's complete.
     * For example, you make an initial request and the request times out. If you
     * make the request again with the same request ID, the server can check if
     * it received the original operation with the same request ID. If it did, it
     * will ignore the second request.
     * The request ID must be a valid [UUID](https://tools.ietf.org/html/rfc4122)
     * with the exception that zero UUID is not supported
     * (`00000000-0000-0000-0000-000000000000`).
     *
     * Generated from protobuf field <code>string request_id = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setRequestId($var)
    {
        GPBUtil::checkString($var, True);
        $this->request_id = $var;

        return $this;
    }

}
