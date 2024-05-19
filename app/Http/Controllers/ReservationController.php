<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Carbon\Carbon;
class ReservationController extends Controller
{

    public function index(Request $request)
    {
        $query = $request->input('search');

        // fonction de recherche (avec les filtres, pour le moment uniquement par reservationID et bookID)
        $reservationsQuery = Reservation::query();
        if ($query) {
            $reservationsQuery->where('reservationID', 'like', "%$query%")
                ->orWhere('bookID', 'like', "%$query%");

        }

        $reservations = $reservationsQuery->paginate(20);

        return view('reservations', compact('reservations'));
    }


    public function actionmenu()
    {
        return view('action');
    }
    public function create()
    {
        return view('reservations');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'memberID' => 'required',
            'bookID' => 'required',
            'duration' => 'required|numeric',
        ]);

        $book = Book::find($validatedData['bookID']);

        if (!$book) {
            return redirect()->route('reservations')->with('error', 'Le livre n\'existe pas.');
        }

        // calcule la date de retour en ajoutant le nombre de jour
        $loanDate = Carbon::now();
        $dueDate = $loanDate->copy()->addDays($validatedData['duration']);


        $reservation = new Reservation;
        $reservation->memberID = $validatedData['memberID'];
        $reservation->bookID = $validatedData['bookID'];
        $reservation->loan_date = $loanDate;
        $reservation->due_date = $dueDate;


        $reservation->save();


        return redirect('/reservations')->with('success', 'Reservation ajoutée avec succès.');
    }
    public function destroy($id)
    {
        $reservation = reservation::findOrFail($id);
        $reservation->delete();

        return redirect('/reservations')->with('success', 'Reservation supprimée avec succès.');
    }

}




