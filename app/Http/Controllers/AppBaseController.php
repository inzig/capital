<?php

namespace App\Http\Controllers;

use InfyOm\Generator\Utils\ResponseUtil;
use Response;
use Illuminate\Http\Request;
use Newsletter;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Laravel Generator APIs",
 *     version="1.0.0",
 *   )
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        return Response::json(ResponseUtil::makeResponse($message, $result));
    }

    public function sendError($error, $code = 404)
    {
        return Response::json(ResponseUtil::makeError($error), $code);
    }
    
    public function save(Request $request)
    {
         $email =  $request->newsletter;
         Newsletter::subscribePending($email, ['FNAME'=>$request->firstName, 'LNAME'=>$request->lastName, 'TYPE'=>"Website"], 'subscribers');
         return redirect('/');
    }
    public function saveemail(Request $request)
    {
         $email =  $request->newsletter;
         Newsletter::subscribePending($email);
         return redirect('/');
    }
}
