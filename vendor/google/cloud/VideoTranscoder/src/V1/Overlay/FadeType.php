<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/video/transcoder/v1/resources.proto

namespace Google\Cloud\Video\Transcoder\V1\Overlay;

use UnexpectedValueException;

/**
 * Fade type for the overlay: `FADE_IN` or `FADE_OUT`.
 *
 * Protobuf type <code>google.cloud.video.transcoder.v1.Overlay.FadeType</code>
 */
class FadeType
{
    /**
     * The fade type is not specified.
     *
     * Generated from protobuf enum <code>FADE_TYPE_UNSPECIFIED = 0;</code>
     */
    const FADE_TYPE_UNSPECIFIED = 0;
    /**
     * Fade the overlay object into view.
     *
     * Generated from protobuf enum <code>FADE_IN = 1;</code>
     */
    const FADE_IN = 1;
    /**
     * Fade the overlay object out of view.
     *
     * Generated from protobuf enum <code>FADE_OUT = 2;</code>
     */
    const FADE_OUT = 2;

    private static $valueToName = [
        self::FADE_TYPE_UNSPECIFIED => 'FADE_TYPE_UNSPECIFIED',
        self::FADE_IN => 'FADE_IN',
        self::FADE_OUT => 'FADE_OUT',
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


