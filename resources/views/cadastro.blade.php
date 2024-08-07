@extends('layouts.app')

@section('content')
    <h1>Cadastro de Contrato</h1>

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

    <form action="{{ route('cadastro.store') }}" method="POST">
        @csrf
        <label for="NU_CONTRATO">Número do Contrato:</label>
        <input type="text" id="NU_CONTRATO" name="NU_CONTRATO" value="{{ old('NU_CONTRATO') }}" required><br>
        
        <label for="DT_ASSINATURA">Data de Assinatura:</label>
        <input type="date" id="DT_ASSINATURA" name="DT_ASSINATURA" value="{{ old('DT_ASSINATURA') }}" required><br>
        
        <label for="VR_FINANCIAMENTO">Valor do Financiamento:</label>
        <input type="text" id="VR_FINANCIAMENTO" name="VR_FINANCIAMENTO" value="{{ old('VR_FINANCIAMENTO') }}" placeholder="0,00" required><br>
        
        <label for="NU_CPF">CPF:</label>
        <input type="text" id="NU_CPF" name="NU_CPF" value="{{ old('NU_CPF') }}" placeholder="000.000.000-00" required><br>
        
        <label for="NO_MUTUARIO">Nome do Mutuário:</label>
        <input type="text" id="NO_MUTUARIO" name="NO_MUTUARIO" value="{{ old('NO_MUTUARIO') }}" required><br>
        
        <label for="NU_CEP">CEP:</label>
        <input type="text" id="NU_CEP" name="NU_CEP" value="{{ old('NU_CEP') }}" placeholder="00000-000" required><br>
        
        <label for="NO_MUNICIPIO">Município:</label>
        <input type="text" id="NO_MUNICIPIO" name="NO_MUNICIPIO" value="{{ old('NO_MUNICIPIO') }}" required><br>
        
        <label for="SG_UF">UF:</label>
        <input type="text" id="SG_UF" name="SG_UF" value="{{ old('SG_UF') }}" placeholder="UF" required><br>
        
        <div class="button-group-cadastro">
            <button type="button" class="btn-secondary" onclick="window.location='{{ route('consulta.index') }}'">Voltar</button>
            <button type="submit" class="btn-primary">Cadastrar</button>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#VR_FINANCIAMENTO').mask('000.000.000.000.000,00', {reverse: true});
            $('#NU_CPF').mask('000.000.000-00');
            $('#NU_CEP').mask('00000-000');
        });
    </script>
@endsection
