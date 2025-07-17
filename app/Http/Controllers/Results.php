<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Models\Signup;
use App\Models\SignupStudent;
use App\Models\Result;
use App\Models\Report;
use App\Http\Requests\StorestudentRequest;
use App\Http\Requests\StorereportRequest;


use Illuminate\Support\Facades\Hash;

class Results extends Controller
{

    // store data in database

    public function store_signup(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:100',
            'IC' => 'required',
            'password' => 'required|string|min:6',
            're-password' => 'required|same:password',
        ]);

        // Check if passwords match
        if ($request->password !== $request->{'re-password'}) {
            return back()->withErrors(['password' => 'Passwords do not match.'])->withInput();
        }

        Signup::create([
            'username' => $request->username,
            'ic' => $request->IC,
            'password' => $request->password,
        ]);

        return redirect('/')->with('success', 'Registration successful! Please login.');
    }

    public function store_student(StorestudentRequest $request)
    {
        // Check if passwords match
        if ($request->password !== $request->{'re-password'}) {
            return back()->withErrors(['password' => 'Passwords do not match.'])->withInput();
        }

        SignupStudent::create([
            'student_name' => $request->student_name,
            'IC'           => $request->IC,
            'password'     => $request->password,
        ]);

        return redirect('/')->with('success', 'Registration successful! Please login.');
    }


    public function store_report(StorereportRequest $request)
    {
        Report::create($request->all());
        return redirect('/home');
    }

    public function store_result(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string|max:100',
            'student_ic' => 'required|numeric',
            'student_subject' => 'required|string',
            'student_mark' => 'required|numeric'
        ]);

        Result::create($request->all());
        return redirect('/result');
    }

    public function edit(Result $display2)
    {
        return view('admin/edit', compact('display2'));
    }

    // edit

    public function update(Request $request, Result $display2)
    {
        $request->validate([
            'student_name' => 'required|string',
            'student_ic' => 'required|numeric',
            'student_subject' => 'required|string',
            'student_mark' => 'required|numeric'
        ]);

        $display2->update($request->all());

        return redirect('/result')->with('success', 'result updated!');
    }

    // delete

    public function destroy(Result $display2)
    {
        $display2->delete();
        return redirect('/result')->with('success', 'result deleted!');
    }

    // login

    public function authenticate(Request $request)
    {
        $request->validate([
            'IC' => 'required',
            'password' => 'required',
            'role' => 'required|in:admin,student',
        ]);

        if ($request->role == 'admin') {
            $user = Signup::where('ic', $request->IC)->first();


            Log::info('Admin login attempt', [
                'IC' => $request->IC,
                'user_found' => $user ? 'yes' : 'no',
                'password_check' => $user ? Hash::check($request->password, $user->password) : 'no_user'
            ]);

            if ($user && Hash::check($request->password, $user->password)) {
                session([
                    'role' => 'admin',
                    'user_id' => $user->id,
                    'student_ic' => $user->ic,
                ]);
                return redirect('/form'); // admin dashboard
            }
        } elseif ($request->role == 'student') {
            $user = SignupStudent::where('IC', $request->IC)->first();


            Log::info('Student login attempt', [
                'IC' => $request->IC,
                'user_found' => $user ? 'yes' : 'no',
                'password_check' => $user ? Hash::check($request->password, $user->password) : 'no_user'
            ]);

            if ($user && Hash::check($request->password, $user->password)) {
                session([
                    'role' => 'student',
                    'user_id' => $user->id,
                    'student_ic' => $user->IC,
                ]);
                return redirect('/home'); // student dashboard
            }
        }

        return back()->withErrors(['message' => 'Invalid IC or PASSWORD']);
    }

    // logout

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }


    // page signup

    public function signup_admin()
    {
        return view('admin/signup');
    }

    public function signup_student()
    {
        return view('student/signup-student');
    }


    // display home page student

    public function home()
    {

        $studentIC = session('student_ic');

        if (!$studentIC) {
            return redirect('/')->withErrors(['message' => 'You must log in first']);
        }

        $results = \App\Models\Result::where('student_ic', $studentIC)->get();

        return view('student.home-student', compact('results'));
    }

    public function display_result()
    {
        $query = Result::query();
        if (request()->has('search_ic') && request('search_ic') !== null && request('search_ic') !== '') {
            $query->where('student_ic', 'like', '%' . request('search_ic') . '%');
        }
        $admin = $query->get();
        return view('admin/display-mark', compact('admin'));
    }

    public function student_report()
    {
        return view('student/report-student');
    }

    public function login()
    {
        return view('admin/login');
    }

    public function register()
    {
        return view('admin.signup');
    }

    public function displayReport()
    {
        $reports = Report::all();
        return view('admin.display-report', compact('reports'));
    }


    public function create()
    {
        return view('admin.home-admin');
    }
}
