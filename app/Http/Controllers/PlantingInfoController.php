<?php

namespace App\Http\Controllers;

use App\Models\PlantingInfo;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PlantingInfoController extends Controller
{
    public function getInfoForDate(Request $request)
    {
        $request->validate([
            'year' => 'required|integer|min:1900|max:2100',
            'month' => 'required|integer|min:1|max:12', // bulan 1-indeks
            'day' => 'required|integer|min:1|max:31',
        ]);

        try {
            $date = Carbon::create($request->year, $request->month, $request->day)->toDateString();
            $info = PlantingInfo::where('date', $date)->first();

            if ($info) {
                return response()->json([
                    'rekomendasi' => $info->recommendations,
                    'suhu' => $info->temperature,
                ]);
            } else {
                return response()->json([
                    'rekomendasi' => 'Belum ada data.',
                    'suhu' => '-',
                ], 404); // Atau kembalikan pesan default dengan 200
            }
        } catch (\Exception $e) {
             // Tangani pembuatan tanggal yang tidak valid (mis., 30 Feb)
            return response()->json([
                'rekomendasi' => 'Tanggal tidak valid.',
                'suhu' => '-',
            ], 400);
        }
    }
}