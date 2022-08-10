<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: grafeas/v1/cvss.proto

namespace Grafeas\V1\CVSSv3;

use UnexpectedValueException;

/**
 * Protobuf type <code>grafeas.v1.CVSSv3.Impact</code>
 */
class Impact
{
    /**
     * Generated from protobuf enum <code>IMPACT_UNSPECIFIED = 0;</code>
     */
    const IMPACT_UNSPECIFIED = 0;
    /**
     * Generated from protobuf enum <code>IMPACT_HIGH = 1;</code>
     */
    const IMPACT_HIGH = 1;
    /**
     * Generated from protobuf enum <code>IMPACT_LOW = 2;</code>
     */
    const IMPACT_LOW = 2;
    /**
     * Generated from protobuf enum <code>IMPACT_NONE = 3;</code>
     */
    const IMPACT_NONE = 3;

    private static $valueToName = [
        self::IMPACT_UNSPECIFIED => 'IMPACT_UNSPECIFIED',
        self::IMPACT_HIGH => 'IMPACT_HIGH',
        self::IMPACT_LOW => 'IMPACT_LOW',
        self::IMPACT_NONE => 'IMPACT_NONE',
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

