<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/recaptchaenterprise/v1/recaptchaenterprise.proto

namespace Google\Cloud\RecaptchaEnterprise\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A key used to identify and configure applications (web and/or mobile) that
 * use reCAPTCHA Enterprise.
 *
 * Generated from protobuf message <code>google.cloud.recaptchaenterprise.v1.Key</code>
 */
class Key extends \Google\Protobuf\Internal\Message
{
    /**
     * The resource name for the Key in the format
     * "projects/{project}/keys/{key}".
     *
     * Generated from protobuf field <code>string name = 1;</code>
     */
    private $name = '';
    /**
     * Human-readable display name of this key. Modifiable by user.
     *
     * Generated from protobuf field <code>string display_name = 2;</code>
     */
    private $display_name = '';
    /**
     * See <a href="https://cloud.google.com/recaptcha-enterprise/docs/labels">
     * Creating and managing labels</a>.
     *
     * Generated from protobuf field <code>map<string, string> labels = 6;</code>
     */
    private $labels;
    /**
     * The timestamp corresponding to the creation of this Key.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 7;</code>
     */
    private $create_time = null;
    /**
     * Options for user acceptance testing.
     *
     * Generated from protobuf field <code>.google.cloud.recaptchaenterprise.v1.TestingOptions testing_options = 9;</code>
     */
    private $testing_options = null;
    protected $platform_settings;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           The resource name for the Key in the format
     *           "projects/{project}/keys/{key}".
     *     @type string $display_name
     *           Human-readable display name of this key. Modifiable by user.
     *     @type \Google\Cloud\RecaptchaEnterprise\V1\WebKeySettings $web_settings
     *           Settings for keys that can be used by websites.
     *     @type \Google\Cloud\RecaptchaEnterprise\V1\AndroidKeySettings $android_settings
     *           Settings for keys that can be used by Android apps.
     *     @type \Google\Cloud\RecaptchaEnterprise\V1\IOSKeySettings $ios_settings
     *           Settings for keys that can be used by iOS apps.
     *     @type array|\Google\Protobuf\Internal\MapField $labels
     *           See <a href="https://cloud.google.com/recaptcha-enterprise/docs/labels">
     *           Creating and managing labels</a>.
     *     @type \Google\Protobuf\Timestamp $create_time
     *           The timestamp corresponding to the creation of this Key.
     *     @type \Google\Cloud\RecaptchaEnterprise\V1\TestingOptions $testing_options
     *           Options for user acceptance testing.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Recaptchaenterprise\V1\Recaptchaenterprise::initOnce();
        parent::__construct($data);
    }

    /**
     * The resource name for the Key in the format
     * "projects/{project}/keys/{key}".
     *
     * Generated from protobuf field <code>string name = 1;</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * The resource name for the Key in the format
     * "projects/{project}/keys/{key}".
     *
     * Generated from protobuf field <code>string name = 1;</code>
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
     * Human-readable display name of this key. Modifiable by user.
     *
     * Generated from protobuf field <code>string display_name = 2;</code>
     * @return string
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * Human-readable display name of this key. Modifiable by user.
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
     * Settings for keys that can be used by websites.
     *
     * Generated from protobuf field <code>.google.cloud.recaptchaenterprise.v1.WebKeySettings web_settings = 3;</code>
     * @return \Google\Cloud\RecaptchaEnterprise\V1\WebKeySettings|null
     */
    public function getWebSettings()
    {
        return $this->readOneof(3);
    }

    public function hasWebSettings()
    {
        return $this->hasOneof(3);
    }

    /**
     * Settings for keys that can be used by websites.
     *
     * Generated from protobuf field <code>.google.cloud.recaptchaenterprise.v1.WebKeySettings web_settings = 3;</code>
     * @param \Google\Cloud\RecaptchaEnterprise\V1\WebKeySettings $var
     * @return $this
     */
    public function setWebSettings($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\RecaptchaEnterprise\V1\WebKeySettings::class);
        $this->writeOneof(3, $var);

        return $this;
    }

    /**
     * Settings for keys that can be used by Android apps.
     *
     * Generated from protobuf field <code>.google.cloud.recaptchaenterprise.v1.AndroidKeySettings android_settings = 4;</code>
     * @return \Google\Cloud\RecaptchaEnterprise\V1\AndroidKeySettings|null
     */
    public function getAndroidSettings()
    {
        return $this->readOneof(4);
    }

    public function hasAndroidSettings()
    {
        return $this->hasOneof(4);
    }

    /**
     * Settings for keys that can be used by Android apps.
     *
     * Generated from protobuf field <code>.google.cloud.recaptchaenterprise.v1.AndroidKeySettings android_settings = 4;</code>
     * @param \Google\Cloud\RecaptchaEnterprise\V1\AndroidKeySettings $var
     * @return $this
     */
    public function setAndroidSettings($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\RecaptchaEnterprise\V1\AndroidKeySettings::class);
        $this->writeOneof(4, $var);

        return $this;
    }

    /**
     * Settings for keys that can be used by iOS apps.
     *
     * Generated from protobuf field <code>.google.cloud.recaptchaenterprise.v1.IOSKeySettings ios_settings = 5;</code>
     * @return \Google\Cloud\RecaptchaEnterprise\V1\IOSKeySettings|null
     */
    public function getIosSettings()
    {
        return $this->readOneof(5);
    }

    public function hasIosSettings()
    {
        return $this->hasOneof(5);
    }

    /**
     * Settings for keys that can be used by iOS apps.
     *
     * Generated from protobuf field <code>.google.cloud.recaptchaenterprise.v1.IOSKeySettings ios_settings = 5;</code>
     * @param \Google\Cloud\RecaptchaEnterprise\V1\IOSKeySettings $var
     * @return $this
     */
    public function setIosSettings($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\RecaptchaEnterprise\V1\IOSKeySettings::class);
        $this->writeOneof(5, $var);

        return $this;
    }

    /**
     * See <a href="https://cloud.google.com/recaptcha-enterprise/docs/labels">
     * Creating and managing labels</a>.
     *
     * Generated from protobuf field <code>map<string, string> labels = 6;</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * See <a href="https://cloud.google.com/recaptcha-enterprise/docs/labels">
     * Creating and managing labels</a>.
     *
     * Generated from protobuf field <code>map<string, string> labels = 6;</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setLabels($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::STRING);
        $this->labels = $arr;

        return $this;
    }

    /**
     * The timestamp corresponding to the creation of this Key.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 7;</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    public function hasCreateTime()
    {
        return isset($this->create_time);
    }

    public function clearCreateTime()
    {
        unset($this->create_time);
    }

    /**
     * The timestamp corresponding to the creation of this Key.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 7;</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setCreateTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->create_time = $var;

        return $this;
    }

    /**
     * Options for user acceptance testing.
     *
     * Generated from protobuf field <code>.google.cloud.recaptchaenterprise.v1.TestingOptions testing_options = 9;</code>
     * @return \Google\Cloud\RecaptchaEnterprise\V1\TestingOptions|null
     */
    public function getTestingOptions()
    {
        return $this->testing_options;
    }

    public function hasTestingOptions()
    {
        return isset($this->testing_options);
    }

    public function clearTestingOptions()
    {
        unset($this->testing_options);
    }

    /**
     * Options for user acceptance testing.
     *
     * Generated from protobuf field <code>.google.cloud.recaptchaenterprise.v1.TestingOptions testing_options = 9;</code>
     * @param \Google\Cloud\RecaptchaEnterprise\V1\TestingOptions $var
     * @return $this
     */
    public function setTestingOptions($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\RecaptchaEnterprise\V1\TestingOptions::class);
        $this->testing_options = $var;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlatformSettings()
    {
        return $this->whichOneof("platform_settings");
    }

}

