<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/devtools/cloudbuild/v1/cloudbuild.proto

namespace Google\Cloud\Build\V1\WorkerPool;

use UnexpectedValueException;

/**
 * Supported GCP regions to create the `WorkerPool`.
 *
 * Protobuf type <code>google.devtools.cloudbuild.v1.WorkerPool.Region</code>
 */
class Region
{
    /**
     * no region
     *
     * Generated from protobuf enum <code>REGION_UNSPECIFIED = 0;</code>
     */
    const REGION_UNSPECIFIED = 0;
    /**
     * us-central1 region
     *
     * Generated from protobuf enum <code>US_CENTRAL1 = 1;</code>
     */
    const US_CENTRAL1 = 1;
    /**
     * us-west1 region
     *
     * Generated from protobuf enum <code>US_WEST1 = 2;</code>
     */
    const US_WEST1 = 2;
    /**
     * us-east1 region
     *
     * Generated from protobuf enum <code>US_EAST1 = 3;</code>
     */
    const US_EAST1 = 3;
    /**
     * us-east4 region
     *
     * Generated from protobuf enum <code>US_EAST4 = 4;</code>
     */
    const US_EAST4 = 4;

    private static $valueToName = [
        self::REGION_UNSPECIFIED => 'REGION_UNSPECIFIED',
        self::US_CENTRAL1 => 'US_CENTRAL1',
        self::US_WEST1 => 'US_WEST1',
        self::US_EAST1 => 'US_EAST1',
        self::US_EAST4 => 'US_EAST4',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Region::class, \Google\Cloud\Build\V1\WorkerPool_Region::class);

