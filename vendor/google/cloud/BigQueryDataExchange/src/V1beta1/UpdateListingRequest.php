<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/bigquery/dataexchange/v1beta1/dataexchange.proto

namespace Google\Cloud\BigQuery\DataExchange\V1beta1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Message for updating a Listing.
 *
 * Generated from protobuf message <code>google.cloud.bigquery.dataexchange.v1beta1.UpdateListingRequest</code>
 */
class UpdateListingRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. Field mask is used to specify the fields to be overwritten in the
     * Listing resource by the update.
     * The fields specified in the update_mask are relative to the resource, not
     * the full request.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $update_mask = null;
    /**
     * Required. The listing to update.
     *
     * Generated from protobuf field <code>.google.cloud.bigquery.dataexchange.v1beta1.Listing listing = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $listing = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Protobuf\FieldMask $update_mask
     *           Required. Field mask is used to specify the fields to be overwritten in the
     *           Listing resource by the update.
     *           The fields specified in the update_mask are relative to the resource, not
     *           the full request.
     *     @type \Google\Cloud\BigQuery\DataExchange\V1beta1\Listing $listing
     *           Required. The listing to update.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Bigquery\Dataexchange\V1Beta1\Dataexchange::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. Field mask is used to specify the fields to be overwritten in the
     * Listing resource by the update.
     * The fields specified in the update_mask are relative to the resource, not
     * the full request.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Protobuf\FieldMask|null
     */
    public function getUpdateMask()
    {
        return $this->update_mask;
    }

    public function hasUpdateMask()
    {
        return isset($this->update_mask);
    }

    public function clearUpdateMask()
    {
        unset($this->update_mask);
    }

    /**
     * Required. Field mask is used to specify the fields to be overwritten in the
     * Listing resource by the update.
     * The fields specified in the update_mask are relative to the resource, not
     * the full request.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Protobuf\FieldMask $var
     * @return $this
     */
    public function setUpdateMask($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\FieldMask::class);
        $this->update_mask = $var;

        return $this;
    }

    /**
     * Required. The listing to update.
     *
     * Generated from protobuf field <code>.google.cloud.bigquery.dataexchange.v1beta1.Listing listing = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\BigQuery\DataExchange\V1beta1\Listing|null
     */
    public function getListing()
    {
        return $this->listing;
    }

    public function hasListing()
    {
        return isset($this->listing);
    }

    public function clearListing()
    {
        unset($this->listing);
    }

    /**
     * Required. The listing to update.
     *
     * Generated from protobuf field <code>.google.cloud.bigquery.dataexchange.v1beta1.Listing listing = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\BigQuery\DataExchange\V1beta1\Listing $var
     * @return $this
     */
    public function setListing($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\BigQuery\DataExchange\V1beta1\Listing::class);
        $this->listing = $var;

        return $this;
    }

}

