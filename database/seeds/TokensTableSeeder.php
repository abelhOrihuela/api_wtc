<?php

use Illuminate\Database\Seeder;

class TokensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\User::class, 1)->create();
      factory(App\QuestionCategory::class, 1)->create();
      factory(App\WorkArea::class, 1)->create();
      factory(App\EducationalLevel::class, 1)->create();
      //factory(App\Company::class, 10)->create();
      //factory(App\Token::class, 10)->create();
      //factory(App\Question::class, 50)->create();
    }
}
