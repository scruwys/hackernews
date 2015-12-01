<?php namespace Services\Validators;

abstract class Validator {

    protected $attributes;

    protected $rules;

    protected $messages;

    public $errors;

    public function __construct($attributes = null)
    {
        $this->attributes = $attributes ?: \Input::all();
    }

    public function fails()
    {
        $validation = \Validator::make($this->attributes, $this->rules, $this->messages);

        if ( $validation->fails() )
        {
            $this->errors = $validation->messages();
            return true;
        } 
        return false;
    }

    public function getErrors()
    {
        return $this->errors;
    }

}