<?php

namespace App\Http\Controllers;

use App\Models\Anggotas;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AnggotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $data = [
            'anggotas' => Anggotas::simplePaginate(10)
        ];
        return view('admin.anggota.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $this->validate($request, [
                'id_anggota' => 'required|max:10|min:6',
                'nama' => 'required|max:25|min:3',
                'no_telp' => 'required|max:13|min:12'
            ]);
        } catch (ValidationException $e) {
        }
        Anggotas::create([
            'id_anggota' => $request -> id_anggota,
            'nama' => $request -> nama,
            'no_telp' => $request -> no_telp
        ]);

        return redirect() -> route('anggota.index') -> with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $data = [
            'anggotas' => Anggotas::findorfail($id)
        ];
        return view('admin.anggota.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        try {
            $this->validate($request, [
                'id_anggota' => 'required|max:10|min:6',
                'nama' => 'required|max:25|min:3',
                'no_telp' => 'required|max:13|min:12'
            ]);
        } catch (ValidationException $e) {
        }

        $anggotasData = [
            'id_anggota' => $request -> id_anggota,
            'nama' => $request -> nama,
            'no_telp' => $request -> no_telp
        ];

        Anggotas::whereId($id) -> update($anggotasData);

        return redirect() -> route('anggota.index') -> with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $angggota = Anggotas::findorfail($id);
        $angggota -> delete();

        return redirect() ->back() -> with('success', 'Berhasil dihapus');
    }
}
