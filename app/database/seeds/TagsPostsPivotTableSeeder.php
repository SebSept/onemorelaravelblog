<?php
/**
 * TagsPostsPivotTableSeeder
 *
 * seed pivot table posts-tags : tags associated with posts
 * 
 * @author sebastienmonterisi@yahoo.fr
 * @package onemorelaravelblog
 */
class TagsPostsPivotTableSeeder extends Seeder
{

    public function run()
    {
        $associations = [];

        $post_id = 0;
        while ($post_id++ < 20) {
            $tag_id = 0;
            $tag_id_array = [];
            while ($tag_id++ < 7) {
                $tag_id_array[] = rand(1, 7);
            }
            $tag_id_array = array_unique($tag_id_array);

            foreach ($tag_id_array AS $tag_id)
            {
                $associations[] = ['post_id' => $post_id, 'tag_id' => $tag_id];
            }
        }

        DB::table('post_tag')->truncate();
        DB::table('post_tag')->insert($associations);
    }

}
