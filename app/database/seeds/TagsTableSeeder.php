<?php

class TagsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker\Factory::create('fr_FR');
		$tags = [];

		$count = 0;
		while($count++ < 7) {
			$title = $faker->word;
			$tags[] = [
				'title' => $title
			];
		}

		DB::table('tags')->truncate();
        DB::table('tags')->insert($tags);
	}

}
