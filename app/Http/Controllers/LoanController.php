<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Tool;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $tools = Tool::with(['unit', 'category', 'location', 'user'])->get();
        $users = User::all();

        $loans = DB::table('loans')
            ->join('tools', 'loans.tool_id', '=', 'tools.id')
            ->where('tools.user_id', '=', $user->id)
            ->select(
                'tools.*',
                'loans.id as loan_id',
                'loans.date_time_loan',
                'loans.date_time_return',
                'loans.expected_return_date',
                'loans.borrower_user_id',
                'loans.isBorrowed',
                'loans.observations'
            )
            ->get();

        return view('admin.loans.index', compact('tools', 'users', 'loans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $tool = Tool::with('category', 'location', 'unit')->findOrFail($id);
        $users = User::where('id', '!=', auth()->id())->get();
        return view('admin.loans.create', compact('tool', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tool_id' => 'required',
            'borrower_user_id' => 'required',
            'date_time_loan' => 'required|date',
            'expected_return_date' => 'date|after:date_time_loan',
        ]);

        try {
            $loan = new Loan();
            $loan->tool_id = $request->tool_id;
            $loan->borrower_user_id = $request->borrower_user_id;
            $loan->date_time_loan = $request->date_time_loan;
            $loan->expected_return_date = $request->expected_return_date;
            $loan->isBorrowed = 1;
            $loan->observations = $request->observations;
            $loan->save();

            return redirect()->route('tools.index')
                ->with('message', 'Asignación correcta!')
                ->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('message', 'Ocurrió un error al prestar la herramienta')
                ->with('icon', 'error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        return view('admin.loans.show', compact('loan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $loan)
    {
        $users = User::where('id', '==', auth()->id())->get();
        return view('admin.loans.edit', compact('loan', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loan $loan)
    {
        $request->validate([
            'date_time_return' => 'required|date',
        ]);

        try {
            $loan->date_time_return = $request->date_time_return;
            $loan->isBorrowed = 0;
            $loan->observations = $request->observations;
            $loan->update();

            return redirect()->route('loans.return')
                ->with('message', 'Se hizo la devolucion de la manera correcta!')
                ->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('message', 'Ocurrió un error al devolver la herramienta!')
                ->with('icon', 'error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        
    }

    public function return()
    {
        $user = Auth::user()->id;
        $loans = DB::table('loans')
            ->join('tools', 'loans.tool_id', '=', 'tools.id')
            ->join('users', 'tools.user_id', '=', 'users.id')
            ->where('loans.isBorrowed', '=', 1)
            ->where('loans.borrower_user_id', '=', $user)
            ->select('tools.*', 'users.name as user_name', 'loans.id as loan_id', 'loans.date_time_loan', 'loans.expected_return_date', 'loans.borrower_user_id', 'loans.observations')
            ->get();

        return view('admin.loans.your-loans', compact('loans'));
    }
}
