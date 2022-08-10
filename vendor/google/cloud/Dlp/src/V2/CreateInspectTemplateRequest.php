<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/privacy/dlp/v2/dlp.proto

namespace Google\Cloud\Dlp\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for CreateInspectTemplate.
 *
 * Generated from protobuf message <code>google.privacy.dlp.v2.CreateInspectTemplateRequest</code>
 */
class CreateInspectTemplateRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. Parent resource name.
     * The format of this value varies depending on the scope of the request
     * (project or organization) and whether you have [specified a processing
     * location](https://cloud.google.com/dlp/docs/specifying-location):
     * + Projects scope, location specified:<br/>
     *   `projects/`<var>PROJECT_ID</var>`/locations/`<var>LOCATION_ID</var>
     * + Projects scope, no location specified (defaults to global):<br/>
     *   `projects/`<var>PROJECT_ID</var>
     * + Organizations scope, location specified:<br/>
     *   `organizations/`<var>ORG_ID</var>`/locations/`<var>LOCATION_ID</var>
     * + Organizations scope, no location specified (defaults to global):<br/>
     *   `organizations/`<var>ORG_ID</var>
     * The following example `parent` string specifies a parent project with the
     * identifier `example-project`, and specifies the `europe-west3` location
     * for processing data:
     *     parent=projects/example-project/locations/europe-west3
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    private $parent = '';
    /**
     * Required. The InspectTemplate to create.
     *
     * Generated from protobuf field <code>.google.privacy.dlp.v2.InspectTemplate inspect_template = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $inspect_template = null;
    /**
     * The template id can contain uppercase and lowercase letters,
     * numbers, and hyphens; that is, it must match the regular
     * expression: `[a-zA-Z\d-_]+`. The maximum length is 100
     * characters. Can be empty to allow the system to generate one.
     *
     * Generated from protobuf field <code>string template_id = 3;</code>
     */
    private $template_id = '';
    /**
     * Deprecated. This field has no effect.
     *
     * Generated from protobuf field <code>string location_id = 4;</code>
     */
    private $location_id = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $parent
     *           Required. Parent resource name.
     *           The format of this value varies depending on the scope of the request
     *           (project or organization) and whether you have [specified a processing
     *           location](https://cloud.google.com/dlp/docs/specifying-location):
     *           + Projects scope, location specified:<br/>
     *             `projects/`<var>PROJECT_ID</var>`/locations/`<var>LOCATION_ID</var>
     *           + Projects scope, no location specified (defaults to global):<br/>
     *             `projects/`<var>PROJECT_ID</var>
     *           + Organizations scope, location specified:<br/>
     *             `organizations/`<var>ORG_ID</var>`/locations/`<var>LOCATION_ID</var>
     *           + Organizations scope, no location specified (defaults to global):<br/>
     *             `organizations/`<var>ORG_ID</var>
     *           The following example `parent` string specifies a parent project with the
     *           identifier `example-project`, and specifies the `europe-west3` location
     *           for processing data:
     *               parent=projects/example-project/locations/europe-west3
     *     @type \Google\Cloud\Dlp\V2\InspectTemplate $inspect_template
     *           Required. The InspectTemplate to create.
     *     @type string $template_id
     *           The template id can contain uppercase and lowercase letters,
     *           numbers, and hyphens; that is, it must match the regular
     *           expression: `[a-zA-Z\d-_]+`. The maximum length is 100
     *           characters. Can be empty to allow the system to generate one.
     *     @type string $location_id
     *           Deprecated. This field has no effect.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Privacy\Dlp\V2\Dlp::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. Parent resource name.
     * The format of this value varies depending on the scope of the request
     * (project or organization) and whether you have [specified a processing
     * location](https://cloud.google.com/dlp/docs/specifying-location):
     * + Projects scope, location specified:<br/>
     *   `projects/`<var>PROJECT_ID</var>`/locations/`<var>LOCATION_ID</var>
     * + Projects scope, no location specified (defaults to global):<br/>
     *   `projects/`<var>PROJECT_ID</var>
     * + Organizations scope, location specified:<br/>
     *   `organizations/`<var>ORG_ID</var>`/locations/`<var>LOCATION_ID</var>
     * + Organizations scope, no location specified (defaults to global):<br/>
     *   `organizations/`<var>ORG_ID</var>
     * The following example `parent` string specifies a parent project with the
     * identifier `example-project`, and specifies the `europe-west3` location
     * for processing data:
     *     parent=projects/example-project/locations/europe-west3
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Required. Parent resource name.
     * The format of this value varies depending on the scope of the request
     * (project or organization) and whether you have [specified a processing
     * location](https://cloud.google.com/dlp/docs/specifying-location):
     * + Projects scope, location specified:<br/>
     *   `projects/`<var>PROJECT_ID</var>`/locations/`<var>LOCATION_ID</var>
     * + Projects scope, no location specified (defaults to global):<br/>
     *   `projects/`<var>PROJECT_ID</var>
     * + Organizations scope, location specified:<br/>
     *   `organizations/`<var>ORG_ID</var>`/locations/`<var>LOCATION_ID</var>
     * + Organizations scope, no location specified (defaults to global):<br/>
     *   `organizations/`<var>ORG_ID</var>
     * The following example `parent` string specifies a parent project with the
     * identifier `example-project`, and specifies the `europe-west3` location
     * for processing data:
     *     parent=projects/example-project/locations/europe-west3
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
     * Required. The InspectTemplate to create.
     *
     * Generated from protobuf field <code>.google.privacy.dlp.v2.InspectTemplate inspect_template = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\Dlp\V2\InspectTemplate|null
     */
    public function getInspectTemplate()
    {
        return $this->inspect_template;
    }

    public function hasInspectTemplate()
    {
        return isset($this->inspect_template);
    }

    public function clearInspectTemplate()
    {
        unset($this->inspect_template);
    }

    /**
     * Required. The InspectTemplate to create.
     *
     * Generated from protobuf field <code>.google.privacy.dlp.v2.InspectTemplate inspect_template = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\Dlp\V2\InspectTemplate $var
     * @return $this
     */
    public function setInspectTemplate($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Dlp\V2\InspectTemplate::class);
        $this->inspect_template = $var;

        return $this;
    }

    /**
     * The template id can contain uppercase and lowercase letters,
     * numbers, and hyphens; that is, it must match the regular
     * expression: `[a-zA-Z\d-_]+`. The maximum length is 100
     * characters. Can be empty to allow the system to generate one.
     *
     * Generated from protobuf field <code>string template_id = 3;</code>
     * @return string
     */
    public function getTemplateId()
    {
        return $this->template_id;
    }

    /**
     * The template id can contain uppercase and lowercase letters,
     * numbers, and hyphens; that is, it must match the regular
     * expression: `[a-zA-Z\d-_]+`. The maximum length is 100
     * characters. Can be empty to allow the system to generate one.
     *
     * Generated from protobuf field <code>string template_id = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setTemplateId($var)
    {
        GPBUtil::checkString($var, True);
        $this->template_id = $var;

        return $this;
    }

    /**
     * Deprecated. This field has no effect.
     *
     * Generated from protobuf field <code>string location_id = 4;</code>
     * @return string
     */
    public function getLocationId()
    {
        return $this->location_id;
    }

    /**
     * Deprecated. This field has no effect.
     *
     * Generated from protobuf field <code>string location_id = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setLocationId($var)
    {
        GPBUtil::checkString($var, True);
        $this->location_id = $var;

        return $this;
    }

}

