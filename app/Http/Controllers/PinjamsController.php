<?php

namespace App\Http\Controllers;

use App\Models\Anggotas;
use App\Models\Bukus;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Pinjams;
use Illuminate\Validation\ValidationException;

class PinjamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $data = [
            'pinjams' => Pinjams::with('bukus') -> simplePaginate(10)
        ];
        return view('admin.pinjam.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $data = [
            'anggotas' => Anggotas::all(),
            'bukus' => Bukus::all()
        ];
        return view('admin.pinjam.create', $data);
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
                'tgl_pinjam' => 'required',
                'tgl_kembali' => 'required',
                'id_anggota' => 'required'
            ]);
        } catch (ValidationException $e) {
        }
        $pinjams = Pinjams::create([
            'tgl_pinjam' => $request -> tgl_pinjam,
            'tgl_kembali' => $request -> tgl_kembali,
            'id_anggota' => $request -> id_anggota
        ]);

        $pinjams -> bukus() -> attach($request -> bukus);

        return redirect() -> route('pinjam.index') -> with('success', 'Data berhasil disimpan');
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
            'anggotas' => Anggotas::all(),
            'bukus' => Bukus::all(),
            'pinjams' => Pinjams::findorfail($id)
        ];
        return view('admin.pinjam.edit', $data);
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
                'tgl_pinjam' => 'required',
                'tgl_kembali' => 'required',
                'id_anggota' => 'required'
            ]);
        } catch (ValidationException $e) {
        }

        $pinjams = Pinjams::findorfail($id);


        $pinjamsData = [
            'tgl_pinjam' => $request -> tgl_pinjam,
            'tgl_kembali' => $request -> tgl_kembali,
            'id_anggota' => $request -> id_anggota
        ];

        $pinjams -> bukus() -> sync($request -> bukus);
        $pinjams -> update($pinjamsData);

        return redirect() -> route('pinjam.index') -> with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $pinjam = Pinjams::findorfail($id);
        $pinjam -> delete();

        return redirect() ->back() -> with('success', 'Berhasil dihapus');

    }
}
