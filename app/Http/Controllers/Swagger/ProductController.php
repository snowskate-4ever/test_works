<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
/**
 * @OA\Post(
 *     path="/api/products",
 *     summary="Create",
 *     tags={"Product"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                      @OA\Property(property="name", type="string", example="new product"),
 *                      @OA\Property(property="category_id", type="integer", example=1),
 *                      @OA\Property(property="is_active", type="boolean", example=1),
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
 *                   @OA\Property(property="name", type="string", example="new product"),
 *                   @OA\Property(property="category_id", type="integer", example=1),
 *                   @OA\Property(property="is_active", type="boolean", example=1),
 *              )
 *         )
 *     )
 * ),
 *
 *
 * @OA\Get(
 *     path="/api/products",
 *     summary="List",
 *     tags={"Product"},
 *
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="array", @OA\Items(
 *                     @OA\Property(property="id", type="integer", example=1),
 *                     @OA\Property(property="name", type="string", example="new product"),
 *                     @OA\Property(property="category_id", type="integer", example=1),
 *                     @OA\Property(property="is_active", type="boolean", example=1),
 *                 )
 *             )
 *         )
 *     )
 * ),
 *
 * @OA\Get(
 *     path="/api/products/{product}",
 *     summary="View",
 *     tags={"Product"},
 *
 *     @OA\Parameter(
 *         description="Product id",
 *         in="path",
 *         name="product",
 *         example=1
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="name", type="string", example="new product"),
 *                 @OA\Property(property="category_id", type="integer", example=1),
 *                 @OA\Property(property="is_active", type="boolean", example=1),
 *             )
 *         )
 *     )
 * ),
 *
 * @OA\Patch(
 *      path="/api/products/{product}",
 *      summary="Update",
 *      tags={"Product"},
 *
 *      @OA\Parameter(
 *          description="Product id",
 *          in="path",
 *          name="product",
 *          example=1
 *      ),
 *
 *     @OA\RequestBody(
 *        @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="name", type="string", example="new product"),
 *                     @OA\Property(property="category_id", type="integer", example=1),
 *                     @OA\Property(property="is_active", type="boolean", example=1),
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
 *                 @OA\Property(property="name", type="string", example="new product"),
 *                 @OA\Property(property="category_id", type="integer", example=1),
 *                 @OA\Property(property="is_active", type="boolean", example=1),
 *             )
 *         )
 *     )
 * ),
 *
 * @OA\Delete(
 *      path="/api/products/{product}",
 *      summary="Delete",
 *      tags={"Product"},
 *
 *      @OA\Parameter(
 *          description="Product id",
 *          in="path",
 *          name="product",
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
class ProductController extends Controller
{
    //
}
