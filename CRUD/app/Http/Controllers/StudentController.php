<?php

namespace App\Http\Controllers;

use App\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{
    /**
     * Function for listing the details 
     */
    public function Index()
    {
        $users= Registration::paginate(2);
        return view('student_details',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create() 
    {
        return view('student_registration');
    }

    /**
     * Store a newly created resource in storage
     */

    public function store(Request $request)
    {
        $data = $request->validate( [
            'name' => ['required', 'alpha_num', 'max:255'],
            'full_name' => ['required', 'alpha', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:registrations,email'],
            'password' => ['required', 'string', 'min:8'],
            'confirm_password' => ['required','same:password'],
        ],
        ['name.required' => 'The username field is required',
        'confirm_password.same' => 'Password does not match',
        'password.required' => 'The password field is required'
        ]);
        Registration :: create([
            'name' => $data['name'],
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

         return redirect('/students');
    }

    /**
     * Show the form for editing the resource
     */

    public function edit($id)
    {
        $student = Registration :: findOrFail($id);
        return view('edit',compact('student'));
    }

    /**
     * Function for updating the res
     */

    public function update(Request $request,$id)
    {
        $data = $request -> validate([
            'name' => 'required|alpha_num|max:255',
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:registrations,email',
        ],
        ['name.required' => 'The username field is required',
        ]);
        Registration::whereId($id) -> update([
            'name' => $data['name'],
            'full_name' => $data['full_name'],
            'email' => $data['email'],
        ]);
        return redirect('/students');
    }

    /**
     * Function for deleting the row
     */

    public function destroy($id)
    {
        $student = Registration :: findOrFail($id);
        $student -> delete();
        return redirect('/students');
    }

    public function show($id)
    {
        $data = Registration :: findOrFail($id);
        return view('show',compact('data'));
    }

    public function search_name(Request $request)
    {
        $data = $request -> validate(['search' => ['required', 'string', 'max:255'],]);
        $data = $request -> search;
        $users = Registration :: where('name','like',$data.'%') -> paginate(2);
        $users -> appends(['search' => $data]);
        return view('student_details',compact('users'));
    }

    public function search_full_name(Request $request)
    {
        $data = $request -> validate(['name_search' => ['required', 'string', 'max:255'],]);
        $data = $request -> name_search;
        $users = Registration :: where('full_name','like',$data.'%') -> paginate(2);
        $users -> appends(['name_search' => $data]);
        return view('student_details',compact('users'));
    }

    public function search_email(Request $request)
    {
        $data = $request -> validate(['email_search' => ['required', 'string', 'max:255'],]);
        $data = $request -> email_search;
        $users = Registration :: where('email','like',$data.'%') -> paginate(2);
        $users -> appends(['email_search' => $data]);
        return view('student_details',compact('users'));
    }
}
