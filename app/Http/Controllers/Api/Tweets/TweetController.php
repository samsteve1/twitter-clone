<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tweets\StoreTweetRequest;

class TweetController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->only('store');
    }

    /**
     * Create tweets
     *
     * @param StoreTweetRequest $request
     * @return void
     */
    public function store(StoreTweetRequest $request)
    {
        auth()->user()->tweets()->create($request->only(['body']));
    }
}
