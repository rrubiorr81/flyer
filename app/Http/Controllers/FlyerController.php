<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Flyer;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\FlyerRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\ChaneFlyerRequest;
use App\Http\Controllers\Traits\AuthorizesUsers;
use \Symfony\Component\HttpFoundation\File\UploadedFile;

class FlyerController extends Controller
{
    use AuthorizesUsers;


    function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);

        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('flyers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FlyerRequest  $request
     * @return Response
     */
    public function store(FlyerRequest $request)
    {
        //persist
        Flyer::create($request->all());
        //flash
        flash("Sucess", "Your Flyer has been created");
        //redirect to home...
        return redirect()->back();
    }

    /**
     * @param $zip
     * @param $street
     * @return \Illuminate\View\View
     */
    public function show($zip, $street)
    {
        $flyer = Flyer::locatedAt($zip, $street);
        return view("flyers.show", compact('flyer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Apply a photo to the referenced flyer...
     * @param $zip
     * @param $street
     * @param ChaneFlyerRequest $request
     */
    public function addPhotos($zip, $street, ChaneFlyerRequest $request)
    {
        $photo = $this->makePhoto($request->file('photo'));

        Flyer::locatedAt($zip, $street)->addPhoto($photo);

    }

    protected function makePhoto(UploadedFile $file)
    {
        return Photo::named($file->getClientOriginalName())
            ->move($file);
    }
}
