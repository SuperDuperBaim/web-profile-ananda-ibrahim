<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public const ROLES = [
        'Frontend Developer',
        'Backend Developer',
        'Fullstack Developer',
        'UI/UX Designer',
    ];

    public function index()
    {
        $portfolios = Portfolio::latest()->get();
        return view('portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        return view('portfolios.create', ['roles' => self::ROLES]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'link'        => 'nullable|url',
            'role'        => 'nullable|string|in:' . implode(',', self::ROLES),
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('portfolios', 'public');
        }

        Portfolio::create([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => $imagePath,
            'link'        => $request->link,
            'role'        => $request->role,
        ]);

        return redirect()->route('portfolios.index')->with('success', 'Portofolio berhasil ditambahkan!');
    }

    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($portfolio->image);
        }
        $portfolio->delete();
        return redirect()->route('portfolios.index')->with('success', 'Portofolio berhasil dihapus!');
    }
}
