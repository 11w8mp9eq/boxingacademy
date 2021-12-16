<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Providers\Ordered;

class EnrollmentController extends Controller
{

	 /** Save input data to the database */
    public function enrollment()
    {
        $enrollment = new Enrollment();

        $enrollment->subject = request('subject');
        $enrollment->name = request('name');
        $enrollment->email = request('email');
        $enrollment->level = request('level');

		event(new Ordered($enrollment->name));
		
        $enrollment->save();

        return redirect('/lessons');
    }

	 /**
     * Display enrollments
     *
     * @return Enrollment[]
     */
    public function index()
    {
        $attackBeginner = Enrollment::where('subject', '=', 'Attack')->where('level', '=', 'Beginner')->count();
        $attackIntermediate = Enrollment::where('subject', '=', 'Attack')->where('level', '=', 'Intermediate')->count();
        $attackProfessional = Enrollment::where('subject', '=', 'Attack')->where('level', '=', 'Professional')->count();
        $defensiveBeginner = Enrollment::where('subject', '=', 'Defensive')->where('level', '=', 'Beginner')->count();
        $defensiveIntermediate = Enrollment::where('subject', '=', 'Defensive')->where('level', '=', 'Intermediate')->count();
        $defensiveProfessional = Enrollment::where('subject', '=', 'Defensive')->where('level', '=', 'Professional')->count();
        $footworkBeginner = Enrollment::where('subject', '=', 'Footwork')->where('level', '=', 'Beginner')->count();
        $footworkIntermediate = Enrollment::where('subject', '=', 'Footwork')->where('level', '=', 'Intermediate')->count();
        $footworkProfessional = Enrollment::where('subject', '=', 'Footwork')->where('level', '=', 'Professional')->count();
        $enrollments = Enrollment::all();

        return view('enrollments.index', [
            'enrollments' => $enrollments,
            'attackBeginner' => $attackBeginner,
            'attackIntermediate' => $attackIntermediate,
            'attackProfessional' => $attackProfessional,
            'defensiveBeginner' => $defensiveBeginner,
            'defensiveIntermediate' => $defensiveIntermediate,
            'defensiveProfessional' => $defensiveProfessional,
            'footworkBeginner' => $footworkBeginner,
            'footworkIntermediate' => $footworkIntermediate,
            'footworkProfessional' => $footworkProfessional
        ]);
    }
	
	 /** Delete enrollment */
	public function destroy($id) {

    $enrollment = Enrollment::findOrFail($id);
    $enrollment->delete();

    return redirect('/enrollments');
	}
}