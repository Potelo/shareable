<?php namespace RyanNielson\Shareable\Buttons;

class WhatsApp extends Button {
    /**
     * An array of default options for the twitter button.
     *
     * @var Array
     */
    protected $defaultOptions = array(
        'text' => '',
        'url' => ''
    );

    /**
     * Called to render a social button.
     *
     * @param  array  $options
     * @return string
     */
    public function render($options = array())
    {
        $options = array_merge($this->defaultOptions, $options);
        return view('shareable::whats_app', array('options' => $options));
    }
}
