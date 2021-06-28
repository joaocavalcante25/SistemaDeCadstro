@extends('principal')
@section('conteudo')
<div id="conteudoDir">

    <div id="listaPessoas">
    
        <h1>Incluindo um Novo Cadastro</h1>
        

        
        
        <form id="formCadastrar" method="post" enctype="multipart/form-data" action="{{route('cadastrar')}}">
            @csrf
            <label for="cNome" required>Nome</label><br />
            <input id="cNome" name="nome" /><br />
            
            <label for="cDataNasc" required>Data de Nascimento</label><br />
         
            <input id="cDataNasc" required name="cDataNasc" type="date" /><br />
            
            <label for="cEmail" >E-Mail</label><br />
            <input id="cEmail" name="cEmail" required/><br />
            
            <label for="cFoto">Foto (somente .jpg - máximo de 100Kb)</label><br />
            <input id="pic" name="pic" required type="file" accept="image/jpeg" /><br />
            <br />
            <input type="submit" />
        </form>
        @if($mensagem != ''))
        <label> {{$mensagem}} </label>
        @endif

       
       

    
    </div>

</div> <!-- FIM CONTEUDO DIR -->
<script src="js/cadastro.js"> </script>
@stop

