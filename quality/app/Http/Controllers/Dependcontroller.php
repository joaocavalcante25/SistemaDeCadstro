<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cadastro;
use App\Models\Dependente;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;

class Dependcontroller extends Controller
{
    //
    public function deleteDependente(Request $requests, $id_user){
        $id = $id_user;
        $id_cad = Dependente:: FindOrFail($id)->id_cadastro;
        Dependente:: FindOrFail($id)->delete();
        return redirect('/'. $id_cad);
    }
    
}

