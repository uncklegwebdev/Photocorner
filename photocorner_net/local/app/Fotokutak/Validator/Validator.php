<?php
/**
 * Laravel 4 Core - Validator service
 *
 * @author    Andreas Lutro <anlutro@gmail.com>
 * @license   http://opensource.org/licenses/MIT
 * @package   Laravel 4 Core
 */

namespace Fotokutak\Validator;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator as VFactory;

/**
 * Validator class that can be injected into a repository or controller or
 * whatever else for easy validation of Eloquent models.
 */
abstract class Validator {

    protected $commonRules = [];
    protected $key = 'NULL';
    protected $validator;

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Set the key of the active model. Should be done before updating if there
     * are any exists/unique rules.
     *
     * @param mixed $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * Prepare rules, make the validator and check if it passes.
     *
     * @param  array $rules
     * @param  array $attributes
     *
     * @return boolean
     */
    protected function valid(array $rules, array $attributes)
    {
        $rules = $this->prepareRules($rules);
        $this->validator = VFactory::make($attributes, $rules);
        $this->prepareValidator($this->validator);

        return $this->validator->passes();
    }

    /**
     * Handle a dynamic 'valid' method call.
     *
     * @param  string $method
     * @param  array  $args
     *
     * @return boolean
     */
    protected function dynamicValidCall($method, array $args)
    {
        $action = substr($method, 5);
        $property = lcfirst($action) . 'Rules';

        if (isset($this->$property) && is_array($this->$property))
        {
            $rules = $this->$property;
        } else
        {
            $rules = [];
        }

        $attributes = $args[0];

        return $this->valid($rules, $attributes);
    }

    /**
     * Prepare the rules - merging with common rules and replacing keys and
     * table with the model's key and table
     *
     * @param  array $rules
     *
     * @return array
     */
    protected function prepareRules(array $rules)
    {
        $rules = $rules + $this->commonRules;

        array_walk_recursive($rules, function (&$item, $key)
        {
            if (strpos($item, '<key>') !== false)
            {
                $item = str_replace('<key>', $this->key, $item);
            }
            if (strpos($item, '<table>') !== false)
            {
                $item = str_replace('<table>', $this->model->getTable(), $item);
            }
        });

        return $rules;
    }

    /**
     * Prepare the validator class before checking if it passes or not. Useful
     * for adding sometimes() calls or similar.
     *
     * @param  \Illuminate\Validation\Validator $validator
     *
     * @return void
     */
    protected function prepareValidator($validator)
    {
    }

    /**
     * Missing method calls to this class will be passed on to the underlying
     * validator class for convenience.
     */
    public function __call($method, $args)
    {
        if (substr($method, 0, 5) === 'valid')
        {
            return $this->dynamicValidCall($method, $args);
        } elseif ($this->validator !== null)
        {
            return call_user_func_array([$this->validator, $method], $args);
        } else
        {
            throw new \BadMethodCallException("$method does not exist on this class or its Validator");
        }
    }
}