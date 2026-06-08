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
            dd($request);
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
            $nota->timestamps = false; // Desatiav operações com timestamps temporariamente, evitando que o campo "updated_at" seja alterado
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

        return view('keep/create', [
                'nota' => $nota
            ]);
    }


    public function trash() {
        $notas = nota::onlyTrashed()->get();

        return view('keep.trash', [
            'notas' => $notas,
        ]);
    }


    public function restore(Nota $nota) {
        $nota->timestamps = false; // Desatiav operações com timestamps temporariamente, evitando que o campo "updated_at" seja alterado
        $nota->restore();

        return redirect() -> route('keep.index') -> with('mensagem', 'Nota restaurada com sucesso.');
    }
}
