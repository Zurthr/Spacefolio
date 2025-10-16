<?php

namespace App\Http\Controllers;

use App\Models\Recommendation;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    /**
     * Return all recommendations.
     */
    public function index()
    {
        $recommendations = Recommendation::query()->latest()->get();
        return response()->json($recommendations);
    }
}


