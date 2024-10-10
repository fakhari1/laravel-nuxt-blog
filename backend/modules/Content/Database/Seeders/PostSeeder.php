<?php

namespace  Modules\Content\Database\Seeders;

use Modules\Content\Models\Post;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Post::factory()
            ->times(100)
            ->state(new Sequence(fn ($sequence) => ['created_at' => now()->addDays($sequence->index)]))
            ->state(new Sequence(fn ($sequence) => ['updated_at' => now()->addDays($sequence->index)]))
            ->create();
    }
}
