<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\Dispatchable;

class InsertPostBatchJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected int $count;

    public function __construct($count = 10000)
    {
        $this->count = $count;
    }

    public function handle(): void
    {
        $tagIds = DB::table('tags')->pluck('id')->toArray();
        $now = Carbon::now();

        $posts = [];
        for ($i = 0; $i < $this->count; $i++) {
            $posts[] = [
                'title' => Str::title(fake()->sentence()),
                'content' => fake()->paragraph(),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('posts')->insert($posts);

        // گرفتن IDهای وارد شده
        $startId = DB::table('posts')->orderByDesc('id')->limit($this->count)->pluck('id')->toArray();

        $postTags = [];
        foreach ($startId as $postId) {
            $randomTags = collect($tagIds)->random(rand(2, 10))->unique();

            foreach ($randomTags as $tagId) {
                $postTags[] = [
                    'post_id' => $postId,
                    'tag_id' => $tagId,
                ];
            }
        }

        DB::table('post_tag')->insert($postTags);
    }
}
