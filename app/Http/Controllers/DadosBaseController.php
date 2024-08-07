<?php

namespace App\Http\Controllers;

use App\Models\DadosBase;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DadosBaseController extends Controller
{
    public function index(Request $request)
    {
        $filtro = $request->input('filtro');
        if ($filtro) {
            $dados = DadosBase::where('NU_CONTRATO', 'like', "%{$filtro}%")->get();
        } else {
            $dados = DadosBase::all();
        }

        // Formatar os valores para exibição
        foreach ($dados as $dado) {
            $dado->VR_FINANCIAMENTO = number_format($dado->VR_FINANCIAMENTO, 2, ',', '.');
            $dado->DT_ASSINATURA = Carbon::parse($dado->DT_ASSINATURA)->format('d/m/Y');
            $dado->DT_NASCIMENTO = Carbon::parse($dado->DT_NASCIMENTO)->format('d/m/Y');
            $dado->NU_CPF = $this->formatCPF($dado->NU_CPF);
        }

        return view('consulta', compact('dados')); 
    }


    public function create()
    {
        return view('cadastro');
    }

    public function store(Request $request)
    {
        \Log::info('Dados recebidos para cadastro:', $request->all());

        try {
            $validatedData = $request->validate([
                'NU_CONTRATO' => 'required',
                'DT_ASSINATURA' => 'required|date',
                'VR_FINANCIAMENTO' => 'required',
                'NU_CPF' => 'required',
                'NO_MUTUARIO' => 'required',
                'NU_CEP' => 'required',
                'NO_MUNICIPIO' => 'required',
                'SG_UF' => 'required',
            ]);

            // Remover a formatação do CPF e valores antes de salvar
            $validatedData['NU_CPF'] = str_replace(['.', '-'], '', $validatedData['NU_CPF']);
            $validatedData['VR_FINANCIAMENTO'] = str_replace(['.', ','], ['', '.'], $validatedData['VR_FINANCIAMENTO']);
            $validatedData['NU_CEP'] = str_replace('-', '', $validatedData['NU_CEP']);

            // Adicionar valores padrão para os campos que não estão no formulário
            $validatedData['NU_IDENTIDADE'] = $request->input('NU_IDENTIDADE', ''); // Número de Identidade
            $validatedData['PC_TAXA_JUROS'] = $request->input('PC_TAXA_JUROS', 0.0); // Percentual da Taxa de Juros
            $validatedData['PZ_CARENCIA'] = $request->input('PZ_CARENCIA', 0); // Prazo de Carência
            $validatedData['IC_ESTADO_CIVIL'] = $request->input('IC_ESTADO_CIVIL', ''); // Indicador do Estado Civil
            $validatedData['IC_SEXO'] = $request->input('IC_SEXO', ''); // Indicador do Sexo
            $validatedData['ED_ENDERECO'] = $request->input('ED_ENDERECO', ''); // Endereço
            $validatedData['DT_NASCIMENTO'] = $request->input('DT_NASCIMENTO', '1900-01-01'); // Data de Nascimento padrão

            \Log::info('Dados validados para cadastro:', $validatedData);

            DadosBase::create($validatedData);

            \Log::info('Cadastro realizado com sucesso.');

            return redirect()->route('consulta.index')->with('success', 'Registro criado com sucesso!');
        } catch (\Exception $e) {
            \Log::error('Erro ao validar ou salvar os dados:', ['message' => $e->getMessage()]);
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $dados = DadosBase::findOrFail($id);

        // Formatar os valores para exibição
        $dados->VR_FINANCIAMENTO = number_format($dados->VR_FINANCIAMENTO, 2, ',', '.');
        $dados->DT_ASSINATURA = Carbon::parse($dados->DT_ASSINATURA)->format('Y-m-d');
        $dados->DT_NASCIMENTO = Carbon::parse($dados->DT_NASCIMENTO)->format('d/m/Y');
        $dados->NU_CPF = $this->formatCPF($dados->NU_CPF);

        return view('edicao', compact('dados'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NU_CONTRATO' => 'required',
            'DT_ASSINATURA' => 'required|date',
            'VR_FINANCIAMENTO' => 'required',
            'NU_CPF' => 'required',
            'NO_MUTUARIO' => 'required',
            'NU_CEP' => 'required',
            'NO_MUNICIPIO' => 'required',
            'SG_UF' => 'required',
        ]);

        $dados = DadosBase::findOrFail($id);

        // Remover a formatação do CPF e valores antes de salvar
        $request->merge([
            'NU_CPF' => str_replace(['.', '-'], '', $request->input('NU_CPF')),
            'VR_FINANCIAMENTO' => str_replace(['.', ','], ['', '.'], $request->input('VR_FINANCIAMENTO')),
            'NU_CEP' => str_replace('-', '', $request->input('NU_CEP'))
        ]);

        $dados->update($request->all());

        return redirect()->route('consulta.index')->with('success', 'Registro atualizado com sucesso!');
    }

    private function formatCPF($cpf)
    {
        return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
    }
}

