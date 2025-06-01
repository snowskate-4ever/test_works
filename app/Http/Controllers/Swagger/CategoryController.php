<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
/**
 * @OA\Post(
 *     path="/api/categories",
 *     summary="Create",
 *     tags={"Category"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                      @OA\Property(property="name", type="string", example="new category"),
 *                      @OA\Property(property="parent_id", type="integer", example=1),
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
 *                   @OA\Property(property="name", type="string", example="new category"),
 *                   @OA\Property(property="parent_id", type="integer", example=1),
 *              )
 *         )
 *     )
 * ),
 *
 *
 * @OA\Get(
 *     path="/api/categories",
 *     summary="List",
 *     tags={"Category"},
 *
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="array", @OA\Items(
 *                     @OA\Property(property="id", type="integer", example=1),
 *                     @OA\Property(property="name", type="string", example="category"),
 *                     @OA\Property(property="parent_id", type="integer", example=1),
 *                 )
 *             )
 *         )
 *     )
 * ),
 *
 * @OA\Get(
 *     path="/api/categories/{category}",
 *     summary="View",
 *     tags={"Category"},
 *
 *     @OA\Parameter(
 *         description="Category id",
 *         in="path",
 *         name="category",
 *         example=1
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="name", type="string", example="new category"),
 *                 @OA\Property(property="parent_id", type="integer", example=1),
 *             )
 *         )
 *     )
 * ),
 *
 * @OA\Patch(
 *      path="/api/categories/{category}",
 *      summary="Update",
 *      tags={"Category"},
 *
 *      @OA\Parameter(
 *          description="Category id",
 *          in="path",
 *          name="category",
 *          example=1
 *      ),
 *
 *     @OA\RequestBody(
 *        @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="name", type="string", example="new category"),
 *                     @OA\Property(property="parent_id", type="integer", example=1),
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
 *                 @OA\Property(property="name", type="string", example="new category"),
 *                 @OA\Property(property="parent_id", type="integer", example=1),
 *             )
 *         )
 *     )
 * ),
 *
 * @OA\Delete(
 *      path="/api/categories/{category}",
 *      summary="Delete",
 *      tags={"Category"},
 *
 *      @OA\Parameter(
 *          description="Category id",
 *          in="path",
 *          name="category",
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
class CategoryController extends Controller
{
    //
}
