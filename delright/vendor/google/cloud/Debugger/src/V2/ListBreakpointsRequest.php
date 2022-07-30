<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/devtools/clouddebugger/v2/debugger.proto

namespace Google\Cloud\Debugger\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request to list breakpoints.
 *
 * Generated from protobuf message <code>google.devtools.clouddebugger.v2.ListBreakpointsRequest</code>
 */
class ListBreakpointsRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. ID of the debuggee whose breakpoints to list.
     *
     * Generated from protobuf field <code>string debuggee_id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $debuggee_id = '';
    /**
     * When set to `true`, the response includes the list of breakpoints set by
     * any user. Otherwise, it includes only breakpoints set by the caller.
     *
     * Generated from protobuf field <code>bool include_all_users = 2;</code>
     */
    private $include_all_users = false;
    /**
     * When set to `true`, the response includes active and inactive
     * breakpoints. Otherwise, it includes only active breakpoints.
     *
     * Generated from protobuf field <code>bool include_inactive = 3;</code>
     */
    private $include_inactive = false;
    /**
     * When set, the response includes only breakpoints with the specified action.
     *
     * Generated from protobuf field <code>.google.devtools.clouddebugger.v2.ListBreakpointsRequest.BreakpointActionValue action = 4;</code>
     */
    private $action = null;
    /**
     * This field is deprecated. The following fields are always stripped out of
     * the result: `stack_frames`, `evaluated_expressions` and `variable_table`.
     *
     * Generated from protobuf field <code>bool strip_results = 5 [deprecated = true];</code>
     * @deprecated
     */
    protected $strip_results = false;
    /**
     * A wait token that, if specified, blocks the call until the breakpoints
     * list has changed, or a server selected timeout has expired.  The value
     * should be set from the last response. The error code
     * `google.rpc.Code.ABORTED` (RPC) is returned on wait timeout, which
     * should be called again with the same `wait_token`.
     *
     * Generated from protobuf field <code>string wait_token = 6;</code>
     */
    private $wait_token = '';
    /**
     * Required. The client version making the call.
     * Schema: `domain/type/version` (e.g., `google.com/intellij/v1`).
     *
     * Generated from protobuf field <code>string client_version = 8 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $client_version = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $debuggee_id
     *           Required. ID of the debuggee whose breakpoints to list.
     *     @type bool $include_all_users
     *           When set to `true`, the response includes the list of breakpoints set by
     *           any user. Otherwise, it includes only breakpoints set by the caller.
     *     @type bool $include_inactive
     *           When set to `true`, the response includes active and inactive
     *           breakpoints. Otherwise, it includes only active breakpoints.
     *     @type \Google\Cloud\Debugger\V2\ListBreakpointsRequest\BreakpointActionValue $action
     *           When set, the response includes only breakpoints with the specified action.
     *     @type bool $strip_results
     *           This field is deprecated. The following fields are always stripped out of
     *           the result: `stack_frames`, `evaluated_expressions` and `variable_table`.
     *     @type string $wait_token
     *           A wait token that, if specified, blocks the call until the breakpoints
     *           list has changed, or a server selected timeout has expired.  The value
     *           should be set from the last response. The error code
     *           `google.rpc.Code.ABORTED` (RPC) is returned on wait timeout, which
     *           should be called again with the same `wait_token`.
     *     @type string $client_version
     *           Required. The client version making the call.
     *           Schema: `domain/type/version` (e.g., `google.com/intellij/v1`).
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Devtools\Clouddebugger\V2\Debugger::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. ID of the debuggee whose breakpoints to list.
     *
     * Generated from protobuf field <code>string debuggee_id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getDebuggeeId()
    {
        return $this->debuggee_id;
    }

    /**
     * Required. ID of the debuggee whose breakpoints to list.
     *
     * Generated from protobuf field <code>string debuggee_id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setDebuggeeId($var)
    {
        GPBUtil::checkString($var, True);
        $this->debuggee_id = $var;

        return $this;
    }

    /**
     * When set to `true`, the response includes the list of breakpoints set by
     * any user. Otherwise, it includes only breakpoints set by the caller.
     *
     * Generated from protobuf field <code>bool include_all_users = 2;</code>
     * @return bool
     */
    public function getIncludeAllUsers()
    {
        return $this->include_all_users;
    }

    /**
     * When set to `true`, the response includes the list of breakpoints set by
     * any user. Otherwise, it includes only breakpoints set by the caller.
     *
     * Generated from protobuf field <code>bool include_all_users = 2;</code>
     * @param bool $var
     * @return $this
     */
    public function setIncludeAllUsers($var)
    {
        GPBUtil::checkBool($var);
        $this->include_all_users = $var;

        return $this;
    }

    /**
     * When set to `true`, the response includes active and inactive
     * breakpoints. Otherwise, it includes only active breakpoints.
     *
     * Generated from protobuf field <code>bool include_inactive = 3;</code>
     * @return bool
     */
    public function getIncludeInactive()
    {
        return $this->include_inactive;
    }

    /**
     * When set to `true`, the response includes active and inactive
     * breakpoints. Otherwise, it includes only active breakpoints.
     *
     * Generated from protobuf field <code>bool include_inactive = 3;</code>
     * @param bool $var
     * @return $this
     */
    public function setIncludeInactive($var)
    {
        GPBUtil::checkBool($var);
        $this->include_inactive = $var;

        return $this;
    }

    /**
     * When set, the response includes only breakpoints with the specified action.
     *
     * Generated from protobuf field <code>.google.devtools.clouddebugger.v2.ListBreakpointsRequest.BreakpointActionValue action = 4;</code>
     * @return \Google\Cloud\Debugger\V2\ListBreakpointsRequest\BreakpointActionValue|null
     */
    public function getAction()
    {
        return $this->action;
    }

    public function hasAction()
    {
        return isset($this->action);
    }

    public function clearAction()
    {
        unset($this->action);
    }

    /**
     * When set, the response includes only breakpoints with the specified action.
     *
     * Generated from protobuf field <code>.google.devtools.clouddebugger.v2.ListBreakpointsRequest.BreakpointActionValue action = 4;</code>
     * @param \Google\Cloud\Debugger\V2\ListBreakpointsRequest\BreakpointActionValue $var
     * @return $this
     */
    public function setAction($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Debugger\V2\ListBreakpointsRequest\BreakpointActionValue::class);
        $this->action = $var;

        return $this;
    }

    /**
     * This field is deprecated. The following fields are always stripped out of
     * the result: `stack_frames`, `evaluated_expressions` and `variable_table`.
     *
     * Generated from protobuf field <code>bool strip_results = 5 [deprecated = true];</code>
     * @return bool
     * @deprecated
     */
    public function getStripResults()
    {
        @trigger_error('strip_results is deprecated.', E_USER_DEPRECATED);
        return $this->strip_results;
    }

    /**
     * This field is deprecated. The following fields are always stripped out of
     * the result: `stack_frames`, `evaluated_expressions` and `variable_table`.
     *
     * Generated from protobuf field <code>bool strip_results = 5 [deprecated = true];</code>
     * @param bool $var
     * @return $this
     * @deprecated
     */
    public function setStripResults($var)
    {
        @trigger_error('strip_results is deprecated.', E_USER_DEPRECATED);
        GPBUtil::checkBool($var);
        $this->strip_results = $var;

        return $this;
    }

    /**
     * A wait token that, if specified, blocks the call until the breakpoints
     * list has changed, or a server selected timeout has expired.  The value
     * should be set from the last response. The error code
     * `google.rpc.Code.ABORTED` (RPC) is returned on wait timeout, which
     * should be called again with the same `wait_token`.
     *
     * Generated from protobuf field <code>string wait_token = 6;</code>
     * @return string
     */
    public function getWaitToken()
    {
        return $this->wait_token;
    }

    /**
     * A wait token that, if specified, blocks the call until the breakpoints
     * list has changed, or a server selected timeout has expired.  The value
     * should be set from the last response. The error code
     * `google.rpc.Code.ABORTED` (RPC) is returned on wait timeout, which
     * should be called again with the same `wait_token`.
     *
     * Generated from protobuf field <code>string wait_token = 6;</code>
     * @param string $var
     * @return $this
     */
    public function setWaitToken($var)
    {
        GPBUtil::checkString($var, True);
        $this->wait_token = $var;

        return $this;
    }

    /**
     * Required. The client version making the call.
     * Schema: `domain/type/version` (e.g., `google.com/intellij/v1`).
     *
     * Generated from protobuf field <code>string client_version = 8 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getClientVersion()
    {
        return $this->client_version;
    }

    /**
     * Required. The client version making the call.
     * Schema: `domain/type/version` (e.g., `google.com/intellij/v1`).
     *
     * Generated from protobuf field <code>string client_version = 8 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setClientVersion($var)
    {
        GPBUtil::checkString($var, True);
        $this->client_version = $var;

        return $this;
    }

}

