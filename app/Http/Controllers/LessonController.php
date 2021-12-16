<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;

class LessonController extends Controller
{
	 /**
     * Display all lessons
     *
     * @return Lesson[]
     */
    public function index()
    {
        $lessons = Lesson::all();
        return view('lessons.index', [
            'lessons' => $lessons
        ]);
    }

	 /**
     * Display lesson details
     *
     * @return Lesson
     */
    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);

        return view('lessons.show', [
            'lesson' => $lesson
        ]);
    }
}
