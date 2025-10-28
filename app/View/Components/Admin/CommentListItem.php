<?php

namespace App\View\Components\Admin;

use App\Models\Comment;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CommentListItem extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Comment $comment)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.comment-list-item');
    }

    public function commentTime($withoutAt = false): string
    {
        $commentDate = $this->comment->created_at->format('d.m.Y H:i');
        if($withoutAt) {
            return $commentDate;
        }
        return sprintf("@%s", $commentDate);
    }
}
