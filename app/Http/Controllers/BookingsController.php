<?php

namespace App\Http\Controllers;

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
}
