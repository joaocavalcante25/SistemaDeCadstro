@extends('principal')
@section('conteudo')
<div id="conteudoDir">
    
    <div id="listaPessoas">
        <h1>Dependentes</h1>
        
        <div id="infoDep">

            <div id="fotoCadastro">
                <img src="images/fotoCadastro.png" width="77" height="77" />
            </div> 
            
            <table id="tListaCad" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td class="tituloTab">Nome</td>    
                    <td>{{$cadastro->nome}}</td>    
                </tr>              
                <tr bgcolor="#cddeeb">
                    <td class="tituloTab">Data de Nascimento</td>    
                    <td>{{date('d/m/Y', strtotime($cadastro->data_nasc))}}</td>    
                </tr>              
                <tr>
                    <td class="tituloTab">Email</td>    
                    <td>{{$cadastro->email}}</td>    
                </tr>              
            </table>
            
            <form id="dependenteid" method="post" name="dependenteid" enctype="multipart/form-data" action="">
                @csrf

                <div class="agrupa mB mR">
                    <label for="cNomeDep">Nome</label><br />
                    <input type="text" required name="cNomeDep" id="cNomeDep" />
                </div>    
                <div class="agrupa">
                    <label for="cDataNasc">Data de Nascimento</label><br />
                    <input type="date" onloadeddata="myFunction()" required name="cDataNasc" id="cDataNasc" />
                </div> 
                                
                <input type="submit" class="btPadrao"  placeholder="Adicionar"/>
                
            </form>
                   
            <table id="tLista" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <th width="60%" class="tL">Nome do Dependente</th>
                    <th width="33%">Data de Nascimento</th>
                    <th></th>
                </tr> 
                <form id="formExcluirr" method="post" action="">
                @php $cont=1 @endphp
                @foreach($dependentes as $dependente)  
                @if($cont == 1)
                @php $cont = 0 @endphp
                <tr bgcolor="#cddeeb">
                @else
                @php $cont = 1 @endphp
                <tr>    
                @endif
                    <td>{{$dependente->nome}}</td>
                    <td align="center">{{date('d/m/Y', strtotime($dependente->data_nasc_dep))}}</td>
                    <td align="center"><a href="/lista/status/{{$dependente->id}}/" onclick="document.getElementById('formExcluirr').send()" class="btRemover"></a></td>
                </tr>    
                @endforeach
                </form>
                <script src="js/cadastro.js"> </script>
            
        </div>
        
    </div>    
   
</div> <!-- FIM CONTEUDO DIR -->


@stop