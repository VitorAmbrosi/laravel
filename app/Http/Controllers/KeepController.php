<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;

class KeepController extends Controller
{
    public function index() {
        $notas = Nota::all();
        // dd($notas)
        
        return view('keep/index', [
            'notas' => $notas,
        ]);
    }

    public function create(Request $request) {
        if ($request->isMethod('post')) {
            $dados = $request->validate([
                'nota' => 'required',
                'cor' => 'required'
            ]); // pega os dados desejados do formulário e verifica se não estão vazios

            Nota::create($dados); // insere os dados no banco

            return redirect()->route('keep.index'); // redireciona para a página inicial
        }
        return view('keep/create');
    }


}
