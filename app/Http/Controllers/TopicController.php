<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Http\Resources\TopicResource;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //返回所有数据
        return TopicResource::collection(Topic::paginate(10)); // 返回10条帖子
    }

    /**
     *  新增帖子
     *
     */
    public function store(StoreTopicRequest $request)
    {
        //
        // return Auth::user(); // 返回当前用户
        $topic = new Topic(); // 实例化模型
        $topic->title = $request->input('title');
        $topic->user_id = Auth::id(); // user_id 必须是当前用户
        $topic->content = $request->input('content');
        $topic->save();
        return $topic;
    }

    /**
     * Display the specified resource.
     */
    public function show(Topic $topic)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTopicRequest $request, Topic $topic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topic $topic)
    {
        //
    }
}
