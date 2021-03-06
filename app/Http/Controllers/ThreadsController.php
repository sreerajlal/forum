<?php
namespace App\Http\Controllers;
use App\Channel;
use App\Filters\ThreadFilters;
use App\Thread;
use Illuminate\Http\Request;
class ThreadsController extends Controller
{
    /**
     * ThreadsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  Channel $channel
     * @param ThreadFilters $threadFilters
     * @return \Illuminate\Http\Response
     */
    public function index(Channel $channel,ThreadFilters $threadFilters)
    {

        $threads = Thread::latest()->filter($threadFilters);

        if ($channel->exists) {
            $threads = $channel->threads();
        }

        $threads = $threads->get();

        return view('threads.index', compact('threads'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('threads.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'channel_id' => 'required|exists:channels,id'
        ]);
        $thread = Thread::create([
            'user_id' => auth()->id(),
            'channel_id' => request('channel_id'),
            'title' => request('title'),
            'body' => request('body')
        ]);
        return redirect($thread->path());
    }

    public function show($channelId, Thread $thread)
    {
        return view('threads.show', [
            'thread' => $thread,
            'replies' => $thread->replies()->latest()->paginate(10)
        ]);
    }

    public function edit(Thread $thread)
    {
        //
    }

    public function update(Request $request, Thread $thread)
    {
        //
    }

    public function destroy($channelId, Thread $thread)
    {

        $this->authorize('update', $thread);

        $thread->delete();


        if (request()->wantsJson()){
            return response([], 204);
        }
        return redirect('/threads');
    }

}
