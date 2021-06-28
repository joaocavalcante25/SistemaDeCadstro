
@extends('principal')
@section('conteudo')
<div id="conteudoDir">

    <div id="listaPessoas">
    
        <h1>Incluindo um Novo Cadastro</h1>
        
        <form id="formCadastrar" method="post" enctype="multipart/form-data" action="">
            
            <label for="cNome">Nome</label><br />
            <input id="cNome" name="cNome" /><br />
            
            <label for="cDataNasc">Data de Nascimento</label><br />
            <input id="cDataNasc" name="cDataNasc" /><br />
            
            <label for="cEmail">E-Mail</label><br />
            <input id="cEmail" name="cEmail" /><br />
            
            <label for="cFoto">Foto (somente .jpg - máximo de 100Kb)</label><br />
            <input id="cFoto" name="cFoto" type="file" accept="image/jpeg" /><br />

        </form>
        
        <a href="javascript:;" class="btPadrao">Salvar</a>
    
    </div>

</div> <!-- FIM CONTEUDO DIR -->

@stop

