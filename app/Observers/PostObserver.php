<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostObserver
{
    /**
     * Handle the Post "creating" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function creating(Post $post)
    {
        $post->slug = Str::slug($post->title, '-');
        $post->user_id = Auth::id();

        $file_name = $post->slug . '.' . $post['image']->extension();
        $post['image'] = $post['image']->storeAs('posts', $file_name, 'public');
    }

        /**
     * Handle the Post "updateding" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function updating(Post $post)
    {
        $post->slug = Str::slug($post->title, '-');
        
        $image_delete = Post::findOrFail($post->id)->value('image');

        if ($post->image) {
            Storage::delete("public/$image_delete");
            $file_name = $post->slug . '.' . $post['image']->extension();
            $post['image'] = $post['image']->storeAs('posts', $file_name, 'public');
        }
    }
}
