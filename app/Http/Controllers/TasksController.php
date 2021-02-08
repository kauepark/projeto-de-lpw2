<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TaskRepository;
use App\Task;

class TasksController extends Controller {
	protected $tasks;

	public function __construct(TaskRepository $tasks) {
		$this->middleware('auth');

		$this->tasks = $tasks;
	}

	public function index(Request $request) {
		return view('tasks.index', [
			'tasks' => $this->tasks->getByUser($request->user())
		]);
	}

	public function store(Request $request) {
		$this->validate($request, [
			'name' => 'required|max:255'
		]);

		$request->user()->tasks()->create([
			'name' => $request->name
		]);

		return back();
	}

	public function destroy(Request $request, Task $task) {
		$this->authorize('destroy', $task);

		$task->delete();

		return back();
	}

	public function toggleDoneStatus(Request $request, Task $task) {
		$this->authorize('toggleDoneStatus', $task);

		$task->done = !$task->done;
		$task->save();

		return back();
	}
}
