<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = Author::all();

        Post::factory()->count(40)
            ->sequence(fn ($seq) => ['author_id' => $authors->random()->id])
            ->create();

        Post::factory()->count(10)->draft()
            ->sequence(fn ($seq) => ['author_id' => $authors->random()->id])
            ->create();

        // The pinned post
        $kagawad = Author::where('email', 'kagawad.domingo@bulletin.test')->first();
        
        Post::create([
            'author_id' => $kagawad->id,
            'title' => 'Purok Domingo Clean-up Drive',
            'category' => 'Announcement',
            'body' => 'Join us for our upcoming clean-up drive this weekend.',
            'is_published' => true,
            'is_pinned' => true,
            'published_at' => '2026-05-15 08:00:00', // CHANGE THIS TO YOUR BIRTHDAY IN 2026
        ]);
    }
}