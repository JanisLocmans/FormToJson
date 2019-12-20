<?php

namespace App\Http\Controllers;

use App\Handlers\FormToJsonHandler;
use Illuminate\Http\Request;
use  App\Http\Requests\RegisterPost;
use Illuminate\Routing\Route;

class FormToJsonController extends Controller
{
    /**
     * @var $FormToJsonHandler FormToJsonHandler
     */
    private $FormToJsonHandler;
    /**
     * FormToJson constructor.
     * @param $FormToJsonHandler FormToJsonHandler
     */
    function __construct(FormToJsonHandler $FormToJsonHandler){
        $this->FormToJsonHandler = $FormToJsonHandler;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("index");
    }

    /**
     * @param RegisterPost $request
     */
    public function register(RegisterPost $request)
    {
       $this->FormToJsonHandler->convertFormToJson($request->all());
        return redirect('/')->with('status', 'Registration Complete');
    }
}
