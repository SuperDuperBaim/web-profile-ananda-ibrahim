<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public const ROLES = [
        'Frontend Developer',
        'Backend Developer',
        'Fullstack Developer',
        'UI/UX Designer',
    ];

    public function index()
    {
        $experiences = Experience::all();
        return view('experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('experiences.create', ['roles' => self::ROLES]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'period'      => 'required|string|max:255',
            'role'        => 'required|string|in:' . implode(',', self::ROLES),
            'company'     => 'required|string|max:255',
            'description' => 'required|string',
            'tech'        => 'nullable|string',
        ]);

        if (!empty($validated['tech'])) {
            $validated['tech'] = array_map('trim', explode(',', $validated['tech']));
        } else {
            $validated['tech'] = [];
        }

        Experience::create($validated);
        return redirect()->route('experiences.index')->with('success', 'Experience berhasil ditambahkan!');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('experiences.index')->with('success', 'Experience berhasil dihapus!');
    }
}
