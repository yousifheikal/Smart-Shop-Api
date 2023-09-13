<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Http\Requests\StoreContactUsRequest;
use App\Http\Requests\UpdateContactUsRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\ContactUs\ContactUsResource;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ContactUsResource::collection(ContactUs::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactUsRequest $request)
    {
        try{
        $contactUs = ContactUs::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        return response([
            'data' => new ContactUsResource($contactUs)
        ], Response::HTTP_CREATED);

    }catch(\Exseption $e){
         return response()->json($e);
    }

    }
}
