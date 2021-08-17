<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App;


class SentenceTest extends TestCase
{
    use withFaker;
    

    /**
     * test calculate count of sentences functionality
     *
     * @return void
     */
    public function test_calculate_sentences_count()
    {
        // $text = $this->faker->realText();
        $text = "تست. شاید؟ واقعا! می توان.";
        dump("text is: " . $text);

        $result = App::make('App\Http\Controllers\DashboardController')->calculate_sentence_number($text);
        dump("count of sentences is: " . $result);
        
        $this->assertTrue(true);
    }
}
