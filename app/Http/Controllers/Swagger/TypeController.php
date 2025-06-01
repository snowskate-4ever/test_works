<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
/**
 * @OA\Post(
 *     path="/api/types",
 *     summary="Create",
 *     tags={"Type"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                      @OA\Property(property="name", type="string", example="new type"),
 *                      @OA\Property(property="slug", type="string", example="product"),
 *                 )
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *               @OA\Property(property="data", type="object",
 *                   @OA\Property(property="id", type="integer", example=1),
 *                   @OA\Property(property="name", type="string", example="new type"),
 *                   @OA\Property(property="slug", type="string", example="product"),
 *              )
 *         )
 *     )
 * ),
 *
 *
 * @OA\Get(
 *     path="/api/types",
 *     summary="List",
 *     tags={"Type"},
 *
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="array", @OA\Items(
 *                     @OA\Property(property="id", type="integer", example=1),
 *                     @OA\Property(property="name", type="string", example="type"),
 *                     @OA\Property(property="slug", type="string", example="product"),
 *                 )
 *             )
 *         )
 *     )
 * ),
 *
 * @OA\Get(
 *     path="/api/types/{type}",
 *     summary="View",
 *     tags={"Type"},
 *
 *     @OA\Parameter(
 *         description="Type id",
 *         in="path",
 *         name="type",
 *         example=1
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="name", type="string", example="new type"),
 *                 @OA\Property(property="slug", type="string", example="product"),
 *             )
 *         )
 *     )
 * ),
 *
 * @OA\Patch(
 *      path="/api/types/{type}",
 *      summary="Update",
 *      tags={"Type"},
 *
 *      @OA\Parameter(
 *          description="Type id",
 *          in="path",
 *          name="type",
 *          example=1
 *      ),
 *
 *     @OA\RequestBody(
 *        @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="name", type="string", example="new type"),
 *                     @OA\Property(property="slug", type="string", example="product"),
 *                 )
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="name", type="string", example="new type"),
 *                 @OA\Property(property="slug", type="string", example="product"),
 *             )
 *         )
 *     )
 * ),
 *
 * @OA\Delete(
 *      path="/api/types/{type}",
 *      summary="Delete",
 *      tags={"Type"},
 *
 *      @OA\Parameter(
 *          description="Type id",
 *          in="path",
 *          name="type",
 *          example=1
 *      ),
 *
 *      @OA\Response(
 *          response=200,
 *          description="OK",
 *          @OA\JsonContent(
 *               @OA\Property(property="message", type="string", example="done"),
 *               @OA\Property(property="status", type="string", example=200),
 *          )
 *     )
 * )
 *
 */
class TypeController extends Controller
{
    //
}
