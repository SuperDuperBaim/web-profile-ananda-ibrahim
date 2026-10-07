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
            'image_url'   => 'nullable|string|max:1000',
            'link'        => 'nullable|string|max:500',
            'role'        => 'nullable|string|in:' . implode(',', self::ROLES),
            'tech'        => 'nullable|string',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('portfolios', 'public');
        } elseif ($request->filled('image_url')) {
            $imagePath = $this->normalizeUrl($request->image_url);
        }

        $techArray = [];
        if (!empty($request->tech)) {
            $techArray = array_values(array_filter(array_map('trim', explode(',', $request->tech))));
        }

        Portfolio::create([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => $imagePath,
            'link'        => $request->filled('link') ? $this->normalizeUrl($request->link) : null,
            'role'        => $request->role,
            'tech'        => $techArray,
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
            'image_url'   => 'nullable|string|max:1000',
            'link'        => 'nullable|string|max:500',
            'role'        => 'nullable|string|in:' . implode(',', self::ROLES),
            'tech'        => 'nullable|string',
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
            $imagePath = $this->normalizeUrl($request->image_url);
        }

        $techArray = [];
        if (!empty($request->tech)) {
            $techArray = array_values(array_filter(array_map('trim', explode(',', $request->tech))));
        }

        $portfolio->update([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => $imagePath,
            'link'        => $request->filled('link') ? $this->normalizeUrl($request->link) : null,
            'role'        => $request->role,
            'tech'        => $techArray,
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

    /**
     * Pastikan URL memiliki protokol https:// atau http://.
     * Jika tidak ada, tambahkan https:// secara otomatis.
     */
    private function normalizeUrl(string $url): string
    {
        $url = trim($url);
        if (!preg_match('/^https?:\/\//i', $url)) {
            $url = 'https://' . $url;
        }
        return $url;
    }
}
