<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use App\Queries\CategoryQueryBuilder;
use App\Queries\NewsQueryBuilder;
use App\Queries\QueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    protected QueryBuilder $categoryQueryBuilder ;
    protected QueryBuilder $newsQueryBuilder;

    public function __construct (
        CategoryQueryBuilder $categoryQueryBuilder,
        NewsQueryBuilder $newsQueryBuilder
    ) {
        $this->categoryQueryBuilder = $categoryQueryBuilder;
        $this->newsQueryBuilder = $newsQueryBuilder;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = $this->newsQueryBuilder->getAll();
        $categories = Category::all();

        return view('admin.news.index' , compact('news', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $sources = Source::all();
        $categories = Category::all();

        return view('admin.news.create', compact('sources', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'string',
            'description' => '',
            'image'=>'',
            'source_id' =>'',
            'categories' => '',
        ]);

        $categories = $data['categories'];
        unset($data['categories']);

        $news = News::create($data);
        if ($news ) {
            $news->categories()->attach($categories);

            return redirect()->route('admin.news.index')->with('success', 'News created');
        }

        return redirect()->route('admin.news.index')->with('error', 'News has not been created');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $sources = Source::all();
        $categories = Category::all();


        return \view('admin.news.edit', compact('news', 'sources', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title' => 'string',
            'description' => '',
            'image'=>'',
            'source_id' =>'',
            'categories' => '',
        ]);

        $categories = $data['categories'];
        unset($data['categories']);

        $news->update($data);

        $news->categories()->sync($categories);
        // $response = response()->json($request->only('title',  'image', 'description',  ));
        return redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $news=News::find($id);

        if ($news->delete()) {
            return response()->json([
                'data' => [
                    'id' => $id
                ],
                'status' => 'success',
            ]);
        } else
        {
            return response()->json([
                'data' => [
                    'id' => $id
                ],
                'status' => 'error',
                'message' => __("Couldn't Delete. Please Try Again!")
            ]);
        }

       // return redirect()->route('admin.news.index');
    }
}
