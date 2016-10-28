<?php

namespace olxtest\helper\data_type_validator;

use olxtest\helper\data_type_validator\exception\DataTypeException;

class DataTypeValidator {

  const TYPE_UNKNOWN = 0;
  const TYPE_STRING = 1;
  const TYPE_ARRAY = 2;
  const TYPE_OBJECT = 3;
  const TYPE_INTEGER = 4;
  const TYPE_FLOAT = 5;
  const TYPE_NULL = 6;
  const TYPE_NOT_SET = 7;
  const TYPE_URL = 8;
  const TYPE_BOOL = 9;

  public static function isBoolOrThrow($value)
  {
    if (self::guessType($value) !== self::TYPE_BOOL) {
      throw new DataTypeException($value . ' is not a Boolean');
    }

    return $value;
  }


  /**
   * @param $value
   * @return mixed
   * @throws DataTypeException
   */
  public static function isStringOrThrow($value) {
    if (self::guessType($value) !== self::TYPE_STRING) {
      throw new DataTypeException($value . ' is not a String');
    }

    return $value;
  }

  /**
   * @param $value
   * @return mixed
   * @throws DataTypeException
   */
  public static function isUrlOrThrow($value) {
    if (self::guessType($value) !== self::TYPE_URL) {
      throw new DataTypeException($value . ' is not a Url');
    }

    return $value;
  }

  /**
   * @param $value
   * @return mixed
   * @throws DataTypeException
   */
  public static function isArrayOrThrow($value) {
    if (self::guessType($value) !== self::TYPE_ARRAY) {
      throw new DataTypeException($value . ' is not a Array');
    }

    return $value;
  }

  /**
   * @param $value
   * @return mixed
   * @throws DataTypeException
   */
  public static function isObjectOrThrow($value) {
    if (self::guessType($value) !== self::TYPE_OBJECT) {
      throw new DataTypeException($value . ' is not a Object');
    }

    return $value;
  }

  /**
   * @param $value
   * @return mixed
   * @throws DataTypeException
   */
  public static function isIntegerOrThrow($value) {
    if (self::guessType($value) !== self::TYPE_INTEGER) {
      throw new DataTypeException($value . ' is not a Integer');
    }

    return $value;
  }

  /**
   * @param $value
   * @return mixed
   * @throws DataTypeException
   */
  public static function isFloatOrThrow($value) {
    if (self::guessType($value) !== self::TYPE_FLOAT) {
      throw new DataTypeException($value . ' is not a Float');
    }

    return $value;
  }

  /**
   * @param $value
   * @return int
   */
  public static function guessType($value) {
    if (!isset($value)) {
      return self::TYPE_NOT_SET;
    }

    if (is_array($value)) {
      return self::TYPE_ARRAY;
    }

    if (is_string($value)) {
      if (filter_var($value, FILTER_VALIDATE_URL)) {
        return self::TYPE_URL;
      }
      else {
        return self::TYPE_STRING;
      }
    }

    if(is_bool($value))
    {
      return self::TYPE_BOOL;
    }

    if (is_int($value)) {
      return self::TYPE_INTEGER;
    }

    if (is_float($value)) {
      return self::TYPE_FLOAT;
    }

    if (is_object($value)) {
      return self::TYPE_OBJECT;
    }

    if ($value === NULL) {
      return self::TYPE_NULL;
    }

    return self::TYPE_UNKNOWN;
  }
}