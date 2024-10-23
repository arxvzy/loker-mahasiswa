<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Loker;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Filament\Resources\CategoryResource;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class LokerController extends Controller
{
    use HasUlids;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $lokers = Loker::latest();

        // search filter
        if ($request->has('search')) {
            $lokers->where(function ($query) use ($request) {
                $query->where('posisi', 'like', '%' . $request->search . '%')
                    ->orWhere('deskripsi_perusahaan', 'like', '%' . $request->search . '%')
                    ->orWhere('nama_perusahaan', 'like', '%' . $request->search . '%')
                    ->orWhereHas('category', function ($query) use ($request) {
                        $query->where('name', 'like', '%' . $request->search . '%');
                    });
            });
        }

        // kategori filter
        if ($request->has('wilayah')) {
            $lokers->whereHas('category', function ($query) use ($request) {
                $query->where('name', str_replace('-', ' ', $request->wilayah));
            });
        }

        // pendidikan filter
        if ($request->has('pendidikan')) {
            $pendidikan = $request->pendidikan;

            if ($pendidikan == 'sma-smk') {
                $lokers->where('pendidikan', 'SMA/SMK');
            } elseif ($pendidikan == 'd1-d3') {
                $lokers->where('pendidikan', 'D1-D3');
            } elseif ($pendidikan == 's1-d4') {
                $lokers->where('pendidikan', 'S1/D4');
            }
        }

        // status filter
        if ($request->has('status')) {
            $lokers->where('status_kerja', str_replace('-', ' ', $request->status));
        }

        $lokers = $lokers->paginate(20)->withQueryString();
        $categories = Category::all();
        
        // get last 7 days record order by most viewers for carousel
        $date = Carbon::now()->subDays(7);
        $carousel = Loker::where('created_at', '>=', $date)->orderBy('pengunjung', 'desc')->take(10)->get();

        return view('loker.index', compact('lokers', 'categories', 'carousel'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $loker = Loker::find($id);
        $categories = Category::take(9)->get();
        $loker->increment('pengunjung');
        return view('loker.detail', compact('loker', 'categories'));
    }
}
