<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 *
 * Generated from protobuf message <code>google.cloud.compute.v1.ProjectsGetXpnResources</code>
 */
class ProjectsGetXpnResources extends \Google\Protobuf\Internal\Message
{
    /**
     * [Output Only] Type of resource. Always compute#projectsGetXpnResources for lists of service resources (a.k.a service projects)
     *
     * Generated from protobuf field <code>string kind = 3292052;</code>
     */
    private $kind = null;
    /**
     * [Output Only] This token allows you to get the next page of results for list requests. If the number of results is larger than maxResults, use the nextPageToken as a value for the query parameter pageToken in the next list request. Subsequent list requests will have their own nextPageToken to continue paging through the results.
     *
     * Generated from protobuf field <code>string next_page_token = 79797525;</code>
     */
    private $next_page_token = null;
    /**
     * Service resources (a.k.a service projects) attached to this project as their shared VPC host.
     *
     * Generated from protobuf field <code>repeated .google.cloud.compute.v1.XpnResourceId resources = 164412965;</code>
     */
    private $resources;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $kind
     *           [Output Only] Type of resource. Always compute#projectsGetXpnResources for lists of service resources (a.k.a service projects)
     *     @type string $next_page_token
     *           [Output Only] This token allows you to get the next page of results for list requests. If the number of results is larger than maxResults, use the nextPageToken as a value for the query parameter pageToken in the next list request. Subsequent list requests will have their own nextPageToken to continue paging through the results.
     *     @type \Google\Cloud\Compute\V1\XpnResourceId[]|\Google\Protobuf\Internal\RepeatedField $resources
     *           Service resources (a.k.a service projects) attached to this project as their shared VPC host.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Compute\V1\Compute::initOnce();
        parent::__construct($data);
    }

    /**
     * [Output Only] Type of resource. Always compute#projectsGetXpnResources for lists of service resources (a.k.a service projects)
     *
     * Generated from protobuf field <code>string kind = 3292052;</code>
     * @return string
     */
    public function getKind()
    {
        return isset($this->kind) ? $this->kind : '';
    }

    public function hasKind()
    {
        return isset($this->kind);
    }

    public function clearKind()
    {
        unset($this->kind);
    }

    /**
     * [Output Only] Type of resource. Always compute#projectsGetXpnResources for lists of service resources (a.k.a service projects)
     *
     * Generated from protobuf field <code>string kind = 3292052;</code>
     * @param string $var
     * @return $this
     */
    public function setKind($var)
    {
        GPBUtil::checkString($var, True);
        $this->kind = $var;

        return $this;
    }

    /**
     * [Output Only] This token allows you to get the next page of results for list requests. If the number of results is larger than maxResults, use the nextPageToken as a value for the query parameter pageToken in the next list request. Subsequent list requests will have their own nextPageToken to continue paging through the results.
     *
     * Generated from protobuf field <code>string next_page_token = 79797525;</code>
     * @return string
     */
    public function getNextPageToken()
    {
        return isset($this->next_page_token) ? $this->next_page_token : '';
    }

    public function hasNextPageToken()
    {
        return isset($this->next_page_token);
    }

    public function clearNextPageToken()
    {
        unset($this->next_page_token);
    }

    /**
     * [Output Only] This token allows you to get the next page of results for list requests. If the number of results is larger than maxResults, use the nextPageToken as a value for the query parameter pageToken in the next list request. Subsequent list requests will have their own nextPageToken to continue paging through the results.
     *
     * Generated from protobuf field <code>string next_page_token = 79797525;</code>
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
     * Service resources (a.k.a service projects) attached to this project as their shared VPC host.
     *
     * Generated from protobuf field <code>repeated .google.cloud.compute.v1.XpnResourceId resources = 164412965;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getResources()
    {
        return $this->resources;
    }

    /**
     * Service resources (a.k.a service projects) attached to this project as their shared VPC host.
     *
     * Generated from protobuf field <code>repeated .google.cloud.compute.v1.XpnResourceId resources = 164412965;</code>
     * @param \Google\Cloud\Compute\V1\XpnResourceId[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setResources($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Compute\V1\XpnResourceId::class);
        $this->resources = $arr;

        return $this;
    }

}

