<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Carbon\Carbon;
class ReservationController extends Controller
{

    public function index(Request $request)
    {
        $query = $request->input('search');

        // Conditionally apply search filters
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
        // Change 10 to the desired number of reservations per page
        return view('action');
    }
    public function create()
    {
        return view('reservations'); // Return the dashboard view where the modal is located
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'memberID' => 'required',
            'bookID' => 'required',
            'duration' => 'required|numeric', // Ensure duration is numeric
        ]);

        // Calculate due date based on loan duration
        $loanDate = Carbon::now(); // Current date is the loan date
        $dueDate = $loanDate->copy()->addDays($validatedData['duration']); // Add loan duration to get due date

        // Create a new reservation instance
        $reservation = new Reservation;
        $reservation->memberID = $validatedData['memberID'];
        $reservation->bookID = $validatedData['bookID'];
        $reservation->loan_date = $loanDate; // Store loan date
        $reservation->due_date = $dueDate; // Store due date

        // Save the reservation to the database
        $reservation->save();

        // Redirect back to the dashboard with a success message
        return redirect('/reservations')->with('success', 'Reservation added successfully');
    }
    public function destroy($id)
    {
        $reservation = reservation::findOrFail($id);
        $reservation->delete();

        // You can return a response if needed
        return redirect('/reservations')->with('success', 'reservation deleted successfully');
    }

}




