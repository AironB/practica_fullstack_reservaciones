<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bookings;
use Illuminate\Http\Request;
use App\Models\Accomodations;

class BookingsController extends Controller
{
    //metodo para mostrar reservaciones por alojamiento
    public function get_bookings_accomodation(Request $request){
        //consulta para mostrar el id y el nombre del alojamiento
        $acomodations = Accomodations::select('id', 'name')->get();

        if($request->has('select_accomodations')){
            $id_accomodations = $request->input('select_accomodations');
            $bookings = Bookings::join('accomodations', 'bookings.accomodation_id','=','accomodations.id')->where('accomodation_id', $id_accomodations)->select('bookings.*','accomodations.name as accomodation')->get();
        }else{
            $bookings = [];
        }

       

        return view('pages.bookings',array(
            "accomodations"=>$acomodations,
            "bookings"=>$bookings));
    }
    //metodo para crear reservaciones
    public function getForm(){
        $accomodations = Accomodations::select('id', 'name as accomodation')->get();
        $users = User::select('id','name as user')->get();
       //esta funcion sirve para testear si se esta enviando data
        //dd($accomodations);
        return view('pages.register_bookings', array([
            'accomodation' => $accomodations,
            'users' => $users
        ]));
    }
    //metodo para guardar reservaciones
    public function save(Request $request){
        $request->validate([
            'booking' =>'required|string|max:10',
            'in_date' => 'required|date_format:Y-m-d',
            'out_date'=>'required|date_format:Y-m-d|after_or_equal:in_date',
            'total_amount'=>'required|numeric',
            'accomodation'=>'required',
            'user'=>'required'
        ]);
    }
}
