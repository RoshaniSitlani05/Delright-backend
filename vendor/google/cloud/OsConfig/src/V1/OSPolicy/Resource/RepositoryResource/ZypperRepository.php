<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/osconfig/v1/os_policy.proto

namespace Google\Cloud\OsConfig\V1\OSPolicy\Resource\RepositoryResource;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represents a single zypper package repository. These are added to a
 * repo file that is managed at
 * `/etc/zypp/repos.d/google_osconfig.repo`.
 *
 * Generated from protobuf message <code>google.cloud.osconfig.v1.OSPolicy.Resource.RepositoryResource.ZypperRepository</code>
 */
class ZypperRepository extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. A one word, unique name for this repository. This is the
     * `repo id` in the zypper config file and also the `display_name` if
     * `display_name` is omitted. This id is also used as the unique
     * identifier when checking for GuestPolicy conflicts.
     *
     * Generated from protobuf field <code>string id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $id = '';
    /**
     * The display name of the repository.
     *
     * Generated from protobuf field <code>string display_name = 2;</code>
     */
    private $display_name = '';
    /**
     * Required. The location of the repository directory.
     *
     * Generated from protobuf field <code>string base_url = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $base_url = '';
    /**
     * URIs of GPG keys.
     *
     * Generated from protobuf field <code>repeated string gpg_keys = 4;</code>
     */
    private $gpg_keys;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $id
     *           Required. A one word, unique name for this repository. This is the
     *           `repo id` in the zypper config file and also the `display_name` if
     *           `display_name` is omitted. This id is also used as the unique
     *           identifier when checking for GuestPolicy conflicts.
     *     @type string $display_name
     *           The display name of the repository.
     *     @type string $base_url
     *           Required. The location of the repository directory.
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $gpg_keys
     *           URIs of GPG keys.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Osconfig\V1\OsPolicy::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. A one word, unique name for this repository. This is the
     * `repo id` in the zypper config file and also the `display_name` if
     * `display_name` is omitted. This id is also used as the unique
     * identifier when checking for GuestPolicy conflicts.
     *
     * Generated from protobuf field <code>string id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Required. A one word, unique name for this repository. This is the
     * `repo id` in the zypper config file and also the `display_name` if
     * `display_name` is omitted. This id is also used as the unique
     * identifier when checking for GuestPolicy conflicts.
     *
     * Generated from protobuf field <code>string id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setId($var)
    {
        GPBUtil::checkString($var, True);
        $this->id = $var;

        return $this;
    }

    /**
     * The display name of the repository.
     *
     * Generated from protobuf field <code>string display_name = 2;</code>
     * @return string
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * The display name of the repository.
     *
     * Generated from protobuf field <code>string display_name = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setDisplayName($var)
    {
        GPBUtil::checkString($var, True);
        $this->display_name = $var;

        return $this;
    }

    /**
     * Required. The location of the repository directory.
     *
     * Generated from protobuf field <code>string base_url = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->base_url;
    }

    /**
     * Required. The location of the repository directory.
     *
     * Generated from protobuf field <code>string base_url = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setBaseUrl($var)
    {
        GPBUtil::checkString($var, True);
        $this->base_url = $var;

        return $this;
    }

    /**
     * URIs of GPG keys.
     *
     * Generated from protobuf field <code>repeated string gpg_keys = 4;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getGpgKeys()
    {
        return $this->gpg_keys;
    }

    /**
     * URIs of GPG keys.
     *
     * Generated from protobuf field <code>repeated string gpg_keys = 4;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setGpgKeys($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->gpg_keys = $arr;

        return $this;
    }

}


