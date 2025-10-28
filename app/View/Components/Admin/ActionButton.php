<?php

namespace App\View\Components\Admin;

use App\Models\Comment;
use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class ActionButton extends Component
{
    private $colorClasses = [
        "view" => "text-xs text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700",
        "edit" => "text-xs focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900",
        "delete" => "text-xs focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900",
        "create" => "text-xs focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-1 me-2 mb-1 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
    ]; //

    /**
     * Create a new component instance.
     */
    public function __construct(public string $action, public Model $data)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.action-button');
    }

    public function color(): string
    {
        return $this->colorClasses[$this->action];
    }

    public function url(): string
    {

        $url = class_basename($this->data);
        if ($this->data instanceof Post) {

            $routeName = match($this->action) {
                'view' => 'post',
                'create' => 'admin.post.edit',
                default => sprintf('admin.post.%s', $this->action)
            };
            $url = route($routeName, [$this->data->id]);
        }

        if ($this->data instanceof Comment) {
            $url = route(sprintf('admin.comment.%s', $this->action), [$this->data->post->id, $this->data->id]);
        }

        $onclick = sprintf("window.location='%s'", $url);

        if ($this->action === 'delete') {
            $onclick = sprintf("if(confirm('Are you sure you want to delete %s with ID %d')) { window.location='%s'; }", class_basename($this->data), $this->data->id, $url);
        }

        return $onclick;
    }

}
