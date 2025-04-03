<?php

namespace App\Http\Controllers;

use App\Models\Wellbeing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\WellbeingRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class WellbeingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $wellbeings = Wellbeing::paginate();

        return view('wellbeing.index', compact('wellbeings'))
            ->with('i', ($request->input('page', 1) - 1) * $wellbeings->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $wellbeing = new Wellbeing();

        return view('wellbeing.create', compact('wellbeing'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WellbeingRequest $request): RedirectResponse
    {
        $wellbeing = $request->validated();
        $wellbeing['user_id'] =  Auth::id();
        Wellbeing::create($wellbeing);

        return Redirect::route('wellbeings.index')
            ->with('success', 'Wellbeing created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $wellbeing = Wellbeing::find($id);

        return view('wellbeing.show', compact('wellbeing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $wellbeing = Wellbeing::find($id);

        return view('wellbeing.edit', compact('wellbeing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WellbeingRequest $request, Wellbeing $wellbeing): RedirectResponse
    {
        $wellbeing->update($request->validated());

        return Redirect::route('wellbeings.index')
            ->with('success', 'Wellbeing updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Wellbeing::find($id)->delete();

        return Redirect::route('wellbeings.index')
            ->with('success', 'Wellbeing deleted successfully');
    }
}
