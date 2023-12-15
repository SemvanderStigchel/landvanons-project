<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Auth;
use File;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
        $this->middleware('owner-task')->only('edit', 'update', 'destroy');
        $this->middleware('admin')->except('index', 'show', 'enroll', 'unsubscribe', 'enrollSuccess');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::where('status', '=', null)->orWhere('status', '=', 1)->get();

        return view('task.read', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:150',
            'description' => 'required',
            'image' => 'required|image|max:1000',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required',
            'location' => 'required',
            'duration' => 'required',
            'points' => 'required|numeric|in:50,100,150'
        ]);

        $task = new Task();
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->date = $request->input('date');
        $task->time = $request->input('time');
        $task->location = $request->input('location');
        $task->duration = $request->input('duration');
        $task->points_earned = $request->input('points');
        $task->status = 1;
        $task->user_id = Auth::user()->id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/tasks/', $filename);
            $task->image = $filename;
        }

        $task->save();
        return redirect(route('tasks.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required|max:150',
            'description' => 'required',
            'image' => 'image|max:1000',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required',
            'location' => 'required',
            'duration' => 'required',
            'points' => 'required|numeric|in:50,100,150'
        ]);

        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->date = $request->input('date');
        $task->time = $request->input('time');
        $task->location = $request->input('location');
        $task->duration = $request->input('duration');
        $task->points_earned = $request->input('points');
        $task->status = 1;
        $task->user_id = Auth::user()->id;

        if ($request->hasFile('image')) {
            $destination = 'uploads/tasks/' . $task->image;
            if (File::exists($destination)) {
                File::delete(@$destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/tasks/', $filename);
            $task->image = $filename;
        }

        $task->save();
        return redirect(route('tasks.show', compact('task')));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $destination = 'uploads/tasks/' . $task->image;
        if (File::exists($destination)) {
            File::delete(@$destination);
        }
        $task->delete();

        return redirect(route('tasks.index'));
    }

    public function enroll(Task $task)
    {
        $task->users()->attach(Auth::user()->id);
        return redirect(route('tasks.enroll-success', compact('task')));
    }

    public function unsubscribe(Task $task)
    {
        $task->users()->detach(Auth::user()->id);
        return redirect(route('tasks.index'));
    }

    public function enrollSuccess(Task $task)
    {
        return view('task.enrolled', compact('task'));
    }

    public function payOutPoints (Task $task)
    {
        $task->status = 2;
        $task->save();
        return redirect(route('tasks.show', compact('task')));
    }
}
