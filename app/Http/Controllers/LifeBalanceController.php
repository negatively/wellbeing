<?php

namespace App\Http\Controllers;

use App\Models\LifeBalance;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\LifeBalanceRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class LifeBalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $lifeBalances = LifeBalance::paginate();

        return view('life-balance.index', compact('lifeBalances'))
            ->with('i', ($request->input('page', 1) - 1) * $lifeBalances->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $lifeBalance = new LifeBalance();

        return view('life-balance.create', compact('lifeBalance'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LifeBalanceRequest $request): RedirectResponse
    {
        $lifeBalance = $request->validated();
        $lifeBalance['user_id'] =  Auth::id();
        $lifeBalance['date'] = Carbon::now();
        LifeBalance::create($lifeBalance);

        return Redirect::route('life-balances.index')
            ->with('success', 'LifeBalance created successfully.');
    }
}
