<?php
/**
 * Class Machine
 *
 * @package App
 *
 * @SWG\Definition(
 *   definition="Machine",
 *   required={"name"}
 * )
 *
 */
class Machine
{
    /**
     * @SWG\Property(format="string")
     * @var string
     */
    protected $table = 'machines';

    //...
}


/**
 * Class DashboardController
 *
 * @package App\Http\Controllers\Api
 */
class DashboardController
{
    /**
     * Display a listing of the resource.
     *
     * @SWG\Get(
     *     path="/api/dashboard",
     *     description="Returns dashboard overview.",
     *     operationId="api.dashboard.index",
     *     produces={"application/json"},
     *     tags={"dashboard"},
     *     @SWG\Response(
     *         response=200,
     *         description="Dashboard overview."
     *     ),
     *     @SWG\Response(
     *         response=401,
     *         description="Unauthorized action.",
     *     )
     * )
     */
    public function index()
    {
        return response()->json([
            'result'    => [
                'statistics' => [
                    'users' => [
                        'name'  => 'Name',
                        'email' => 'user@example.com'
                    ]
                ],
            ],
            'message'   => '',
            'type'      => 'success',
            'status'    => 0
        ]);
    }
}




/**
 * Class ApiController
 *
 * @package App\Http\Controllers
 *
 * @SWG\Swagger(
 *     basePath="",
 *     host="localhost:8080",
 *     schemes={"http"},
 *     @SWG\Info(
 *         version="1.0",
 *         title="Sample API",
 *         @SWG\Contact(name="Marco Raddatz", url="https://www.marcoraddatz.com"),
 *     ),
 *     @SWG\Definition(
 *         definition="Error",
 *         required={"code", "message"},
 *         @SWG\Property(
 *             property="code",
 *             type="integer",
 *             format="int32"
 *         ),
 *         @SWG\Property(
 *             property="message",
 *             type="string"
 *         )
 *     )
 * )
 */
class ApiController
{
}
