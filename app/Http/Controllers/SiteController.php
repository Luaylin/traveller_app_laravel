<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class SiteController
 * @package App\Http\Controllers
 */
class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = Site::paginate();

        return view('site.index', compact('sites'))
            ->with('i', (request()->input('page', 1) - 1) * $sites->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $site = new Site();
        return view('site.create', compact('site'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newSite = new Site();
        $newSite->name = $request->name;
        $newSite->description = $request->description;
        $newSite->state = $request->state;
        if($request->hasFile("image_path")){

            $imagen = $request->file("image_path");
            $nombreimagen = Str::slug($request->name).".".$imagen->guessExtension();
            $ruta = public_path("img/sites/");

            //$imagen->move($ruta,$nombreimagen);
            copy($imagen->getRealPath(),$ruta.$nombreimagen);

            $newSite->image_path = $nombreimagen;            
            
        }
        $newSite->save();

        return redirect()->route('site.index')
            ->with('success', 'Lugar Turistico Creado Correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $site = Site::find($id);

        return view('site.show', compact('site'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $site = Site::find($id);

        return view('site.edit', compact('site'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Site $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site)
    {
        request()->validate(Site::$rules);

        $site->update($request->all());

        return redirect()->route('site.index')
            ->with('success', 'Site updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $site = Site::find($id)->delete();

        return redirect()->route('site.index')
            ->with('success', 'Lugar Turistico Eliminado Correctamente');
    }
}
