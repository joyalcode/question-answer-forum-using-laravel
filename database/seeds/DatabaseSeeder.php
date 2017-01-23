<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,5)->create();
        factory(App\Tag::class,5)->create();
        $tags_array = App\Tag::all('id')->pluck('id')->toArray();
        $question = factory(App\Question::class,20)->create()->each(function($question) use ($tags_array){
             $this->attachRandomTagsToQuestion($question->id, $tags_array);
             $this->addCommentsToQuestion($question->id);
             $this->addAnswers($question->id);
        });        
    }

	private function addAnswers($question_id)
	{
    	$faker = Faker::create();
    	$question_comments_count = rand(0,5);
    	for($i=0 ; $i<$question_comments_count; $i++)
    	{
            DB::table('answers')->insert([
                'user_id' => App\User::inRandomOrder()->first()->id,
                'question_id' => $question_id,
                'answer' => $faker->text($maxNbChars = 250),
            	'created_at' => $faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now', $timezone = date_default_timezone_get()),
            	'updated_at' => $faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now', $timezone = date_default_timezone_get())
            ]);    		
    	}		
	}    

    private function addCommentsToQuestion($question_id)
    {
    	$faker = Faker::create();
    	$question_comments_count = rand(0,5);
    	for($i=0 ; $i<$question_comments_count; $i++)
    	{
            DB::table('question_comments')->insert([
                'question_id' => $question_id,
                'user_id' => App\User::inRandomOrder()->first()->id,
                'comment' => $faker->text($maxNbChars = 125),
            	'created_at' => $faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now', $timezone = date_default_timezone_get()),
            	'updated_at' => $faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now', $timezone = date_default_timezone_get())
            ]);    		
    	}
    }

    private function attachRandomTagsToQuestion($question_id, $tags_array)
    {
        shuffle($tags_array);
        $tags_count = count($tags_array);
        $question_tags_count = random_int(1, $tags_count);
        for ($i=0; $i < $question_tags_count; $i++) 
        {
            DB::table('question_tag')->insert([
                'question_id' => $question_id,
                 'tag_id' => $tags_array[$i],
            ]);
        }    	
    }
}
