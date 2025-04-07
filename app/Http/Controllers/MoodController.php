<?php

namespace App\Http\Controllers;

use App\Models\Mood;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\MoodRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Carbon\Carbon;

class MoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $period = $request->get('period', 'day');
        $user = Auth::user();
        
        // Get date range based on selected period
        $startDate = null;
        $endDate = Carbon::now();
        
        switch ($period) {
            case 'day':
                $startDate = Carbon::today();
                break;
            case 'week':
                $startDate = Carbon::now()->subWeek();
                break;
            case 'month':
                $startDate = Carbon::now()->subMonth();
                break;
            case 'year':
                $startDate = Carbon::now()->subYear();
                break;
        }
        
        // Get moods within date range
        $moods = Mood::where('user_id', $user->id)
            ->whereBetween('date', [$startDate, $endDate])
            ->orderBy('date', 'desc')
            ->get();

        return view('mood.index', compact('moods', 'period'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $mood = new Mood();

        return view('mood.create', compact('mood'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MoodRequest $request): RedirectResponse
    {
        $mood = $request->validated();
        $mood['user_id'] =  Auth::id();
        $mood['date'] = Carbon::now();
        Mood::create($mood);

        return Redirect::route('moods.index')
            ->with('success', 'Mood created successfully.');
    }

    public function destroy($id): RedirectResponse
    {
        Mood::find($id)->delete();

        return Redirect::route('moods.index')
            ->with('success', 'Mood deleted successfully');
    }
}
