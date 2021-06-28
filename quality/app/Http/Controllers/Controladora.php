<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cadastro;
use App\Models\Dependente;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;

class Controladora extends Controller
{
    public function index(Request $requests){
        
        return view('index');
    }

    public function lista(Request $requests){

        $cadastros= Cadastro::paginate(3);
        return view('lista', ['cadastros'=>$cadastros]);
    }

    public function cadastrar(Request $requests){

        $cadastro = new Cadastro();
        $cadastro -> nome = $requests->nome;
        $cadastro -> data_nasc = $requests->cDataNasc;
        $cadastro ->  email = $requests->cEmail;
        $nomeFinal = time().'.jpg';
        if(!is_null($cadastro -> nome) && !is_null($cadastro -> data_nasc) && !is_null($cadastro ->  email)){

       
            if (move_uploaded_file($requests ->pic, $nomeFinal)){
                $tamanhoImg = filesize($nomeFinal); 
                if($tamanhoImg = 100){
                    $mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg)); 
                    $tamanhoImg = filesize($nomeFinal); 
                    $mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg));
                    $cadastro->foto = $mysqlImg;
                    $cadastro -> status = 1;
                    $cadastro->save();
                    $mensagem = 'cadastrado com sucesso!';
                    return view('cadastro', ['mensagem'=> $mensagem]);
                }
            }
            else{
                $mensagem = 'error!';
                return view('cadastro', ['mensagem'=> $mensagem]);
            }
        }
        return view('cadastro');
       
        
        
    }
    
    public function cadastro(Request $requests){
        $mensagem='';
        return view('cadastro', ['mensagem' => $mensagem]);
    }
   
    public function update(Request $requests){
        if($requests->status == 1){
            Cadastro::FindOrFail($requests->id)->update(['status' => 0]);
        }
        else{
            Cadastro::FindOrFail($requests->id)->update(['status' => 1]);
        }
        
        return redirect('/lista');
    }

   
    public function getDep(Request $requests, $tag){
        $id = $tag;
        $dependentes  = Dependente::where('id_cadastro', $id)->get();
        $cadastro = Cadastro::FindOrFail($id);
        return view('dependentes', ['dependentes'=>$dependentes, 'cadastro'=>$cadastro]);
    }
    

    public function excluirCadastro(Request $requests){
        $dataForm = $request->all();
        $dataForm['status'] = (!isset($dataForm['status']))? 0 : 1;
        $check = $request->op;
        return view('dependentes');
    }
    public function setDependente(Request $requests, $tag){
        $dependente = new Dependente();
        $dependente -> nome = $requests ->input('cNomeDep');
        $dependente -> data_nasc_dep = $requests -> input('cDataNasc');
        $dependente -> id_cadastro = $tag;
        $dependente -> save();
        return redirect('#');
    }
    
    public function deleteCadastro(Request $requests){
      
        if(!empty($_GET['check'])){

            $chk = $_GET['check'];

            foreach($chk as $item){
           
                Cadastro:: FindOrFail($item)->delete();
                
            }
                
        }       
        return redirect('/lista');
        
    }
        
}
