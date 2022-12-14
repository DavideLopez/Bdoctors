<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Message;
use App\User;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user = user::all()->pluck('id');
        for ($i = 0; $i < 50; $i++) {
            $new_message = new Message();
            $new_message -> name_sender = $faker->firstName();
            $new_message -> surname_sender = $faker->lastName();
            $new_message -> mail_sender = $new_message -> name_sender . $new_message-> surname_sender . rand(1, 50) . '@gmail.com';
            $new_message -> message_sender = $faker->text(rand(150, 400));
            $new_message -> user_id = $faker->randomElement($user);

            $new_message -> save();
        }
    }
}
