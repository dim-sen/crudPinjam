<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Bukus;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class BukusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $data = [
            'bukus' => Bukus::simplePaginate(10)
        ];
        return view('admin.buku.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.buku.create');
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
                'id_buku' => 'required|max:10|min:6',
                'buku' => 'required|max:100|min:3'
            ]);
        } catch (ValidationException $e) {
        }
        Bukus::create([
            'id_buku' => $request -> id_buku,
            'buku' => $request -> buku
        ]);

        return redirect() -> route('buku.index') -> with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
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
    public function edit($id)
    {
        $data = [
            'bukus' => Bukus::findorfail($id)
        ];
        return view('admin.buku.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        try {
            $this->validate($request, [
                'id_buku' => 'required|max:10|min:6',
                'buku' => 'required|max:100|min:3'
            ]);
        } catch (ValidationException $e) {
        }

        $bukusData = [
            'id_buku' => $request -> id_buku,
            'buku' => $request -> buku
        ];

        Bukus::whereId($id) -> update($bukusData);

        return redirect() -> route('buku.index') -> with('success', 'Data berhasil diperbarui');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $buku = Bukus::findorfail($id);
        $buku -> delete();

        return redirect() ->back() -> with('success', 'Berhasil dihapus');

    }
}
