<?php namespace Services\Validators;

class Story extends Validator {
    
    protected $rules = [];

    protected $messages = [];

    /**
     * Sets validation rules for creating a story
     * 
     * @return array
     */
    public function onCreate()
    {
        $this->rules = [
            'title' => 'required',
            'url'    => 'required|active_url'
        ];

        return $this;
    }

}