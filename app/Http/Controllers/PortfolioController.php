<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PortfolioController extends Controller
{
    /**
     * Get all portfolio items for the landing page
     */
    public function index()
    {
        $keyCreations = Portfolio::active()
            ->keyCreations()
            ->ordered()
            ->get();

        $otherProjects = Portfolio::active()
            ->otherProjects()
            ->ordered()
            ->get();

        return Inertia::render('Landing/Content/Content', [
            'keyCreations' => $keyCreations,
            'otherProjects' => $otherProjects
        ]);
    }

    /**
     * Get only key creations
     */
    public function keyCreations()
    {
        $keyCreations = Portfolio::active()
            ->keyCreations()
            ->ordered()
            ->get();

        return response()->json($keyCreations);
    }

    /**
     * Get only other projects
     */
    public function otherProjects()
    {
        $otherProjects = Portfolio::active()
            ->otherProjects()
            ->ordered()
            ->get();

        return response()->json($otherProjects);
    }
}
