<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\AccomodationsController;

Route::get('/', function () {
    return view('home');
});
// Route::get('/accomodations', function () {
//     // echo "Pagina de alojamientos";
//     return View('pages.accomodations');
// });
Route::get('/accomodations', [AccomodationsController::class, 'get_accomodations'])->name('listAccomodations');
Route::get('/bookings', [BookingsController::class, 'get_bookings_accomodation'])->name('bookingsByAccomodation');
Route::post('/save_accomodation' , [AccomodationsController::class, 'save'])->name('saveAccomodation');

Route::get('/formulario', [BookingsController::class, 'getForm'])->name('formBooking');

/**Al utilizar la funcion url()=> se hace referencia a la uri de la ruta
 * la funcion route()=> se hace referencia a la accion de una ruta
 */