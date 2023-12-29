<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JeroenDesloovere\VCard\VCard;
use Symfony\Component\HttpFoundation\Response;

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

        // return $vcard->download();
        
        $content = $vcard->getOutput();

        $response = new Response();
        $response->setContent($content);
        $response->setStatusCode(200);
        $response->headers->set('Content-Type', 'text/x-vcard');
        $response->headers->set('Content-Disposition', 'attachment; filename="'.str_slug($firstname).'.vcf"');
        $response->headers->set('Content-Length', mb_strlen($content, 'utf-8'));
        
        return $response;
    }
}
