<?php

if (!function_exists('apiResponse')) {
  /**
  * Generate Standard Api Response
  *
  * @parm bool $status
  * @parm string $message
  * @parm mixed $data
  * @parm int $code
  *
  * return JsonResponse
  **/

  function apiResponse($status, $message, $data=null, $code=200)
  {
      return response()->json([
        'success' => $status,
        'message' => $message,
        'data'    => $data,
        'code'    => $code
      ]);
  }
}
