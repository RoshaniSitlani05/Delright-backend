<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/security/privateca/v1/service.proto

namespace Google\Cloud\Security\PrivateCA\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for
 * [CertificateAuthorityService.DeleteCertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthorityService.DeleteCertificateAuthority].
 *
 * Generated from protobuf message <code>google.cloud.security.privateca.v1.DeleteCertificateAuthorityRequest</code>
 */
class DeleteCertificateAuthorityRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The resource name for this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] in the
     * format `projects/&#42;&#47;locations/&#42;&#47;caPools/&#42;&#47;certificateAuthorities/&#42;`.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    private $name = '';
    /**
     * Optional. An ID to identify requests. Specify a unique request ID so that if you must
     * retry your request, the server will know to ignore the request if it has
     * already been completed. The server will guarantee that for at least 60
     * minutes since the first request.
     * For example, consider a situation where you make an initial request and t
     * he request times out. If you make the request again with the same request
     * ID, the server can check if original operation with the same request ID
     * was received, and if so, will ignore the second request. This prevents
     * clients from accidentally creating duplicate commitments.
     * The request ID must be a valid UUID with the exception that zero UUID is
     * not supported (00000000-0000-0000-0000-000000000000).
     *
     * Generated from protobuf field <code>string request_id = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $request_id = '';
    /**
     * Optional. This field allows the CA to be deleted even if the CA has
     * active certs. Active certs include both unrevoked and unexpired certs.
     *
     * Generated from protobuf field <code>bool ignore_active_certificates = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $ignore_active_certificates = false;
    /**
     * Optional. If this flag is set, the Certificate Authority will be deleted as soon as
     * possible without a 30-day grace period where undeletion would have been
     * allowed. If you proceed, there will be no way to recover this CA.
     *
     * Generated from protobuf field <code>bool skip_grace_period = 5 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $skip_grace_period = false;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           Required. The resource name for this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] in the
     *           format `projects/&#42;&#47;locations/&#42;&#47;caPools/&#42;&#47;certificateAuthorities/&#42;`.
     *     @type string $request_id
     *           Optional. An ID to identify requests. Specify a unique request ID so that if you must
     *           retry your request, the server will know to ignore the request if it has
     *           already been completed. The server will guarantee that for at least 60
     *           minutes since the first request.
     *           For example, consider a situation where you make an initial request and t
     *           he request times out. If you make the request again with the same request
     *           ID, the server can check if original operation with the same request ID
     *           was received, and if so, will ignore the second request. This prevents
     *           clients from accidentally creating duplicate commitments.
     *           The request ID must be a valid UUID with the exception that zero UUID is
     *           not supported (00000000-0000-0000-0000-000000000000).
     *     @type bool $ignore_active_certificates
     *           Optional. This field allows the CA to be deleted even if the CA has
     *           active certs. Active certs include both unrevoked and unexpired certs.
     *     @type bool $skip_grace_period
     *           Optional. If this flag is set, the Certificate Authority will be deleted as soon as
     *           possible without a 30-day grace period where undeletion would have been
     *           allowed. If you proceed, there will be no way to recover this CA.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Security\Privateca\V1\Service::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The resource name for this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] in the
     * format `projects/&#42;&#47;locations/&#42;&#47;caPools/&#42;&#47;certificateAuthorities/&#42;`.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Required. The resource name for this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] in the
     * format `projects/&#42;&#47;locations/&#42;&#47;caPools/&#42;&#47;certificateAuthorities/&#42;`.
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

    /**
     * Optional. An ID to identify requests. Specify a unique request ID so that if you must
     * retry your request, the server will know to ignore the request if it has
     * already been completed. The server will guarantee that for at least 60
     * minutes since the first request.
     * For example, consider a situation where you make an initial request and t
     * he request times out. If you make the request again with the same request
     * ID, the server can check if original operation with the same request ID
     * was received, and if so, will ignore the second request. This prevents
     * clients from accidentally creating duplicate commitments.
     * The request ID must be a valid UUID with the exception that zero UUID is
     * not supported (00000000-0000-0000-0000-000000000000).
     *
     * Generated from protobuf field <code>string request_id = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getRequestId()
    {
        return $this->request_id;
    }

    /**
     * Optional. An ID to identify requests. Specify a unique request ID so that if you must
     * retry your request, the server will know to ignore the request if it has
     * already been completed. The server will guarantee that for at least 60
     * minutes since the first request.
     * For example, consider a situation where you make an initial request and t
     * he request times out. If you make the request again with the same request
     * ID, the server can check if original operation with the same request ID
     * was received, and if so, will ignore the second request. This prevents
     * clients from accidentally creating duplicate commitments.
     * The request ID must be a valid UUID with the exception that zero UUID is
     * not supported (00000000-0000-0000-0000-000000000000).
     *
     * Generated from protobuf field <code>string request_id = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setRequestId($var)
    {
        GPBUtil::checkString($var, True);
        $this->request_id = $var;

        return $this;
    }

    /**
     * Optional. This field allows the CA to be deleted even if the CA has
     * active certs. Active certs include both unrevoked and unexpired certs.
     *
     * Generated from protobuf field <code>bool ignore_active_certificates = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return bool
     */
    public function getIgnoreActiveCertificates()
    {
        return $this->ignore_active_certificates;
    }

    /**
     * Optional. This field allows the CA to be deleted even if the CA has
     * active certs. Active certs include both unrevoked and unexpired certs.
     *
     * Generated from protobuf field <code>bool ignore_active_certificates = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param bool $var
     * @return $this
     */
    public function setIgnoreActiveCertificates($var)
    {
        GPBUtil::checkBool($var);
        $this->ignore_active_certificates = $var;

        return $this;
    }

    /**
     * Optional. If this flag is set, the Certificate Authority will be deleted as soon as
     * possible without a 30-day grace period where undeletion would have been
     * allowed. If you proceed, there will be no way to recover this CA.
     *
     * Generated from protobuf field <code>bool skip_grace_period = 5 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return bool
     */
    public function getSkipGracePeriod()
    {
        return $this->skip_grace_period;
    }

    /**
     * Optional. If this flag is set, the Certificate Authority will be deleted as soon as
     * possible without a 30-day grace period where undeletion would have been
     * allowed. If you proceed, there will be no way to recover this CA.
     *
     * Generated from protobuf field <code>bool skip_grace_period = 5 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param bool $var
     * @return $this
     */
    public function setSkipGracePeriod($var)
    {
        GPBUtil::checkBool($var);
        $this->skip_grace_period = $var;

        return $this;
    }

}

