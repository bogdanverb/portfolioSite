<?php

namespace App\Http\Controllers;

use SimpleQrcode;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PortfolioController extends Controller
{
    // Відображення списку портфоліо користувача
    public function index()
    {
        $portfolios = Portfolio::where('user_id', Auth::id())->get();
        return view('portfolios.index', compact('portfolios'));
    }

    // Показати форму для створення нового портфоліо
    public function create()
    {
        return view('portfolios.create');
    }

    // Зберегти нове портфоліо в базі даних
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Зміна для підтримки масиву зображень
            'video' => 'nullable|mimes:mp4,mov,avi,wmv|max:20480',
        ]);

        $portfolio = new Portfolio();
        $portfolio->user_id = Auth::id();
        $portfolio->title = $request->title;
        $portfolio->description = $request->description;

        // Обробка декількох зображень
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('portfolios/images', 'public');
            }
            $portfolio->images = json_encode($imagePaths); // Зберігаємо масив шляхів у JSON форматі
        }

        if ($request->hasFile('video')) {
            $portfolio->video_path = $request->file('video')->store('portfolios/videos', 'public');
        }

        $portfolio->save();

        return redirect()->route('portfolios.index')->with('success', 'Портфоліо успішно додано.');
    }

    // Показати форму для редагування портфоліо
    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->images = json_decode($portfolio->images, true); // Декодування JSON

        return view('portfolios.edit', compact('portfolio'));
    }

    // Оновити портфоліо в базі даних
// Оновити портфоліо в базі даних
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Зміна для підтримки масиву зображень
            'video' => 'nullable|mimes:mp4,mov,avi,wmv|max:20480',
        ]);

        $portfolio = Portfolio::findOrFail($id);
        $portfolio->title = $request->input('title');
        $portfolio->description = $request->input('description');

        // Обробка декількох зображень
        if ($request->hasFile('images')) {
            // Видалення старих зображень, якщо є
            if ($portfolio->images) {
                $oldImages = json_decode($portfolio->images);
                foreach ($oldImages as $oldImage) {
                    Storage::delete($oldImage);
                }
            }
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('portfolios/images', 'public');
            }
            $portfolio->images = json_encode($imagePaths); // Оновлюємо масив шляхів у JSON форматі
        }

        // Збереження нового відео, якщо воно було завантажено
        if ($request->hasFile('video')) {
            // Видалення старого відео, якщо є
            if ($portfolio->video_path) {
                Storage::delete($portfolio->video_path);
            }
            $portfolio->video_path = $request->file('video')->store('portfolios/videos', 'public'); // Збереження нового відео
        }

        $portfolio->save();

        return redirect()->route('portfolios.index')->with('success', 'Портфоліо успішно оновлено!');
    }

    // Показати конкретне портфоліо
    public function show($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('portfolios.show', compact('portfolio'));
    }

    // Генерація QR-коду
    public function generateQR($id)
    {
        // Знайти портфоліо за ID
        $portfolio = Portfolio::findOrFail($id);

        // Генерація даних для QR-коду (наприклад, посилання на деталі портфоліо)
        $qrCodeData = route('portfolios.show', ['portfolio' => $portfolio->id]);

        // Генерація QR-коду
        $qrCodeImage = QrCode::size(300)->generate($qrCodeData);

        // Повертаємо QR-код як HTML
        return response()->view('qr_code', ['qrCodeImage' => $qrCodeImage]);
    }

    // Видалити портфоліо
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        // Видалення зображення та відео, якщо вони існують
        if ($portfolio->images) {
            $oldImages = json_decode($portfolio->images);
            foreach ($oldImages as $oldImage) {
                Storage::delete($oldImage);
            }
        }
        if ($portfolio->video_path) {
            Storage::delete($portfolio->video_path);
        }
        $portfolio->delete();

        return redirect()->route('portfolios.index')->with('success', 'Портфоліо успішно видалено!');
    }
}
