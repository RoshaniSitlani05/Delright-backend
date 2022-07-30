<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/dialogflow/v2/participant.proto

namespace Google\Cloud\Dialogflow\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The request message for [Participants.SuggestFaqAnswers][google.cloud.dialogflow.v2.Participants.SuggestFaqAnswers].
 *
 * Generated from protobuf message <code>google.cloud.dialogflow.v2.SuggestFaqAnswersRequest</code>
 */
class SuggestFaqAnswersRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The name of the participant to fetch suggestion for.
     * Format: `projects/<Project ID>/locations/<Location
     * ID>/conversations/<Conversation ID>/participants/<Participant ID>`.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    private $parent = '';
    /**
     * Optional. The name of the latest conversation message to compile suggestion
     * for. If empty, it will be the latest message of the conversation.
     * Format: `projects/<Project ID>/locations/<Location
     * ID>/conversations/<Conversation ID>/messages/<Message ID>`.
     *
     * Generated from protobuf field <code>string latest_message = 2 [(.google.api.field_behavior) = OPTIONAL, (.google.api.resource_reference) = {</code>
     */
    private $latest_message = '';
    /**
     * Optional. Max number of messages prior to and including
     * [latest_message] to use as context when compiling the
     * suggestion. By default 20 and at most 50.
     *
     * Generated from protobuf field <code>int32 context_size = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $context_size = 0;
    /**
     * Parameters for a human assist query.
     *
     * Generated from protobuf field <code>.google.cloud.dialogflow.v2.AssistQueryParameters assist_query_params = 4;</code>
     */
    private $assist_query_params = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $parent
     *           Required. The name of the participant to fetch suggestion for.
     *           Format: `projects/<Project ID>/locations/<Location
     *           ID>/conversations/<Conversation ID>/participants/<Participant ID>`.
     *     @type string $latest_message
     *           Optional. The name of the latest conversation message to compile suggestion
     *           for. If empty, it will be the latest message of the conversation.
     *           Format: `projects/<Project ID>/locations/<Location
     *           ID>/conversations/<Conversation ID>/messages/<Message ID>`.
     *     @type int $context_size
     *           Optional. Max number of messages prior to and including
     *           [latest_message] to use as context when compiling the
     *           suggestion. By default 20 and at most 50.
     *     @type \Google\Cloud\Dialogflow\V2\AssistQueryParameters $assist_query_params
     *           Parameters for a human assist query.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Dialogflow\V2\Participant::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The name of the participant to fetch suggestion for.
     * Format: `projects/<Project ID>/locations/<Location
     * ID>/conversations/<Conversation ID>/participants/<Participant ID>`.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Required. The name of the participant to fetch suggestion for.
     * Format: `projects/<Project ID>/locations/<Location
     * ID>/conversations/<Conversation ID>/participants/<Participant ID>`.
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
     * Optional. The name of the latest conversation message to compile suggestion
     * for. If empty, it will be the latest message of the conversation.
     * Format: `projects/<Project ID>/locations/<Location
     * ID>/conversations/<Conversation ID>/messages/<Message ID>`.
     *
     * Generated from protobuf field <code>string latest_message = 2 [(.google.api.field_behavior) = OPTIONAL, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getLatestMessage()
    {
        return $this->latest_message;
    }

    /**
     * Optional. The name of the latest conversation message to compile suggestion
     * for. If empty, it will be the latest message of the conversation.
     * Format: `projects/<Project ID>/locations/<Location
     * ID>/conversations/<Conversation ID>/messages/<Message ID>`.
     *
     * Generated from protobuf field <code>string latest_message = 2 [(.google.api.field_behavior) = OPTIONAL, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setLatestMessage($var)
    {
        GPBUtil::checkString($var, True);
        $this->latest_message = $var;

        return $this;
    }

    /**
     * Optional. Max number of messages prior to and including
     * [latest_message] to use as context when compiling the
     * suggestion. By default 20 and at most 50.
     *
     * Generated from protobuf field <code>int32 context_size = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return int
     */
    public function getContextSize()
    {
        return $this->context_size;
    }

    /**
     * Optional. Max number of messages prior to and including
     * [latest_message] to use as context when compiling the
     * suggestion. By default 20 and at most 50.
     *
     * Generated from protobuf field <code>int32 context_size = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param int $var
     * @return $this
     */
    public function setContextSize($var)
    {
        GPBUtil::checkInt32($var);
        $this->context_size = $var;

        return $this;
    }

    /**
     * Parameters for a human assist query.
     *
     * Generated from protobuf field <code>.google.cloud.dialogflow.v2.AssistQueryParameters assist_query_params = 4;</code>
     * @return \Google\Cloud\Dialogflow\V2\AssistQueryParameters|null
     */
    public function getAssistQueryParams()
    {
        return $this->assist_query_params;
    }

    public function hasAssistQueryParams()
    {
        return isset($this->assist_query_params);
    }

    public function clearAssistQueryParams()
    {
        unset($this->assist_query_params);
    }

    /**
     * Parameters for a human assist query.
     *
     * Generated from protobuf field <code>.google.cloud.dialogflow.v2.AssistQueryParameters assist_query_params = 4;</code>
     * @param \Google\Cloud\Dialogflow\V2\AssistQueryParameters $var
     * @return $this
     */
    public function setAssistQueryParams($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Dialogflow\V2\AssistQueryParameters::class);
        $this->assist_query_params = $var;

        return $this;
    }

}

