<?php
/**
 * @package   Fuel\Validation
 * @version   2.0
 * @author    Fuel Development Team
 * @license   MIT License
 * @copyright 2010 - 2013 Fuel Development Team
 * @link      http://fuelphp.com
 */

namespace Fuel\Validation;

use Fuel\Validation\Exception\InvalidField;

/**
 * Defines common functionality for interacting with validation results
 *
 * @package Fuel\Validation
 * @author  Fuel Development Team
 *
 * @since   2.0
 */
class Result implements ResultInterface
{

	/**
	 * Boolean flag to indicate overall failure or success
	 *
	 * @var bool
	 */
	protected $result;

	/**
	 * Contains an array of errors that occurred during validation
	 *
	 * @var string[]
	 */
	protected $errors = array();

	/**
	 * Contains a list of fields that passed validation
	 *
	 * @var string[]
	 */
	protected $validated = array();

	/**
	 * @param bool $isValid
	 *
	 * @return $this
	 *
	 * @since 2.0
	 */
	public function setResult($isValid)
	{
		$this->result = $isValid;

		return $this;
	}

	/**
	 * @return bool
	 *
	 * @since 2.0
	 */
	public function isValid()
	{
		return $this->result;
	}

	/**
	 * @param string $field
	 *
	 * @return null|string
	 * @throws InvalidField
	 *
	 * @since 2.0
	 */
	public function getError($field)
	{
		if ( ! array_key_exists($field, $this->errors))
		{
			throw new InvalidField($field);
		}

		return $this->errors[$field];
	}

	/**
	 * @return string[]
	 *
	 * @since 2.0
	 */
	public function getErrors()
	{
		return $this->errors;
	}

	/**
	 * Sets the error message for the given field
	 *
	 * @param string $field
	 * @param string $message
	 *
	 * @return $this
	 *
	 * @since 2.0
	 */
	public function setError($field, $message)
	{
		$this->errors[$field] = $message;

		return $this;
	}

	/**
	 * @return string[]
	 *
	 * @since 2.0
	 */
	public function getValidated()
	{
		return $this->validated;
	}

	/**
	 * @param string $field
	 *
	 * @return $this
	 *
	 * @since 2.0
	 */
	public function setValidated($field)
	{
		$this->validated[] = $field;

		return $this;
	}
}