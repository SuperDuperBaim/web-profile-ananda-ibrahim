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
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_url'   => 'nullable|url|max:1000',
            'link'        => 'nullable|url',
            'role'        => 'nullable|string|in:' . implode(',', self::ROLES),
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('portfolios', 'public');
        } elseif ($request->filled('image_url')) {
            $imagePath = $request->image_url;
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

    public function edit(Portfolio $portfolio)
    {
        return view('portfolios.edit', ['portfolio' => $portfolio, 'roles' => self::ROLES]);
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_url'   => 'nullable|url|max:1000',
            'link'        => 'nullable|url',
            'role'        => 'nullable|string|in:' . implode(',', self::ROLES),
        ]);

        $imagePath = $portfolio->image; // keep existing

        if ($request->hasFile('image')) {
            // Delete old file if stored locally
            if ($imagePath && !str_starts_with($imagePath, 'http')) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('portfolios', 'public');
        } elseif ($request->filled('image_url')) {
            // Delete old local file if replacing with URL
            if ($imagePath && !str_starts_with($imagePath, 'http')) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->image_url;
        }

        $portfolio->update([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => $imagePath,
            'link'        => $request->link,
            'role'        => $request->role,
        ]);

        return redirect()->route('portfolios.index')->with('success', 'Portofolio berhasil diperbarui!');
    }

    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->image && !str_starts_with($portfolio->image, 'http')) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($portfolio->image);
        }
        $portfolio->delete();
        return redirect()->route('portfolios.index')->with('success', 'Portofolio berhasil dihapus!');
    }
}
