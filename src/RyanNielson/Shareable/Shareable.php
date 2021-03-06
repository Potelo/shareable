<?php 

namespace RyanNielson\Shareable;

class Shareable {
    /**
     * The view environment or factory used to render views.
     *
     * @var \Illuminate\View\Environment|\Illuminate\View\Factory
     */
    private $view;

    public function __construct($view)
    {
        $this->view = $view;
    }

    /**
     * Returns all social sharing buttons.
     *
     * @return string
     */
    public function all()
    {
        $defaultButtons = config('shareable.default_buttons', array());
        $buttons = array();
        $output = '';

        foreach ($defaultButtons as $button) {
            $buttons[] = call_user_func(array($this, $button));
        }

        return view('shareable::all', array('buttons' => $buttons));
    }

    /**
     * Returns the html of an individual share button.
     *
     * @return string
     */
    public function __call($name, $arguments)
    {
        $className = "\\RyanNielson\\Shareable\\Buttons\\" . studly_case($name);
        $button = new $className($this->view);
        return $button->render(count($arguments) > 0 ? $arguments[0] : array());
    }
}
