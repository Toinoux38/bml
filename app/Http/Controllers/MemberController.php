<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Member;
class MemberController extends Controller
{

    public function index(Request $request)
    {
        $query = $request->input('search');

        // Conditionally apply search filters
        $membersQuery = member::query();
        if ($query) {
            $membersQuery->where('memberID', 'like', "%$query%")
                ->orWhere('lastname', 'like', "%$query%");
        }

        $members = $membersQuery->paginate(20);

        return view('members', compact('members'));
    }


    public function actionmenu()
    {
        // Change 10 to the desired number of members per page
        return view('action');
    }
    public function create()
    {
        return view('members'); // Return the dashboard view where the modal is located
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            // Add more validation rules as per your member model
        ]);

        // Calculate the new memberID
        $maxmemberID = member::max('memberID');
        $newmemberID = $maxmemberID + 1;

        // Create a new member instance
        $member = new member;
        $member->memberID = $newmemberID;
        $member->lastname = $validatedData['lastname'];
        $member->firstname = $validatedData['firstname'];
        $member->phonenumber = $validatedData['phonenumber'];

        // Save the member to the database
        $member->save();

        // Redirect back to the dashboard with a success message
        return redirect('/members')->with('success', 'member added successfully');
    }
    public function destroy($id)
    {
        $member = member::findOrFail($id);
        $member->delete();

        // You can return a response if needed
        return response()->json(['message' => 'member deleted successfully']);
    }

}




