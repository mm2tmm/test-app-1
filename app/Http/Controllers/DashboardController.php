<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\FuncCall;

class DashboardController extends Controller
{
    /**
     * Calculate the number of text sentences
     *
     * @return view
     */
    public function show(Request $request)
    {
        // Init parameters
        $text = $request->input('txt');
        $result = 0;
        $msg='';

        try
        {
            // call calculate fucntion
            $result = $this->calculate_sentence_number($text);
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

    public Function calculate_sentence_number($text)
    {
        // Calculate count of sentence types contain '.' and '!' and '?' and ':'
        $result = Str::substrCount($text, '.') 
        + Str::substrCount($text, '؟') + 
        + Str::substrCount($text, '?') + 
        Str::substrCount($text, '!')+
        Str::substrCount($text, ':');

        return $result;
    }
}