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
                'nota' => 'required|min:5|max:255',
                'cor' => 'required'
            ]); // pega os dados desejados do formulário e verifica se não estão vazios

            Nota::create($dados); // insere os dados no banco

            return redirect() -> route('keep.index') -> with('mensagem', 'Nota criada com sucesso.'); // redireciona para a página inicial e mostra mensagem
        }

        return view('keep/create');
    }


    public function delete(Nota $nota) {
        // dd($nota);

        if(request()->isMethod('delete')) {
            $nota->delete();

            return redirect()->route('keep.index')->with('mensagem', 'Nota excluida com sucesso.');
        }

        return view('keep.delete', [
            'nota' => $nota
        ]);
    }

    public function edit(Request $request, Nota $nota) {
        if ($request->isMethod('put')) {

            $dados = $request->validate([
                'nota' => 'required|min:5|max:255',
                'cor' => 'required'
            ]);

            $nota->update($dados);
            return redirect()->route('keep.index')->with('mensagem', 'Nota atualizada com sucesso.');
        }


        if ($request->isMethod('post')) {

            return redirect() -> route('keep.create', [
                'nota' => $nota
            ]);
        }

        return view('keep/create');
    }

}
