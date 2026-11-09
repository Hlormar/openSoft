<?php

namespace App\Http\Controllers;

use App\Models\Fraction;
use App\Models\WebsiteDate;

// запрос для валидации
use App\Http\Requests\FractionRequest;

//для сохр картинок в хранилище
use Illuminate\Support\Facades\Storage;

// для изм размера картинок
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Format;

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

    //приватная функция сжатия и сохранения картинки, возвращает относительный путь
    private function saveImage(UploadedFile $file): string
    {
        //сжатие до максимального размера, сохраяняя пропорцию
        $image = Image::decode($file)
            ->scaleDown(
                width: 1920,
                height: 1080
            );

        $encodedImage = $image->encodeUsingFormat(
            Format::WEBP,
            quality: 90
        );

        $filename = Str::uuid() . '.webp';

        Storage::disk('public')->put(
            'laravel/res/adeptus/' . $filename,
            (string) $encodedImage
        );

        return 'res/adeptus/' . $filename;
    }

    // Отображение формы создания
    public function create()
    {
        $websiteDate = WebsiteDate::first();
        return view('fractions.form', compact('websiteDate'));
    }

    // Сохранение новой фракции
    public function store(FractionRequest $request)
    {
        $validated = $request->validated();


        if ($request->hasFile('image')) {
            $validated['image_path'] = $this->saveImage(
                $request->file('image')
            );
        }

        unset($validated['image']);

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
        $websiteDate = WebsiteDate::first();

        return view('fractions.form', compact(
            'fraction',
            'websiteDate'
        ));
    }

    // Обновление существующей фракции
    public function update(FractionRequest $request, Fraction $fraction)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {

            // Сохраняем новое изображение.
            $newImagePath = $this->saveImage(
                $request->file('image')
            );

            // Удаляем старое изображение.
            if ($fraction->image_path) {
                Storage::disk('public')->delete(
                    'laravel/' . $fraction->image_path
                );
            }

            $validated['image_path'] = $newImagePath;
        }

        unset($validated['image']);

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