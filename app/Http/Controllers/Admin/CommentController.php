<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCommentRequest;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $comment;
    protected $user;

    public function __construct(Comment $comment, User $user)
    {
        $this->comment = $comment;
        $this->user = $user;
    }

    public function index(Request $request, $userId)
    {
        $user = $this->user->find($userId);

        if (!$user) {
            return redirect()->back();
        }

        $comments = $user->comments()->where('body', 'LIKE', "%{$request->search}%") ->get();

        return view('users.comments.index', compact('user', 'comments'));
    }

    public function create($userId)
    {
        $user = $this->user->find($userId);

        if (!$user) {
            return redirect()->back();
        }


        return view('users.comments.create', compact('user'));
    }

    public function store(StoreUpdateCommentRequest $request, $userId)
    {
        $user = $this->user->find($userId);

        if (!$user) {
            return redirect()->back();
        }

        $user->comments()->create([
            'body' => $request->body,
            'visible' => isset($request->visible),
        ]);


        return redirect()->route('comments.index', $user->id);
    }

    public function edit($userId, $id)
    {
        if (!$comment = $this->comment->find($id)) {
            return redirect()->back();
        }
 
        $user = $comment->user;

        return view('users.comments.edit', compact('user', 'comment'));
    }


    public function update(StoreUpdateCommentRequest $request, $id)
    {
        $comment = $this->comment->find($id);

        if (!$comment) {
            return redirect()->back();
        }

      $comment->update([
            'body' => $request->body,
            'visible' => isset($request->visible),
        ]);


        return redirect()->route('comments.index', $comment->user_id);
    }

    public function show() {
        return;
    }
}
