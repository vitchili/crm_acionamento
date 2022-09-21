<?php

namespace App\Http\Livewire\Acionamento;
use Illuminate\Http\Request;
use Livewire\Component;

class Acionamento extends Component
{
    public function render(Request $request){
        return view('livewire.acionamento.acionamento');
    }
}
