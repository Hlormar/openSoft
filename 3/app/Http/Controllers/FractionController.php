<?php

namespace App\Http\Controllers;

use App\Models\Fraction;
use Illuminate\Http\Request;
use App\Models\WebsiteDate;

class FractionController extends Controller
{
    // Получение всех фракций
    public function index()
    {
        $fractions = Fraction::all();
        $websiteDate = WebsiteDate::first();

        return view('index', compact(
            'fractions',
            'websiteDate'
        ));
    }

    // Отображение формы создания
    public function create()
    {
        $websiteDate = WebsiteDate::first();
        return view('fractions.create', compact('websiteDate'));
    }

    // Сохранение новой фракции
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string',
            'image_path' => 'nullable|string|max:2048',
        ]);

        Fraction::create($validated);

        return redirect()->route('fractions.index');
    }

    // Отображение отдельной фракции
    public function show(Fraction $fraction)
    {
        return response()->json([
            'id' => $fraction->id,
            'name' => $fraction->name,
            'subtitle' => $fraction->subtitle,
            'description' => $fraction->description,
            'image' => asset('storage/laravel/' . $fraction->image_path),
        ]);
    }

    // Отображение формы редактирования
    public function edit(Fraction $fraction)
    {
        return view('fractions.edit', compact('fraction'));
    }

    // Обновление существующей фракции
    public function update(Request $request, Fraction $fraction)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string',
            'image_path' => 'nullable|string|max:2048',
        ]);

        $fraction->update($validated);

        return redirect()->route('fractions.index');
    }

    // Удаление фракции
    public function destroy(Fraction $fraction)
    {
        $fraction->delete();

        return redirect()->route('fractions.index');
    }
}