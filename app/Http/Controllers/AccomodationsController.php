<?php

namespace App\Http\Controllers;

use App\Models\Accomodations;
use Illuminate\Http\Request;

class AccomodationsController extends Controller
{
    //
    public function get_accomodations(){
        //hacemos la consulta
        $accomodations = Accomodations::all();
        //le decimos que dentro de la consulta enviamos un arreglo asociativo
        return view('pages.accomodations', array("accomodations"=>$accomodations));
        //si enviaramos despues de la variable un nuevo metodo de tipo array por ejemplo "hobbies" =>[1,2,3] solo necesitariamos llamar la variable $hobbies en el printr del accomodations.blade para que nos muestre esa informacion

    }
}
