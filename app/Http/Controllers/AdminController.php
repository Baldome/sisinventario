<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use App\Models\Loan;
use App\Models\Location;
use App\Models\Tool;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminController extends BaseController
{
    use AuthorizesRequests;

    // public function __construct()
    // {
    //     $this->middleware('can:listar usuarios')->only('index');
    // }

    public function index()
    {
        $user = Auth::user();
        $users = User::all();
        $categories = Category::all();
        $locations = Location::all();
        $assets = Asset::all();
        $roles = Role::all();
        $permissions = Permission::all();
        $tools = Tool::all();
        $units = Unit::all();
        $loans = Loan::all();


        $your_loans = DB::table('loans')
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

        $activos_por_usuario = DB::table('assets')
            ->join('users', 'assets.user_id', '=', 'users.id')
            ->select('users.name', DB::raw('count(assets.id) as activos_count'))
            ->groupBy('users.name')
            ->get();

        return view('dashboard', compact(
            'users',
            'categories',
            'locations',
            'assets',
            'roles',
            'permissions',
            'tools',
            'units',
            'loans',
            'your_loans',
            'activos_por_usuario'
        ));
    }
}
