<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/gkemulticloud/v1/azure_service.proto

namespace Google\Cloud\GkeMultiCloud\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Response message for `AzureClusters.CreateAzureNodePool` method.
 *
 * Generated from protobuf message <code>google.cloud.gkemulticloud.v1.CreateAzureNodePoolRequest</code>
 */
class CreateAzureNodePoolRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The [AzureCluster][google.cloud.gkemulticloud.v1.AzureCluster] resource where this node pool will be created.
     * Location names are formatted as `projects/<project-id>/locations/<region>`.
     * See [Resource Names](https://cloud.google.com/apis/design/resource_names)
     * for more details on Google Cloud resource names.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    private $parent = '';
    /**
     * Required. The specification of the [AzureNodePool][google.cloud.gkemulticloud.v1.AzureNodePool] to create.
     *
     * Generated from protobuf field <code>.google.cloud.gkemulticloud.v1.AzureNodePool azure_node_pool = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $azure_node_pool = null;
    /**
     * Required. A client provided ID the resource. Must be unique within the parent
     * resource.
     * The provided ID will be part of the [AzureNodePool][google.cloud.gkemulticloud.v1.AzureNodePool]
     * resource name formatted as
     * `projects/<project-id>/locations/<region>/azureClusters/<cluster-id>/azureNodePools/<node-pool-id>`.
     * Valid characters are `/[a-z][0-9]-/`. Cannot be longer than 40 characters.
     *
     * Generated from protobuf field <code>string azure_node_pool_id = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $azure_node_pool_id = '';
    /**
     * If set, only validate the request, but do not actually create the node
     * pool.
     *
     * Generated from protobuf field <code>bool validate_only = 4;</code>
     */
    private $validate_only = false;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $parent
     *           Required. The [AzureCluster][google.cloud.gkemulticloud.v1.AzureCluster] resource where this node pool will be created.
     *           Location names are formatted as `projects/<project-id>/locations/<region>`.
     *           See [Resource Names](https://cloud.google.com/apis/design/resource_names)
     *           for more details on Google Cloud resource names.
     *     @type \Google\Cloud\GkeMultiCloud\V1\AzureNodePool $azure_node_pool
     *           Required. The specification of the [AzureNodePool][google.cloud.gkemulticloud.v1.AzureNodePool] to create.
     *     @type string $azure_node_pool_id
     *           Required. A client provided ID the resource. Must be unique within the parent
     *           resource.
     *           The provided ID will be part of the [AzureNodePool][google.cloud.gkemulticloud.v1.AzureNodePool]
     *           resource name formatted as
     *           `projects/<project-id>/locations/<region>/azureClusters/<cluster-id>/azureNodePools/<node-pool-id>`.
     *           Valid characters are `/[a-z][0-9]-/`. Cannot be longer than 40 characters.
     *     @type bool $validate_only
     *           If set, only validate the request, but do not actually create the node
     *           pool.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Gkemulticloud\V1\AzureService::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The [AzureCluster][google.cloud.gkemulticloud.v1.AzureCluster] resource where this node pool will be created.
     * Location names are formatted as `projects/<project-id>/locations/<region>`.
     * See [Resource Names](https://cloud.google.com/apis/design/resource_names)
     * for more details on Google Cloud resource names.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Required. The [AzureCluster][google.cloud.gkemulticloud.v1.AzureCluster] resource where this node pool will be created.
     * Location names are formatted as `projects/<project-id>/locations/<region>`.
     * See [Resource Names](https://cloud.google.com/apis/design/resource_names)
     * for more details on Google Cloud resource names.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setParent($var)
    {
        GPBUtil::checkString($var, True);
        $this->parent = $var;

        return $this;
    }

    /**
     * Required. The specification of the [AzureNodePool][google.cloud.gkemulticloud.v1.AzureNodePool] to create.
     *
     * Generated from protobuf field <code>.google.cloud.gkemulticloud.v1.AzureNodePool azure_node_pool = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\GkeMultiCloud\V1\AzureNodePool|null
     */
    public function getAzureNodePool()
    {
        return $this->azure_node_pool;
    }

    public function hasAzureNodePool()
    {
        return isset($this->azure_node_pool);
    }

    public function clearAzureNodePool()
    {
        unset($this->azure_node_pool);
    }

    /**
     * Required. The specification of the [AzureNodePool][google.cloud.gkemulticloud.v1.AzureNodePool] to create.
     *
     * Generated from protobuf field <code>.google.cloud.gkemulticloud.v1.AzureNodePool azure_node_pool = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\GkeMultiCloud\V1\AzureNodePool $var
     * @return $this
     */
    public function setAzureNodePool($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\GkeMultiCloud\V1\AzureNodePool::class);
        $this->azure_node_pool = $var;

        return $this;
    }

    /**
     * Required. A client provided ID the resource. Must be unique within the parent
     * resource.
     * The provided ID will be part of the [AzureNodePool][google.cloud.gkemulticloud.v1.AzureNodePool]
     * resource name formatted as
     * `projects/<project-id>/locations/<region>/azureClusters/<cluster-id>/azureNodePools/<node-pool-id>`.
     * Valid characters are `/[a-z][0-9]-/`. Cannot be longer than 40 characters.
     *
     * Generated from protobuf field <code>string azure_node_pool_id = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getAzureNodePoolId()
    {
        return $this->azure_node_pool_id;
    }

    /**
     * Required. A client provided ID the resource. Must be unique within the parent
     * resource.
     * The provided ID will be part of the [AzureNodePool][google.cloud.gkemulticloud.v1.AzureNodePool]
     * resource name formatted as
     * `projects/<project-id>/locations/<region>/azureClusters/<cluster-id>/azureNodePools/<node-pool-id>`.
     * Valid characters are `/[a-z][0-9]-/`. Cannot be longer than 40 characters.
     *
     * Generated from protobuf field <code>string azure_node_pool_id = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setAzureNodePoolId($var)
    {
        GPBUtil::checkString($var, True);
        $this->azure_node_pool_id = $var;

        return $this;
    }

    /**
     * If set, only validate the request, but do not actually create the node
     * pool.
     *
     * Generated from protobuf field <code>bool validate_only = 4;</code>
     * @return bool
     */
    public function getValidateOnly()
    {
        return $this->validate_only;
    }

    /**
     * If set, only validate the request, but do not actually create the node
     * pool.
     *
     * Generated from protobuf field <code>bool validate_only = 4;</code>
     * @param bool $var
     * @return $this
     */
    public function setValidateOnly($var)
    {
        GPBUtil::checkBool($var);
        $this->validate_only = $var;

        return $this;
    }

}

