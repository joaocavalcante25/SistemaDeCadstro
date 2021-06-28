
@extends('principal')
@section('conteudo')
<div id="conteudoDir">

    <div id="listaPessoas">
        <h1>Cadastros</h1>

        <form id="formExcluir" method="GET" enctype="multipart/form-data"  action="/lista/delet">
        @csrf
        <input type="submit" class="btPadraoExcluir">Excluir</input>
        
        <table id="tLista" cellpadding="0" cellspacing="0" border="0">
        
            <tr>
                <th width="5%"><input type="checkbox" class="checkbox" id="select_all" /></th>
                <th width="5%">ID</th>
                <th width="5%">Foto</th>
                <th class="tL">Nome</th>
                <th width="15%">Dt Nasc</th>
                <th width="25%">Email</th>
                <th width="7%">Dep</th>
                <th width="7%">St</th>
            </tr>
            @php
            $cont= 0
            @endphp
            @foreach($cadastros as $cadastro)
                
           
            @if($cont == 1 )
            <tr bgcolor="{{$cor= '#f0f0f0'}}">
            @php $cont=0@endphp
            @else
            @php $cont = 1@endphp
                <tr bgcolor="{{$cor= '#cddeeb'}}">
                
            @endif
                
                <td align="center" style="border-left:0;"><input name="check[]" type="checkbox" class="checkbox" value="{{$cadastro->id}}" /></td>
                
                <td align="center">{{$cadastro->id}}</td>
                <td align="center"><img src="images/fotoCadastro.png" width="20" height="20" /></td>
                <td><a href="/{{$cadastro->id}}" class="linkUser" title="Clique aqui para editar este cadastro." id="nm_">{{$cadastro->nome}}</a></td>
                <td align="center">{{date('d/m/Y', strtotime($cadastro->data_nasc))}}</td>
                <td align="center">{{$cadastro->email}}</td>
                <td align="center">
                      
                    <a href="/{{$cadastro->id}}" class="btAdicionar" title="Adicionar dependentes para este cadastro."></a>
                    
                </td>
                <td align="center">
                    @if($cadastro->status == 1)
                    <a href="/lista/status/{{$cadastro->id}}/{{$cadastro->status}}" class="{{$botao = 'btVerde'}}" title="Ativar/Desativar este cadastro." id="bol_0"></a>
                    @else
                    <a href="/lista/status/{{$cadastro->id}}/{{$cadastro->status}}" class="{{$botao = 'btCinza'}}" title="Ativar/Desativar este cadastro." id="bol_0"></a>
                    @endif
                </td>
            </tr>
            @endforeach     
        </form>
           
        </table>
        
    </div>
   
    <div id="paginacao" align="center">
        <a align="center" href="{{$cadastros->previousPageUrl()}}" class="btSeta1"></a> <div id="pags">{{$cadastros->currentPage()}} de {{$cadastros->lastPage()}}</div> <a href="{{$cadastros->nextPageUrl()}}" class="btSeta2"></a> 
        <select align="center" id="paginas" onchange="getIndex()" data-value="2">
            @for($i = 1; $i <= $cadastros->lastPage(); $i++ )
            @php if(key_exists('page',$_GET) && $_GET['page'] == $i){
                echo '<option value="'.$i.'" selected>'.$i.'</option>';
            }
            else{
                echo '<option value="'.$i.'">'.$i.'</option>';
            } 
            
            @endphp
            @endfor
        </select>
    </div>
    


</div> <!-- FIM CONTEUDO DIR -->
<script src="js/cadastro.js"></script>
@stop