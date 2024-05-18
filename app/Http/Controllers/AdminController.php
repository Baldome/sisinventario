<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $categories = Category::all();
        $locations = Location::all();
        $assets = Asset::all();
        $roles = Role::all();
        $permissions = Permission::all();

        return view('dashboard', compact('users', 'categories', 'locations', 'assets', 'roles', 'permissions'));
    }
}
