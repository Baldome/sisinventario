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
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
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

        return view('dashboard', compact('users', 'categories', 'locations', 'assets', 'roles', 'permissions', 'tools', 'units', 'loans'));
    }
}
