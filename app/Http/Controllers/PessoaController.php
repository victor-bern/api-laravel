<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PessoaController extends Controller
{
    public function index()
    {
        $pessoas = \App\Pessoa::All();
        return $pessoas;
    }
    public function show($id)
    {
        $pessoa = \App\Pessoa::find($id);
        return $pessoa;
    }

    public function store(Request $request)
    {
        try {
            $pessoa = new \App\Pessoa();
            $pessoa->nome = $request->nome;
            $pessoa->sobrenome = $request->sobrenome;
            $pessoa->email = $request->email;
            $pessoa->juridico = $request->juridico;
            $pessoa->cpf = $request->cpf;
            $pessoa->cnpj = $request->cnpj;
            $pessoa->save();
            return ["Sucess" => true];
        } catch (\Excepetion $error) {
            return ["Sucess" => true];

        }
    }

    public function update(Request $request, $id)
    {
        try {
            $pessoa = \App\Pessoa::find($id);
            $pessoa->nome = $request->nome ?? $pessoa->nome;
            $pessoa->sobrenome = $request->sobrenome ?? $pessoa->sobrenome;
            $pessoa->email = $request->email ?? $pessoa->email;
            if ($request->cpf) {
                $pessoa->cpf = $request->cpf ?? $pessoa->cpf;
            }
            $pessoa->cnpj = $request->cnpj ?? $pessoa->cnpj;
            var_dump($pessoa->update());
            return ["Sucess" => true, "Pessoa" => $pessoa, "Request" => $request];
        } catch (\Excepetion $error) {
            return ["fail" => $error];

        }

    }

    public function destroy($id)
    {
        try {
            $pessoa = \App\Pessoa::find($id);
            $pessoa->destroy();
            return ["Sucess" => true];
        } catch (\Excepetion $error) {
            return ["Sucess" => true];

        }
    }
}
