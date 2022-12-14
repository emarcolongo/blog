<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        \DB::table('posts')->insert([
            'title'=>'Primeira Postagem',
            'description'=>'Postagem teste com seeds',
            'content'=>'Conteudo da Postagem',
            'is_active'=>1,
            'slug'=>'primeira-postagem',
            'user_id'=>1
        ]);
        */
        \App\Models\Post::factory()->count(20)->create();
    }
}
