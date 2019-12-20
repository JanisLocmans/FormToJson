<?php

namespace App\Http\Controllers;

use App\Handlers\FormToJsonHandler;
use Illuminate\Http\Request;
use  App\Http\Requests\RegisterPost;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

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
     * @return View
     */
    public function index()
    {
        return view("index");
    }

    /**
     * @param RegisterPost $request;
     * @return Redirector;
     */
    public function register(RegisterPost $request)
    {
       $this->FormToJsonHandler->convertFormToJson($request->all());
        return redirect('/')->with('status', 'Registration Complete');
    }
}
