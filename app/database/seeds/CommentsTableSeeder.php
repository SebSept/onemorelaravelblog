<?php

class CommentsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker\Factory::create('fr_FR');
		$comments = [];

		$count = 0;
		while($count++ < 20) {
			$title = $faker->sentence(rand(3,7));
			$comments[] = [
				'title' => $title,
            	'author_name' => $faker->name,
            	'author_site' => $faker->url,
            	'content' => $faker->realText,
            	'published' => (int) $faker->boolean(75),
            	'post_id' => rand(1,20),
            	'updated_at' => Carbon\Carbon::now(),
            	'created_at' => Carbon\Carbon::now(),
			];
		}

		DB::table('comments')->truncate();
        DB::table('comments')->insert($comments);
	}

}
