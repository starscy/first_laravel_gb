<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Filters\NewsFilter;
use App\Http\Requests\News\FilterRequest;
use App\Http\Requests\News\StoreNewsRequest;
use App\Http\Requests\News\UpdateNewsRequest;
use App\Http\Resources\News\NewsResource;
use App\Models\News;
use App\Queries\CategoryQueryBuilder;
use App\Queries\NewsQueryBuilder;
use App\Queries\QueryBuilder;
use App\Queries\SourceQueryBuilder;
use App\Services\news\NewsService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

final class NewsController extends Controller
{
    public function __construct(
        protected CategoryQueryBuilder $categoryQueryBuilder,
        protected NewsQueryBuilder     $newsQueryBuilder,
        protected SourceQueryBuilder $sourceQueryBuilder,
        protected NewsService          $service
    )
    {
    }

    public function index(FilterRequest $request)
    {
        $data = $request->validated();

        $page = $data['page'] ?? 1;
        $countPages = $data['countPages'] ?? 20;

        $filter = app()->make(NewsFilter::class, ['queryParams' => array_filter($data)]);

        $news = News::filter($filter)->paginate($countPages, ['*'], 'page', $page);

        return view('news.index', ['news' => $this->newsQueryBuilder->getActiveNews()]);

    }


    /**
     * Show the form for creating a new resource.
     */
//    public function create(): View
//    {
//        $sources = $this->sourceQueryBuilder->getAll();
//        $categories = $this->categoryQueryBuilder->getAll();
//
//        return view('news.create', compact('sources', 'categories'));
//    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request)
    {
        $data = $request->validated();

        return $this->service->store($data)?
            redirect()->route('admin.news.index')->with('success', trans('News has been created')) :
            redirect()->route('admin.news.index')->with('error', trans('News has not been created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news): View
    {
        return view('news.show', ['newsItem' => $news]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news): View
    {
        $sources = $this->sourceQueryBuilder->getAll();

        $categories = $this->categoryQueryBuilder->getAll();

        return view('admin.news.edit', [
            'news' => $news,
            'sources' => $sources,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        $data = $request->validated();

        $news = $this->service->update($news, $data);

        return $this->service->update($news, $data) ?
            redirect()->route('admin.news.index')->with('success', trans('News has been updated')) :
            redirect()->route('admin.news.index')->with('error', trans('News has not been updated'));
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
