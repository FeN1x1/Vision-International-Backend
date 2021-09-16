<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApplicantsController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index(string $category = null)
    {
        $applicants = Applicant::latest()->where('category', $category)->paginate(20);

        if (in_array($category, config('categories.route'), true)) {
            foreach (config('categories.combined') as $key => $value) {
                if ($key === $category) {
                    $category = ' - ' . $value;
                    break;
                }
            }
        } else {
            $category = null;
        }

        return view('applicants.index', compact('applicants', 'category'))
            ->with('i', (request()->input('page', 1) - 1) * 20);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'age' => 'required',
            'about' => 'required',
            'file' => "required|mimes:pdf,doc,docx"
        ]);

        $applicant = Applicant::create($request->except(['file']));
        $fileName = $applicant->firstname . '_' . $applicant->surname . '_' . $applicant->id . '.' . $request->file->extension();
        $applicant->update(['file' => $fileName]);
        $request->file('file')->storeAs('public', $applicant->file);

        return ['message' => 'success'];
    }

    /**
     * @param  \App\Models\Applicant $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $applicant)
    {
        return view('applicants.applicant', compact('applicant'));
    }

    /**
     * @param  \App\Models\Applicant $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
        $applicant->delete();

        $file = $applicant->file;
        if (Storage::exists("public/${file}")) {
            Storage::delete("public/${file}");
        }

        return redirect()->action([ApplicantsController::class, 'index']);
    }

    /**
     * @param  \App\Models\Applicant $applicant
     * @return \Illuminate\Http\Response
     */
    public function setCategory(Applicant $applicant, Request $request)
    {
        if ($applicant->category === null) {
            $request->validate([
                'category' => 'required'
            ]);
            $applicant->update(['category' => $request->category]);
        } else {
            return back()->with('fail', 'Category was not changed');
        }

        return back()->with('success', 'Category was successfully changed');
    }

    /**
     * @param  \App\Models\Applicant $applicant
     * @return \Illuminate\Http\Response
     */
    public function getDownloadLink($id)
    {
        $applicant = Applicant::where('id', $id)->first();

        $file = $applicant->file;
        return response()->download(storage_path("app/public/${file}"));
    }
}
