<?php

namespace App\View\Components;

trait PostComponentTrait
{
    public function postTime($withoutAt = false): string
    {
        $postDate = $this->post->created_at->format('d.m.Y H:i');
        if($withoutAt) {
            return $postDate;
        }
        return sprintf("@%s", $postDate);
    }

    public function postPreview(): string {
        $words = explode(' ', $this->post->content);
        $wordCount = count($words);
        if($wordCount > config('app.previewLength', 30)) {
            $slices = array_slice($words, 0, config('app.previewLength', 30));
            return implode(' ', $slices)." ...";
        }
        return $this->post->content;
    }
}
