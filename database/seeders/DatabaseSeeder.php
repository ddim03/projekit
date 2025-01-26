<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Create User Data
        User::factory()->create([
            'name' => 'Dimas',
            'email' => 'dimas@gmail.com',
            'username' => 'dimasgda',
            'role' => 'owner'
        ]);
        User::factory()->create([
            'name' => 'Putra',
            'email' => 'putra@gmail.com',
            'username' => 'putra',
            'role' => 'moderator'
        ]);
        User::factory()->create([
            'name' => 'Cyntia',
            'email' => 'cyntia@gmail.com',
            'username' => 'cyntia',
            'role' => 'moderator'
        ]);
        User::factory(10)->create();


        // Create Categories Data
        Category::insert([
            ['name' => 'Web Development', 'slug' => 'web-development', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mobile Development', 'slug' => 'mobile-development', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'UI/UX', 'slug' => 'ui-ux', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Graphic Design', 'slug' => 'graphic-design', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Game Development', 'slug' => 'game-development', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Internet of Things', 'slug' => 'internet-of-things', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Data Science', 'slug' => 'data-science', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Networking', 'slug' => 'networking', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Create Project Tags
        Tag::insert([
            ['name' => 'HTML', 'slug' => 'html', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'CSS', 'slug' => 'css', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'JavaScript', 'slug' => 'javascript', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'PHP', 'slug' => 'php', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Laravel', 'slug' => 'laravel', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bootstrap', 'slug' => 'bootstrap', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tailwind', 'slug' => 'tailwind', 'created_at' => now(), 'updated_at' => now()],
        ]);

        $users = User::all();

        foreach ($users as $user) {
            // Create User Profile
            Profile::create([
                'user_id' => $user->id,
                'description' => 'I am a developer',
                'github' => 'https://github.com/dimasgda',
                'instagram' => 'https://instagram.com/dimasgda',
                'linkedin' => 'https://linkedin.com/dimasgda'
            ]);

            // Create User Projects
            $project = Project::create([
                'title' => fake()->sentence(4),
                'image_path' => fake()->imageUrl(),
                'slug' => fake()->slug(),
                'description' => fake()->paragraph(),
                'category_id' => random_int(1, 8),
                'user_id' => $user->id
            ]);

            // Create Project Tags
            $tags = Tag::inRandomOrder()->limit(3)->pluck('id');
            $project->tags()->attach($tags);

            // Create Project Likes
            $project->likes()->create([
                'user_id' => $user->id
            ]);

            // Create Project Comments
            $project->comments()->create([
                'user_id' => $user->id,
                'content' => fake()->paragraph()
            ]);
        }
    }
}
