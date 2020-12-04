<?php

namespace App\Http\Controllers;

use App\Models\Request;

class RequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $requests = Request::where('user_id', '=', auth()->id())
            ->paginate(5);

        return view('requests.home', [
            'requests' => $requests
        ]);
    }

    public function create()
    {
        return view('requests.createOrUpdate');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => [
                'required',
                'max:255',
                'unique:requests,name'
            ],
            'description' => [
                'required',
            ],
            'type' => [
                'required',
                'max:10'
            ],
        ]);

        $attributes['user_id'] = auth()->id();

        Request::create($attributes);

        return redirect()
            ->route('home');
    }

    public function edit($id)
    {
        $request = Request::find($id);

        if ($request->user_id == auth()->id()) {
            return view('requests.createOrUpdate', [
                'request' => $request
            ]);
        } else {
            return redirect()->route('home');
        }
    }

    public function update($id)
    {
        $attributes = request()->validate([
            'name' => [
                'required',
                'max:255',
                'unique:requests,name,' . $id
            ],
            'description' => [
                'required',
            ],
            'type' => [
                'required',
                'max:10'
            ],
        ]);

        Request::where('id', $id)
            ->update($attributes);

        return redirect()->route('home');
    }

}
