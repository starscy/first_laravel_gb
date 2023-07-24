<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Filters\NewsFilter;
use App\Http\Requests\News\FilterRequest;
use App\Http\Requests\News\StoreNewsRequest;
use App\Http\Requests\API\UpdateNewsRequest as APIUpdateNewsRequest;
use App\Http\Resources\News\NewsResource;
use App\Models\News;
use App\Queries\CategoryQueryBuilder;
use App\Queries\NewsQueryBuilder;
use App\Queries\SourceQueryBuilder;
use App\Services\news\NewsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class NewsController extends Controller
{
    public function __construct(
        protected CategoryQueryBuilder $categoryQueryBuilder,
        protected NewsQueryBuilder     $newsQueryBuilder,
        protected SourceQueryBuilder   $sourceQueryBuilder,
        protected NewsService          $service
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(FilterRequest $request): AnonymousResourceCollection
    {
        $data = $request->validated();

        $page = $data['page'] ?? 1;
        $countPages = $data['countPages'] ?? 20;

        $filter = app()->make(NewsFilter::class, ['queryParams' => array_filter($data)]);

        $news = News::filter($filter)->paginate($countPages, ['*'], 'page', $page);

        $request = NewsResource::collection($news);

        return $request;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request): NewsResource|string
    {
        $data = $request->validated();

        $response = $this->service->store($data);

        return $response instanceof News ? new NewsResource($response) : $response;
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(APIUpdateNewsRequest $request, News $news):NewsResource|string
    {
        $data = $request->validated();

        $response = $this->service->update($news, $data);

        return $response instanceof News ? new NewsResource($response) : $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): JsonResponse
    {
        $news = News::find($id);

        if ($news->delete()) {
            return response()->json([
                'data' => [
                    'id' => $id
                ],
                'status' => 'success',
            ]);
        } else {
            return response()->json([
                'data' => [
                    'id' => $id
                ],
                'status' => 'error',
                'message' => __("Couldn't Delete. Please Try Again!")
            ]);
        }

    }
}
