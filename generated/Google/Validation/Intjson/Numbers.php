<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: validation/intjson.proto

namespace Google\Validation\Intjson;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>intjson.Numbers</code>
 */
class Numbers extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string label = 1;</code>
     */
    protected $label = '';
    /**
     * Generated from protobuf field <code>int64 signed64 = 2;</code>
     */
    protected $signed64 = 0;
    /**
     * Generated from protobuf field <code>uint64 unsigned64 = 3;</code>
     */
    protected $unsigned64 = 0;
    /**
     * Generated from protobuf field <code>int32 signed32 = 4;</code>
     */
    protected $signed32 = 0;
    /**
     * Generated from protobuf field <code>uint32 unsigned32 = 5;</code>
     */
    protected $unsigned32 = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $label
     *     @type int|string $signed64
     *     @type int|string $unsigned64
     *     @type int $signed32
     *     @type int $unsigned32
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Validation\Intjson::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string label = 1;</code>
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Generated from protobuf field <code>string label = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setLabel($var)
    {
        GPBUtil::checkString($var, True);
        $this->label = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int64 signed64 = 2;</code>
     * @return int|string
     */
    public function getSigned64()
    {
        return $this->signed64;
    }

    /**
     * Generated from protobuf field <code>int64 signed64 = 2;</code>
     * @param int|string $var
     * @return $this
     */
    public function setSigned64($var)
    {
        GPBUtil::checkInt64($var);
        $this->signed64 = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>uint64 unsigned64 = 3;</code>
     * @return int|string
     */
    public function getUnsigned64()
    {
        return $this->unsigned64;
    }

    /**
     * Generated from protobuf field <code>uint64 unsigned64 = 3;</code>
     * @param int|string $var
     * @return $this
     */
    public function setUnsigned64($var)
    {
        GPBUtil::checkUint64($var);
        $this->unsigned64 = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 signed32 = 4;</code>
     * @return int
     */
    public function getSigned32()
    {
        return $this->signed32;
    }

    /**
     * Generated from protobuf field <code>int32 signed32 = 4;</code>
     * @param int $var
     * @return $this
     */
    public function setSigned32($var)
    {
        GPBUtil::checkInt32($var);
        $this->signed32 = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>uint32 unsigned32 = 5;</code>
     * @return int
     */
    public function getUnsigned32()
    {
        return $this->unsigned32;
    }

    /**
     * Generated from protobuf field <code>uint32 unsigned32 = 5;</code>
     * @param int $var
     * @return $this
     */
    public function setUnsigned32($var)
    {
        GPBUtil::checkUint32($var);
        $this->unsigned32 = $var;

        return $this;
    }

}

