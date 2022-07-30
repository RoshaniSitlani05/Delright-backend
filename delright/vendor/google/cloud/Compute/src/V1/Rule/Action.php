<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1\Rule;

use UnexpectedValueException;

/**
 * This is deprecated and has no effect. Do not use.
 *
 * Protobuf type <code>google.cloud.compute.v1.Rule.Action</code>
 */
class Action
{
    /**
     * A value indicating that the enum field is not set.
     *
     * Generated from protobuf enum <code>UNDEFINED_ACTION = 0;</code>
     */
    const UNDEFINED_ACTION = 0;
    /**
     * This is deprecated and has no effect. Do not use.
     *
     * Generated from protobuf enum <code>ALLOW = 62368553;</code>
     */
    const ALLOW = 62368553;
    /**
     * This is deprecated and has no effect. Do not use.
     *
     * Generated from protobuf enum <code>ALLOW_WITH_LOG = 76034177;</code>
     */
    const ALLOW_WITH_LOG = 76034177;
    /**
     * This is deprecated and has no effect. Do not use.
     *
     * Generated from protobuf enum <code>DENY = 2094604;</code>
     */
    const DENY = 2094604;
    /**
     * This is deprecated and has no effect. Do not use.
     *
     * Generated from protobuf enum <code>DENY_WITH_LOG = 351433982;</code>
     */
    const DENY_WITH_LOG = 351433982;
    /**
     * This is deprecated and has no effect. Do not use.
     *
     * Generated from protobuf enum <code>LOG = 75556;</code>
     */
    const LOG = 75556;
    /**
     * This is deprecated and has no effect. Do not use.
     *
     * Generated from protobuf enum <code>NO_ACTION = 260643444;</code>
     */
    const NO_ACTION = 260643444;

    private static $valueToName = [
        self::UNDEFINED_ACTION => 'UNDEFINED_ACTION',
        self::ALLOW => 'ALLOW',
        self::ALLOW_WITH_LOG => 'ALLOW_WITH_LOG',
        self::DENY => 'DENY',
        self::DENY_WITH_LOG => 'DENY_WITH_LOG',
        self::LOG => 'LOG',
        self::NO_ACTION => 'NO_ACTION',
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


