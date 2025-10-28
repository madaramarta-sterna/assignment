<?php

namespace App\View\Components\Admin;

use App\Models\Post;
use App\View\Components\PostComponentTrait;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostListItem extends Component
{
    use PostComponentTrait;
    /**
     * Create a new component instance.
     */
    public function __construct(public Post $post)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.post-list-item');
    }
}
