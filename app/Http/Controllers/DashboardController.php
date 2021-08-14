<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    /**
     * Calculate the number of text sentences
     *
     * @return view
     */
    public function calculate_sentence_number(Request $request)
    {
        // Init parameters
        $text = $request->input('txt');
        $result = 0;
        $msg='';

        try
        {
            // Calculate sum of 3 type of sentences contain '.' and '!' and '?'
            $result = Str::substrCount($text, '.') + Str::substrCount($text, '؟') + Str::substrCount($text, '!');
        }
        catch (\Exception $e) {
            // Throw exception if occor
            $result = -1;
            $msg = $e->getMessage();
        }

        // Enable hold old value of input
        $request->flash();

        // send parameters to view
        return view('dashboard' , compact('result', 'text', 'msg'));

    }
}