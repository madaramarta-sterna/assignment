<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;

class FormError extends Component
{
    public bool $error = false;
    public string $message = '';
    /**
     * Create a new component instance.
     */
    public function __construct(public string $errorName, public ViewErrorBag $errorBag)
    {
        $this->error = $this->errorBag->has($this->errorName);
        if($this->error) {
            $this->message = $this->errorBag->has($this->errorName) ? implode("<br />",$this->errorBag->get($this->errorName)) : $this->message;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-error');
    }
}
