<?php

namespace App\Http\Controllers\Api;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PendudukController extends Controller
{
    public function getData(Request $request)
    {
        $filterField = $request->input('filter');
        $filterValue = $request->input('filterValue');

        $data = Penduduk::whereHas('rt.rw');

        if ($filterField && $filterValue) {
            foreach ($filterField as $key => $value) {
                if ($filterField[$key] != null || $filterValue[$key] != null) {
                    $data->where($value, '=', $filterValue[$key]);
                }
            }
        }

        $result = $data->get()->map(function ($query) {
            $query->tanggal_lahir_format = $query->tanggal_lahir->translatedFormat('d F Y');

            return $query;
        });

        return response()->json([
            'isSuccess' => true,
            'statusCode' => 200,
            'data' => $result
        ]);
    }
}
