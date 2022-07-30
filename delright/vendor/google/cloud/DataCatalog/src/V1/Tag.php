<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/datacatalog/v1/tags.proto

namespace Google\Cloud\DataCatalog\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Tags contain custom metadata and are attached to Data Catalog resources. Tags
 * conform with the specification of their tag template.
 * See [Data Catalog
 * IAM](https://cloud.google.com/data-catalog/docs/concepts/iam) for information
 * on the permissions needed to create or view tags.
 *
 * Generated from protobuf message <code>google.cloud.datacatalog.v1.Tag</code>
 */
class Tag extends \Google\Protobuf\Internal\Message
{
    /**
     * The resource name of the tag in URL format where tag ID is a
     * system-generated identifier.
     * Note: The tag itself might not be stored in the location specified in its
     * name.
     *
     * Generated from protobuf field <code>string name = 1;</code>
     */
    private $name = '';
    /**
     * Required. The resource name of the tag template this tag uses. Example:
     * `projects/{PROJECT_ID}/locations/{LOCATION}/tagTemplates/{TAG_TEMPLATE_ID}`
     * This field cannot be modified after creation.
     *
     * Generated from protobuf field <code>string template = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $template = '';
    /**
     * Output only. The display name of the tag template.
     *
     * Generated from protobuf field <code>string template_display_name = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $template_display_name = '';
    /**
     * Required. Maps the ID of a tag field to its value and additional information
     * about that field.
     * Tag template defines valid field IDs. A tag
     * must have at least 1 field and at most 500 fields.
     *
     * Generated from protobuf field <code>map<string, .google.cloud.datacatalog.v1.TagField> fields = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $fields;
    protected $scope;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           The resource name of the tag in URL format where tag ID is a
     *           system-generated identifier.
     *           Note: The tag itself might not be stored in the location specified in its
     *           name.
     *     @type string $template
     *           Required. The resource name of the tag template this tag uses. Example:
     *           `projects/{PROJECT_ID}/locations/{LOCATION}/tagTemplates/{TAG_TEMPLATE_ID}`
     *           This field cannot be modified after creation.
     *     @type string $template_display_name
     *           Output only. The display name of the tag template.
     *     @type string $column
     *           Resources like entry can have schemas associated with them. This scope
     *           allows you to attach tags to an individual column based on that schema.
     *           To attach a tag to a nested column, separate column names with a dot
     *           (`.`). Example: `column.nested_column`.
     *     @type array|\Google\Protobuf\Internal\MapField $fields
     *           Required. Maps the ID of a tag field to its value and additional information
     *           about that field.
     *           Tag template defines valid field IDs. A tag
     *           must have at least 1 field and at most 500 fields.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Datacatalog\V1\Tags::initOnce();
        parent::__construct($data);
    }

    /**
     * The resource name of the tag in URL format where tag ID is a
     * system-generated identifier.
     * Note: The tag itself might not be stored in the location specified in its
     * name.
     *
     * Generated from protobuf field <code>string name = 1;</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * The resource name of the tag in URL format where tag ID is a
     * system-generated identifier.
     * Note: The tag itself might not be stored in the location specified in its
     * name.
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
     * Required. The resource name of the tag template this tag uses. Example:
     * `projects/{PROJECT_ID}/locations/{LOCATION}/tagTemplates/{TAG_TEMPLATE_ID}`
     * This field cannot be modified after creation.
     *
     * Generated from protobuf field <code>string template = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * Required. The resource name of the tag template this tag uses. Example:
     * `projects/{PROJECT_ID}/locations/{LOCATION}/tagTemplates/{TAG_TEMPLATE_ID}`
     * This field cannot be modified after creation.
     *
     * Generated from protobuf field <code>string template = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setTemplate($var)
    {
        GPBUtil::checkString($var, True);
        $this->template = $var;

        return $this;
    }

    /**
     * Output only. The display name of the tag template.
     *
     * Generated from protobuf field <code>string template_display_name = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getTemplateDisplayName()
    {
        return $this->template_display_name;
    }

    /**
     * Output only. The display name of the tag template.
     *
     * Generated from protobuf field <code>string template_display_name = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setTemplateDisplayName($var)
    {
        GPBUtil::checkString($var, True);
        $this->template_display_name = $var;

        return $this;
    }

    /**
     * Resources like entry can have schemas associated with them. This scope
     * allows you to attach tags to an individual column based on that schema.
     * To attach a tag to a nested column, separate column names with a dot
     * (`.`). Example: `column.nested_column`.
     *
     * Generated from protobuf field <code>string column = 4;</code>
     * @return string
     */
    public function getColumn()
    {
        return $this->readOneof(4);
    }

    public function hasColumn()
    {
        return $this->hasOneof(4);
    }

    /**
     * Resources like entry can have schemas associated with them. This scope
     * allows you to attach tags to an individual column based on that schema.
     * To attach a tag to a nested column, separate column names with a dot
     * (`.`). Example: `column.nested_column`.
     *
     * Generated from protobuf field <code>string column = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setColumn($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(4, $var);

        return $this;
    }

    /**
     * Required. Maps the ID of a tag field to its value and additional information
     * about that field.
     * Tag template defines valid field IDs. A tag
     * must have at least 1 field and at most 500 fields.
     *
     * Generated from protobuf field <code>map<string, .google.cloud.datacatalog.v1.TagField> fields = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * Required. Maps the ID of a tag field to its value and additional information
     * about that field.
     * Tag template defines valid field IDs. A tag
     * must have at least 1 field and at most 500 fields.
     *
     * Generated from protobuf field <code>map<string, .google.cloud.datacatalog.v1.TagField> fields = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setFields($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\DataCatalog\V1\TagField::class);
        $this->fields = $arr;

        return $this;
    }

    /**
     * @return string
     */
    public function getScope()
    {
        return $this->whichOneof("scope");
    }

}

