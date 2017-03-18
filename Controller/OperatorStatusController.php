<?php
/*
* MIT License
*
* Copyright (c) 2016 everyx (lunt.luo@gmail.com)
*
* Permission is hereby granted, free of charge, to any person obtaining a copy
* of this software and associated documentation files (the "Software"), to deal
* in the Software without restriction, including without limitation the rights
* to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
* copies of the Software, and to permit persons to whom the Software is
* furnished to do so, subject to the following conditions:
*
* The above copyright notice and this permission notice shall be included in all
* copies or substantial portions of the Software.
*
* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
* IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
* FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
* AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
* LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
* OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
* SOFTWARE.
*/

namespace Everyx\Mibew\Plugin\OperatorStatus\Controller;

use Mibew\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
* Operator Status actions
*/
class OperatorStatusController extends AbstractController
{
    /**
    * Returns true or false of whether an operator is online or not.
    *
    * @param  Request  $request
    * @return Response Rendered page content
    */
    public function isOperatorOnlineAction(Request $request)
    {
        $is_online = false;

        $opcode = $request->attributes->get('opcode');
        $online_operators = get_online_operators();
        foreach ($online_operators as $item) {
            if ($opcode == $item['code']) {
                $is_online = true;
                break;
            }
        }

        $callback = $request->query->get('callback');
        return $this->prepareResponse($is_online, $callback);
    }

    /**
    * Returns true or false of whether an operator is online or not.
    *
    * @param  Request  $request
    * @return Response Rendered page content
    */
    public function hasOnlineOperatorsAction(Request $request)
    {
        $is_online = has_online_operators();

        $callback = $request->query->get('callback');
        return $this->prepareResponse($is_online, $callback);
    }

    /**
    * Returns prepared response: JSONP or plain text.
    *
    * @param  Boolean  $is_online
    * @param  String   $callback
    * @return Response Rendered page content
    */
    private function prepareResponse($is_online, $callback) {
        $response = NULL;

        if ( empty($callback) ) {
            $response = new Response( $is_online ? 'true' : 'false' );
            $response->headers->set('Access-Control-Allow-Origin', '*');
        } else {
            $response = new JsonResponse($is_online);
            $response->setCallback($callback);
        }

        return $response;
    }
}
