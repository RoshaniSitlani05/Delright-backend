<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/osconfig/v1/inventory.proto

namespace Google\Cloud\OsConfig\V1\Inventory;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Details related to a Zypper Patch.
 *
 * Generated from protobuf message <code>google.cloud.osconfig.v1.Inventory.ZypperPatch</code>
 */
class ZypperPatch extends \Google\Protobuf\Internal\Message
{
    /**
     * The name of the patch.
     *
     * Generated from protobuf field <code>string patch_name = 5;</code>
     */
    private $patch_name = '';
    /**
     * The category of the patch.
     *
     * Generated from protobuf field <code>string category = 2;</code>
     */
    private $category = '';
    /**
     * The severity specified for this patch
     *
     * Generated from protobuf field <code>string severity = 3;</code>
     */
    private $severity = '';
    /**
     * Any summary information provided about this patch.
     *
     * Generated from protobuf field <code>string summary = 4;</code>
     */
    private $summary = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $patch_name
     *           The name of the patch.
     *     @type string $category
     *           The category of the patch.
     *     @type string $severity
     *           The severity specified for this patch
     *     @type string $summary
     *           Any summary information provided about this patch.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Osconfig\V1\Inventory::initOnce();
        parent::__construct($data);
    }

    /**
     * The name of the patch.
     *
     * Generated from protobuf field <code>string patch_name = 5;</code>
     * @return string
     */
    public function getPatchName()
    {
        return $this->patch_name;
    }

    /**
     * The name of the patch.
     *
     * Generated from protobuf field <code>string patch_name = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setPatchName($var)
    {
        GPBUtil::checkString($var, True);
        $this->patch_name = $var;

        return $this;
    }

    /**
     * The category of the patch.
     *
     * Generated from protobuf field <code>string category = 2;</code>
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * The category of the patch.
     *
     * Generated from protobuf field <code>string category = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setCategory($var)
    {
        GPBUtil::checkString($var, True);
        $this->category = $var;

        return $this;
    }

    /**
     * The severity specified for this patch
     *
     * Generated from protobuf field <code>string severity = 3;</code>
     * @return string
     */
    public function getSeverity()
    {
        return $this->severity;
    }

    /**
     * The severity specified for this patch
     *
     * Generated from protobuf field <code>string severity = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setSeverity($var)
    {
        GPBUtil::checkString($var, True);
        $this->severity = $var;

        return $this;
    }

    /**
     * Any summary information provided about this patch.
     *
     * Generated from protobuf field <code>string summary = 4;</code>
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Any summary information provided about this patch.
     *
     * Generated from protobuf field <code>string summary = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setSummary($var)
    {
        GPBUtil::checkString($var, True);
        $this->summary = $var;

        return $this;
    }

}

