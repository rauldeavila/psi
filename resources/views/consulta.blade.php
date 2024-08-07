@extends('layouts.app')

@section('content')
    <h1>Consulta de Contratos</h1>

    <!-- Mostra pop up de edição bem sucedida quando retorna da tela de edição -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success' )}}
        </div>
        <div class="progress-bar"></div>
    @endif

    @if ($errors->any())
        <div>
            <strong>Erros de Validação:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('consulta.index') }}" method="GET" class="consulta-form">
        <label for="filtro">Número do Contrato:</label>
        <input type="text" id="filtro" name="filtro" value="{{ old('filtro') }}">
        <button type="submit">Pesquisar</button>
    </form>

    @if(isset($dados) && $dados->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Número do Contrato</th>
                    <th>Data de Assinatura</th>
                    <th>Valor do Financiamento</th>
                    <th>CPF</th>
                    <th>Nome do Mutuário</th>
                    <th>CEP</th>
                    <th>Município</th>
                    <th>UF</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dados as $dado)
                    <tr>
                        <td>{{ $dado->NU_CONTRATO }}</td>
                        <td>{{ $dado->DT_ASSINATURA }}</td>
                        <td>{{ $dado->VR_FINANCIAMENTO }}</td>
                        <td>{{ $dado->NU_CPF }}</td>
                        <td>{{ $dado->NO_MUTUARIO }}</td>
                        <td>{{ $dado->NU_CEP }}</td>
                        <td>{{ $dado->NO_MUNICIPIO }}</td>
                        <td>{{ $dado->SG_UF }}</td>
                        <td>
                            <a href="{{ route('edicao.edit', $dado->id) }}">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Nenhum contrato encontrado.</p>
    @endif
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#VR_FINANCIAMENTO').mask('000.000.000.000.000,00', {reverse: true});
            $('#NU_CPF').mask('000.000.000-00');
            $('#NU_CEP').mask('00000-000');

            setTimeout(function() {
                $('.alert-success').fadeOut();
            }, 5000);
        });
    </script>
@endsection
