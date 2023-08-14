<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Repositories\TaskRepository;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{

    protected $tasks;

    public function __construct(TaskRepository $tasks) 
    {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }

    public function show(Request $request): View
    {
        $user = User::find(Auth::id());
        $tasks = $user->tasks();
        return view('welcome', ['tasks' => $this->tasks->forUser($request->user())]);
    }

    public function remove(Request $request, Task $task): RedirectResponse
    {
        $this->authorize('remove', $task);
        $task->delete();

        // $validator = Validator::make($request->all(), [
        //     'task_id' => ['required', 'integer'],
        // ]);
        // $validated = $validator->validate();

        // $task = Task::find($validated['task_id']);
        // $task->delete();

        return Redirect::route('tasks.show');
    }

    public function add(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'content' => ['required', 'string', 'max:128'],
        ]);
        $validated = $validator->validate();

        $task = Task::create([
            'content' => $validated['content'],
            'user_id' => Auth::id(),
        ]);

        return Redirect::route('tasks.show');
    }
}
