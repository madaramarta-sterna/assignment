<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Message extends Component
{
    public $message = '';
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->message = session()->has('message') ? session('message') : null;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if(!$this->message){
            return '';
        }
        return view('components.message');
    }
}
