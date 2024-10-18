<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accomodations;
use Illuminate\Support\Facades\Validator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


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
    public function save(Request $request){
        //validando la entrada de datos
        Validator::make($request->all(),[


        ]);
        //se utiliza cuando trabajamos con vistas
        $request->validate([
            'accomodation' =>'required|string|max:50',
            'address' => 'required|string|max:150',
            'description'=>'required|string|max:255',
            'image'=>'required|image|mimes:jpg,png,jpeg,gif|max:2048'
        ]);
        //subir imagen a cloudinary y lo guardamos en la carpeta accomodations
        $uploadImage = $request->file('image')->storeOnCloudinary('accomodations');
        //solicitamos la ruta de la imagenque se subio a cloudinary
        $urlImage=$uploadImage->getSecurePath();
        //insertamos la informacion
        $accomodations = new Accomodations();
        $accomodations -> name = $request->input('accomodation');
        $accomodations -> address = $request->input('address');
        $accomodations -> description = $request->input('description');
        //guardamos la ruta de la imagen
        $accomodations -> image = $urlImage;
        $accomodations -> save();

        //redireccionamos a la misma pagina
        return redirect()->route('listAccomodations');
    }
}
