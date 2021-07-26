<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{
    //
    public function handle(){
        $botman = app('botman');

        $botman->hears('{message}', function($botman,$message){

            if($message == 'Oi'){
                $this->askName($botman);
            }else{
                $botman->reply("Escreva 'oi' para teste ...");
            }
        });
        $botman->listen();
    }
    public function askName($botman){
        $botman->ask('Olá! Qual é o seu nome?', function(Answer $answer){
            $name = $answer->getText();

            $this->say('Prazer em conhecê-lo'.$name);
        });
    }
}
