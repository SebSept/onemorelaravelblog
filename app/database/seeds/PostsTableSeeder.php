<?php

class PostsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker\Factory::create('fr_FR');
		$posts = [];

		$count = 0;
		while($count++ < 20) {
			$title = $faker->sentence(rand(3,7));
			$posts[] = [
				'slug' => $faker->slug,
				'title' => $title,
            	'teaser' => $faker->text(250),
            	'content' => $faker->text(1000),
            	'published' => (int) $faker->boolean(75),
            	'updated_at' => Carbon\Carbon::now(),
            	'created_at' => Carbon\Carbon::now()
			];
		}

		DB::table('posts')->truncate();
        DB::table('posts')->insert($posts);
	}

}
