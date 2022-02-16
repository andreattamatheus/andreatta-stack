<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MessageCRUD extends Component
{
        /**
     * The alert message.
     *
     * @var string
     */
    public $message;

        /**
     * The alert type.
     *
     * @var string
     */
    public $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($message, $type)
    {
        $this->message = $message;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.message-crud');
    }
}
