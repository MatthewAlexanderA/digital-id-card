<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JeroenDesloovere\VCard\VCard;

class AddToContactController extends Controller
{
    public function addToContact(Request $request)
    {
        $vcard = new VCard();

        // define variables
        $firstname = $request->name;
        $lastname = '';
        $additional = '';
        $prefix = '';
        $suffix = '';

        // add personal data
        $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);

        // add work data
        $vcard->addCompany($request->company);
        $vcard->addJobtitle($request->job);
        $vcard->addEmail($request->email);
        $vcard->addPhoneNumber($request->phone, 'WORK');
        $vcard->addAddress($request->address);
        $vcard->addURL($request->url);

        return $vcard->download();
    }
}
