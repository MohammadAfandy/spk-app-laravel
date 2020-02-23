<?php

namespace SpkApp\Http\Controllers;

use SpkApp\SubKriteria;
use Illuminate\Http\Request;
use SpkApp\Http\Requests\SubKriteriaRequest;
use SpkApp\Kriteria;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class SubKriteriaController extends Controller
{
    public function form(Kriteria $kriteria)
    {
        $sub_kriterias = SubKriteria::where('kriteria_id', $kriteria->id)->get();
        return view('kriteria._form_sub_kriteria', compact('kriteria', 'sub_kriterias'))->render();
    }

    public function store(SubKriteriaRequest $request)
    {
        $input = $request->all();

        $new_data = array_map(function($v) use ($input) {
            $v['kriteria_id'] = $input['kriteria_id'];
            $v['created_at'] = date('Y-m-d H:i:s');
            $v['updated_at'] = date('Y-m-d H:i:s');

            return $v;
        }, Arr::get($input, 'sub_kriteria_new', []));

        $old_data = array_map(function($v) use ($input) {
            $v['kriteria_id'] = $input['kriteria_id'];
            $v['updated_at'] = date('Y-m-d H:i:s');

            return $v;
        }, Arr::get($input, 'sub_kriteria', []));

        DB::transaction(function() use($request, $new_data, $old_data) {

            // Update data lama
            foreach($old_data as $id => $data) {
                SubKriteria::where('id', $id)->update([
                    'nama' => Arr::get($data, 'nama'),
                    'nilai' => Arr::get($data, 'nilai'),
                ]);
            }

            // Delete Data
            SubKriteria::where('kriteria_id', $request->kriteria_id)->whereNotIn('id', array_keys($old_data))->delete();

            // Insert Baru
            SubKriteria::insert($new_data);

        });

        return response()->json(['id' => $request->kriteria_id]);
    }
}
