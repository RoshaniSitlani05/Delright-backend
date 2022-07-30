<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/tasks/v2beta2/task.proto

namespace Google\Cloud\Tasks\V2beta2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Status of the task.
 *
 * Generated from protobuf message <code>google.cloud.tasks.v2beta2.TaskStatus</code>
 */
class TaskStatus extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The number of attempts dispatched.
     * This count includes attempts which have been dispatched but haven't
     * received a response.
     *
     * Generated from protobuf field <code>int32 attempt_dispatch_count = 1;</code>
     */
    private $attempt_dispatch_count = 0;
    /**
     * Output only. The number of attempts which have received a response.
     * This field is not calculated for [pull tasks][google.cloud.tasks.v2beta2.PullMessage].
     *
     * Generated from protobuf field <code>int32 attempt_response_count = 2;</code>
     */
    private $attempt_response_count = 0;
    /**
     * Output only. The status of the task's first attempt.
     * Only [dispatch_time][google.cloud.tasks.v2beta2.AttemptStatus.dispatch_time] will be set.
     * The other [AttemptStatus][google.cloud.tasks.v2beta2.AttemptStatus] information is not retained by Cloud Tasks.
     * This field is not calculated for [pull tasks][google.cloud.tasks.v2beta2.PullMessage].
     *
     * Generated from protobuf field <code>.google.cloud.tasks.v2beta2.AttemptStatus first_attempt_status = 3;</code>
     */
    private $first_attempt_status = null;
    /**
     * Output only. The status of the task's last attempt.
     * This field is not calculated for [pull tasks][google.cloud.tasks.v2beta2.PullMessage].
     *
     * Generated from protobuf field <code>.google.cloud.tasks.v2beta2.AttemptStatus last_attempt_status = 4;</code>
     */
    private $last_attempt_status = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $attempt_dispatch_count
     *           Output only. The number of attempts dispatched.
     *           This count includes attempts which have been dispatched but haven't
     *           received a response.
     *     @type int $attempt_response_count
     *           Output only. The number of attempts which have received a response.
     *           This field is not calculated for [pull tasks][google.cloud.tasks.v2beta2.PullMessage].
     *     @type \Google\Cloud\Tasks\V2beta2\AttemptStatus $first_attempt_status
     *           Output only. The status of the task's first attempt.
     *           Only [dispatch_time][google.cloud.tasks.v2beta2.AttemptStatus.dispatch_time] will be set.
     *           The other [AttemptStatus][google.cloud.tasks.v2beta2.AttemptStatus] information is not retained by Cloud Tasks.
     *           This field is not calculated for [pull tasks][google.cloud.tasks.v2beta2.PullMessage].
     *     @type \Google\Cloud\Tasks\V2beta2\AttemptStatus $last_attempt_status
     *           Output only. The status of the task's last attempt.
     *           This field is not calculated for [pull tasks][google.cloud.tasks.v2beta2.PullMessage].
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Tasks\V2Beta2\Task::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The number of attempts dispatched.
     * This count includes attempts which have been dispatched but haven't
     * received a response.
     *
     * Generated from protobuf field <code>int32 attempt_dispatch_count = 1;</code>
     * @return int
     */
    public function getAttemptDispatchCount()
    {
        return $this->attempt_dispatch_count;
    }

    /**
     * Output only. The number of attempts dispatched.
     * This count includes attempts which have been dispatched but haven't
     * received a response.
     *
     * Generated from protobuf field <code>int32 attempt_dispatch_count = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setAttemptDispatchCount($var)
    {
        GPBUtil::checkInt32($var);
        $this->attempt_dispatch_count = $var;

        return $this;
    }

    /**
     * Output only. The number of attempts which have received a response.
     * This field is not calculated for [pull tasks][google.cloud.tasks.v2beta2.PullMessage].
     *
     * Generated from protobuf field <code>int32 attempt_response_count = 2;</code>
     * @return int
     */
    public function getAttemptResponseCount()
    {
        return $this->attempt_response_count;
    }

    /**
     * Output only. The number of attempts which have received a response.
     * This field is not calculated for [pull tasks][google.cloud.tasks.v2beta2.PullMessage].
     *
     * Generated from protobuf field <code>int32 attempt_response_count = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setAttemptResponseCount($var)
    {
        GPBUtil::checkInt32($var);
        $this->attempt_response_count = $var;

        return $this;
    }

    /**
     * Output only. The status of the task's first attempt.
     * Only [dispatch_time][google.cloud.tasks.v2beta2.AttemptStatus.dispatch_time] will be set.
     * The other [AttemptStatus][google.cloud.tasks.v2beta2.AttemptStatus] information is not retained by Cloud Tasks.
     * This field is not calculated for [pull tasks][google.cloud.tasks.v2beta2.PullMessage].
     *
     * Generated from protobuf field <code>.google.cloud.tasks.v2beta2.AttemptStatus first_attempt_status = 3;</code>
     * @return \Google\Cloud\Tasks\V2beta2\AttemptStatus|null
     */
    public function getFirstAttemptStatus()
    {
        return $this->first_attempt_status;
    }

    public function hasFirstAttemptStatus()
    {
        return isset($this->first_attempt_status);
    }

    public function clearFirstAttemptStatus()
    {
        unset($this->first_attempt_status);
    }

    /**
     * Output only. The status of the task's first attempt.
     * Only [dispatch_time][google.cloud.tasks.v2beta2.AttemptStatus.dispatch_time] will be set.
     * The other [AttemptStatus][google.cloud.tasks.v2beta2.AttemptStatus] information is not retained by Cloud Tasks.
     * This field is not calculated for [pull tasks][google.cloud.tasks.v2beta2.PullMessage].
     *
     * Generated from protobuf field <code>.google.cloud.tasks.v2beta2.AttemptStatus first_attempt_status = 3;</code>
     * @param \Google\Cloud\Tasks\V2beta2\AttemptStatus $var
     * @return $this
     */
    public function setFirstAttemptStatus($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Tasks\V2beta2\AttemptStatus::class);
        $this->first_attempt_status = $var;

        return $this;
    }

    /**
     * Output only. The status of the task's last attempt.
     * This field is not calculated for [pull tasks][google.cloud.tasks.v2beta2.PullMessage].
     *
     * Generated from protobuf field <code>.google.cloud.tasks.v2beta2.AttemptStatus last_attempt_status = 4;</code>
     * @return \Google\Cloud\Tasks\V2beta2\AttemptStatus|null
     */
    public function getLastAttemptStatus()
    {
        return $this->last_attempt_status;
    }

    public function hasLastAttemptStatus()
    {
        return isset($this->last_attempt_status);
    }

    public function clearLastAttemptStatus()
    {
        unset($this->last_attempt_status);
    }

    /**
     * Output only. The status of the task's last attempt.
     * This field is not calculated for [pull tasks][google.cloud.tasks.v2beta2.PullMessage].
     *
     * Generated from protobuf field <code>.google.cloud.tasks.v2beta2.AttemptStatus last_attempt_status = 4;</code>
     * @param \Google\Cloud\Tasks\V2beta2\AttemptStatus $var
     * @return $this
     */
    public function setLastAttemptStatus($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Tasks\V2beta2\AttemptStatus::class);
        $this->last_attempt_status = $var;

        return $this;
    }

}

