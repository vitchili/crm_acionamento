<?php

namespace App\Http\Livewire\Acionamento;

use Livewire\Component;
use App\Models\Pessoa;
use App\Models\PessoaLoja;
use App\Models\Loja;
use Illuminate\Http\Request;

class DadosCadastrais extends Component
{   
    public function render(Request $request)
    {
        $pessoa = Pessoa::where('pes_codigo', $request->id)->first();
        $pessoa_loja = PessoaLoja::where('pel_fk_pes_codigo', $request->id)->first();
        return view('livewire.acionamento.dados-cadastrais', [
            'pessoa' => $pessoa,
            'pessoa_loja' => $pessoa_loja,
        ]);
    }
}
