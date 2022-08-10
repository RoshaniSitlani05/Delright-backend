<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/aiplatform/v1/hyperparameter_tuning_job.proto

namespace Google\Cloud\AIPlatform\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represents a HyperparameterTuningJob. A HyperparameterTuningJob
 * has a Study specification and multiple CustomJobs with identical
 * CustomJob specification.
 *
 * Generated from protobuf message <code>google.cloud.aiplatform.v1.HyperparameterTuningJob</code>
 */
class HyperparameterTuningJob extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. Resource name of the HyperparameterTuningJob.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $name = '';
    /**
     * Required. The display name of the HyperparameterTuningJob.
     * The name can be up to 128 characters long and can be consist of any UTF-8
     * characters.
     *
     * Generated from protobuf field <code>string display_name = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $display_name = '';
    /**
     * Required. Study configuration of the HyperparameterTuningJob.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.StudySpec study_spec = 4 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $study_spec = null;
    /**
     * Required. The desired total number of Trials.
     *
     * Generated from protobuf field <code>int32 max_trial_count = 5 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $max_trial_count = 0;
    /**
     * Required. The desired number of Trials to run in parallel.
     *
     * Generated from protobuf field <code>int32 parallel_trial_count = 6 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $parallel_trial_count = 0;
    /**
     * The number of failed Trials that need to be seen before failing
     * the HyperparameterTuningJob.
     * If set to 0, Vertex AI decides how many Trials must fail
     * before the whole job fails.
     *
     * Generated from protobuf field <code>int32 max_failed_trial_count = 7;</code>
     */
    private $max_failed_trial_count = 0;
    /**
     * Required. The spec of a trial job. The same spec applies to the CustomJobs created
     * in all the trials.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.CustomJobSpec trial_job_spec = 8 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $trial_job_spec = null;
    /**
     * Output only. Trials of the HyperparameterTuningJob.
     *
     * Generated from protobuf field <code>repeated .google.cloud.aiplatform.v1.Trial trials = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $trials;
    /**
     * Output only. The detailed state of the job.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.JobState state = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $state = 0;
    /**
     * Output only. Time when the HyperparameterTuningJob was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $create_time = null;
    /**
     * Output only. Time when the HyperparameterTuningJob for the first time entered the
     * `JOB_STATE_RUNNING` state.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp start_time = 12 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $start_time = null;
    /**
     * Output only. Time when the HyperparameterTuningJob entered any of the following states:
     * `JOB_STATE_SUCCEEDED`, `JOB_STATE_FAILED`, `JOB_STATE_CANCELLED`.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp end_time = 13 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $end_time = null;
    /**
     * Output only. Time when the HyperparameterTuningJob was most recently updated.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 14 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $update_time = null;
    /**
     * Output only. Only populated when job's state is JOB_STATE_FAILED or
     * JOB_STATE_CANCELLED.
     *
     * Generated from protobuf field <code>.google.rpc.Status error = 15 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $error = null;
    /**
     * The labels with user-defined metadata to organize HyperparameterTuningJobs.
     * Label keys and values can be no longer than 64 characters
     * (Unicode codepoints), can only contain lowercase letters, numeric
     * characters, underscores and dashes. International characters are allowed.
     * See https://goo.gl/xmQnxf for more information and examples of labels.
     *
     * Generated from protobuf field <code>map<string, string> labels = 16;</code>
     */
    private $labels;
    /**
     * Customer-managed encryption key options for a HyperparameterTuningJob.
     * If this is set, then all resources created by the HyperparameterTuningJob
     * will be encrypted with the provided encryption key.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.EncryptionSpec encryption_spec = 17;</code>
     */
    private $encryption_spec = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           Output only. Resource name of the HyperparameterTuningJob.
     *     @type string $display_name
     *           Required. The display name of the HyperparameterTuningJob.
     *           The name can be up to 128 characters long and can be consist of any UTF-8
     *           characters.
     *     @type \Google\Cloud\AIPlatform\V1\StudySpec $study_spec
     *           Required. Study configuration of the HyperparameterTuningJob.
     *     @type int $max_trial_count
     *           Required. The desired total number of Trials.
     *     @type int $parallel_trial_count
     *           Required. The desired number of Trials to run in parallel.
     *     @type int $max_failed_trial_count
     *           The number of failed Trials that need to be seen before failing
     *           the HyperparameterTuningJob.
     *           If set to 0, Vertex AI decides how many Trials must fail
     *           before the whole job fails.
     *     @type \Google\Cloud\AIPlatform\V1\CustomJobSpec $trial_job_spec
     *           Required. The spec of a trial job. The same spec applies to the CustomJobs created
     *           in all the trials.
     *     @type \Google\Cloud\AIPlatform\V1\Trial[]|\Google\Protobuf\Internal\RepeatedField $trials
     *           Output only. Trials of the HyperparameterTuningJob.
     *     @type int $state
     *           Output only. The detailed state of the job.
     *     @type \Google\Protobuf\Timestamp $create_time
     *           Output only. Time when the HyperparameterTuningJob was created.
     *     @type \Google\Protobuf\Timestamp $start_time
     *           Output only. Time when the HyperparameterTuningJob for the first time entered the
     *           `JOB_STATE_RUNNING` state.
     *     @type \Google\Protobuf\Timestamp $end_time
     *           Output only. Time when the HyperparameterTuningJob entered any of the following states:
     *           `JOB_STATE_SUCCEEDED`, `JOB_STATE_FAILED`, `JOB_STATE_CANCELLED`.
     *     @type \Google\Protobuf\Timestamp $update_time
     *           Output only. Time when the HyperparameterTuningJob was most recently updated.
     *     @type \Google\Rpc\Status $error
     *           Output only. Only populated when job's state is JOB_STATE_FAILED or
     *           JOB_STATE_CANCELLED.
     *     @type array|\Google\Protobuf\Internal\MapField $labels
     *           The labels with user-defined metadata to organize HyperparameterTuningJobs.
     *           Label keys and values can be no longer than 64 characters
     *           (Unicode codepoints), can only contain lowercase letters, numeric
     *           characters, underscores and dashes. International characters are allowed.
     *           See https://goo.gl/xmQnxf for more information and examples of labels.
     *     @type \Google\Cloud\AIPlatform\V1\EncryptionSpec $encryption_spec
     *           Customer-managed encryption key options for a HyperparameterTuningJob.
     *           If this is set, then all resources created by the HyperparameterTuningJob
     *           will be encrypted with the provided encryption key.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Aiplatform\V1\HyperparameterTuningJob::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. Resource name of the HyperparameterTuningJob.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Output only. Resource name of the HyperparameterTuningJob.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Required. The display name of the HyperparameterTuningJob.
     * The name can be up to 128 characters long and can be consist of any UTF-8
     * characters.
     *
     * Generated from protobuf field <code>string display_name = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * Required. The display name of the HyperparameterTuningJob.
     * The name can be up to 128 characters long and can be consist of any UTF-8
     * characters.
     *
     * Generated from protobuf field <code>string display_name = 2 [(.google.api.field_behavior) = REQUIRED];</code>
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
     * Required. Study configuration of the HyperparameterTuningJob.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.StudySpec study_spec = 4 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\AIPlatform\V1\StudySpec|null
     */
    public function getStudySpec()
    {
        return $this->study_spec;
    }

    public function hasStudySpec()
    {
        return isset($this->study_spec);
    }

    public function clearStudySpec()
    {
        unset($this->study_spec);
    }

    /**
     * Required. Study configuration of the HyperparameterTuningJob.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.StudySpec study_spec = 4 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\AIPlatform\V1\StudySpec $var
     * @return $this
     */
    public function setStudySpec($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\AIPlatform\V1\StudySpec::class);
        $this->study_spec = $var;

        return $this;
    }

    /**
     * Required. The desired total number of Trials.
     *
     * Generated from protobuf field <code>int32 max_trial_count = 5 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return int
     */
    public function getMaxTrialCount()
    {
        return $this->max_trial_count;
    }

    /**
     * Required. The desired total number of Trials.
     *
     * Generated from protobuf field <code>int32 max_trial_count = 5 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param int $var
     * @return $this
     */
    public function setMaxTrialCount($var)
    {
        GPBUtil::checkInt32($var);
        $this->max_trial_count = $var;

        return $this;
    }

    /**
     * Required. The desired number of Trials to run in parallel.
     *
     * Generated from protobuf field <code>int32 parallel_trial_count = 6 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return int
     */
    public function getParallelTrialCount()
    {
        return $this->parallel_trial_count;
    }

    /**
     * Required. The desired number of Trials to run in parallel.
     *
     * Generated from protobuf field <code>int32 parallel_trial_count = 6 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param int $var
     * @return $this
     */
    public function setParallelTrialCount($var)
    {
        GPBUtil::checkInt32($var);
        $this->parallel_trial_count = $var;

        return $this;
    }

    /**
     * The number of failed Trials that need to be seen before failing
     * the HyperparameterTuningJob.
     * If set to 0, Vertex AI decides how many Trials must fail
     * before the whole job fails.
     *
     * Generated from protobuf field <code>int32 max_failed_trial_count = 7;</code>
     * @return int
     */
    public function getMaxFailedTrialCount()
    {
        return $this->max_failed_trial_count;
    }

    /**
     * The number of failed Trials that need to be seen before failing
     * the HyperparameterTuningJob.
     * If set to 0, Vertex AI decides how many Trials must fail
     * before the whole job fails.
     *
     * Generated from protobuf field <code>int32 max_failed_trial_count = 7;</code>
     * @param int $var
     * @return $this
     */
    public function setMaxFailedTrialCount($var)
    {
        GPBUtil::checkInt32($var);
        $this->max_failed_trial_count = $var;

        return $this;
    }

    /**
     * Required. The spec of a trial job. The same spec applies to the CustomJobs created
     * in all the trials.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.CustomJobSpec trial_job_spec = 8 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\AIPlatform\V1\CustomJobSpec|null
     */
    public function getTrialJobSpec()
    {
        return $this->trial_job_spec;
    }

    public function hasTrialJobSpec()
    {
        return isset($this->trial_job_spec);
    }

    public function clearTrialJobSpec()
    {
        unset($this->trial_job_spec);
    }

    /**
     * Required. The spec of a trial job. The same spec applies to the CustomJobs created
     * in all the trials.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.CustomJobSpec trial_job_spec = 8 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\AIPlatform\V1\CustomJobSpec $var
     * @return $this
     */
    public function setTrialJobSpec($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\AIPlatform\V1\CustomJobSpec::class);
        $this->trial_job_spec = $var;

        return $this;
    }

    /**
     * Output only. Trials of the HyperparameterTuningJob.
     *
     * Generated from protobuf field <code>repeated .google.cloud.aiplatform.v1.Trial trials = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getTrials()
    {
        return $this->trials;
    }

    /**
     * Output only. Trials of the HyperparameterTuningJob.
     *
     * Generated from protobuf field <code>repeated .google.cloud.aiplatform.v1.Trial trials = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Cloud\AIPlatform\V1\Trial[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setTrials($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\AIPlatform\V1\Trial::class);
        $this->trials = $arr;

        return $this;
    }

    /**
     * Output only. The detailed state of the job.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.JobState state = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Output only. The detailed state of the job.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.JobState state = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setState($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\AIPlatform\V1\JobState::class);
        $this->state = $var;

        return $this;
    }

    /**
     * Output only. Time when the HyperparameterTuningJob was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. Time when the HyperparameterTuningJob was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. Time when the HyperparameterTuningJob for the first time entered the
     * `JOB_STATE_RUNNING` state.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp start_time = 12 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getStartTime()
    {
        return $this->start_time;
    }

    public function hasStartTime()
    {
        return isset($this->start_time);
    }

    public function clearStartTime()
    {
        unset($this->start_time);
    }

    /**
     * Output only. Time when the HyperparameterTuningJob for the first time entered the
     * `JOB_STATE_RUNNING` state.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp start_time = 12 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setStartTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->start_time = $var;

        return $this;
    }

    /**
     * Output only. Time when the HyperparameterTuningJob entered any of the following states:
     * `JOB_STATE_SUCCEEDED`, `JOB_STATE_FAILED`, `JOB_STATE_CANCELLED`.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp end_time = 13 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getEndTime()
    {
        return $this->end_time;
    }

    public function hasEndTime()
    {
        return isset($this->end_time);
    }

    public function clearEndTime()
    {
        unset($this->end_time);
    }

    /**
     * Output only. Time when the HyperparameterTuningJob entered any of the following states:
     * `JOB_STATE_SUCCEEDED`, `JOB_STATE_FAILED`, `JOB_STATE_CANCELLED`.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp end_time = 13 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setEndTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->end_time = $var;

        return $this;
    }

    /**
     * Output only. Time when the HyperparameterTuningJob was most recently updated.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 14 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getUpdateTime()
    {
        return $this->update_time;
    }

    public function hasUpdateTime()
    {
        return isset($this->update_time);
    }

    public function clearUpdateTime()
    {
        unset($this->update_time);
    }

    /**
     * Output only. Time when the HyperparameterTuningJob was most recently updated.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 14 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setUpdateTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->update_time = $var;

        return $this;
    }

    /**
     * Output only. Only populated when job's state is JOB_STATE_FAILED or
     * JOB_STATE_CANCELLED.
     *
     * Generated from protobuf field <code>.google.rpc.Status error = 15 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Rpc\Status|null
     */
    public function getError()
    {
        return $this->error;
    }

    public function hasError()
    {
        return isset($this->error);
    }

    public function clearError()
    {
        unset($this->error);
    }

    /**
     * Output only. Only populated when job's state is JOB_STATE_FAILED or
     * JOB_STATE_CANCELLED.
     *
     * Generated from protobuf field <code>.google.rpc.Status error = 15 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Rpc\Status $var
     * @return $this
     */
    public function setError($var)
    {
        GPBUtil::checkMessage($var, \Google\Rpc\Status::class);
        $this->error = $var;

        return $this;
    }

    /**
     * The labels with user-defined metadata to organize HyperparameterTuningJobs.
     * Label keys and values can be no longer than 64 characters
     * (Unicode codepoints), can only contain lowercase letters, numeric
     * characters, underscores and dashes. International characters are allowed.
     * See https://goo.gl/xmQnxf for more information and examples of labels.
     *
     * Generated from protobuf field <code>map<string, string> labels = 16;</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * The labels with user-defined metadata to organize HyperparameterTuningJobs.
     * Label keys and values can be no longer than 64 characters
     * (Unicode codepoints), can only contain lowercase letters, numeric
     * characters, underscores and dashes. International characters are allowed.
     * See https://goo.gl/xmQnxf for more information and examples of labels.
     *
     * Generated from protobuf field <code>map<string, string> labels = 16;</code>
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
     * Customer-managed encryption key options for a HyperparameterTuningJob.
     * If this is set, then all resources created by the HyperparameterTuningJob
     * will be encrypted with the provided encryption key.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.EncryptionSpec encryption_spec = 17;</code>
     * @return \Google\Cloud\AIPlatform\V1\EncryptionSpec|null
     */
    public function getEncryptionSpec()
    {
        return $this->encryption_spec;
    }

    public function hasEncryptionSpec()
    {
        return isset($this->encryption_spec);
    }

    public function clearEncryptionSpec()
    {
        unset($this->encryption_spec);
    }

    /**
     * Customer-managed encryption key options for a HyperparameterTuningJob.
     * If this is set, then all resources created by the HyperparameterTuningJob
     * will be encrypted with the provided encryption key.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.EncryptionSpec encryption_spec = 17;</code>
     * @param \Google\Cloud\AIPlatform\V1\EncryptionSpec $var
     * @return $this
     */
    public function setEncryptionSpec($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\AIPlatform\V1\EncryptionSpec::class);
        $this->encryption_spec = $var;

        return $this;
    }

}

