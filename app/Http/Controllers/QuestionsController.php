<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Questions;
use App\Models\Questions_types;
use Illuminate\Http\Request;
use Exception;
use DB;


class QuestionsController extends Controller
{

    /**
     * Display a listing of the questions.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $questionsObjects = Questions::paginate(25);
        foreach ($questionsObjects as $key => $value) {
            $query = "select count(*) as conteggio_risposte_disponibili FROM question_answers WHERE id_question=$value->id";
            $result = DB::connection('mysql')->select($query);
            $query2 = "select titolo FROM questions_types WHERE id=$value->answer_type";
            $result2 = DB::connection('mysql')->select($query2);
            $questionsObjects[$key]['count_answers_list'] = $result[0]->conteggio_risposte_disponibili;
            $questionsObjects[$key]['answer_type_name'] = $result2[0]->titolo;
        }
        return view('questions.index', ['questionsObjects' => $questionsObjects]);
    }

    /**
     * Show the form for creating a new questions.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $QuestionsTypes = Questions_types::pluck('titolo', 'id')->all();

        return view('questions.create', compact('QuestionsTypes'));
    }

    /**
     * Store a new questions in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Questions::create($data);

            return redirect()->route('questions.questions.index')
                ->with('success_message', 'Questions was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified questions.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $questions = Questions::with('questionstype')->findOrFail($id);

        return view('questions.show', compact('questions'));
    }

    /**
     * Show the form for editing the specified questions.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $questions = Questions::findOrFail($id);
        $QuestionsTypes = Questions_types::pluck('titolo', 'id')->all();

        return view('questions.edit', compact('questions', 'QuestionsTypes'));
    }

    /**
     * Update the specified questions in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {

            $data = $this->getData($request);

            $questions = Questions::findOrFail($id);
            $questions->update($data);

            return redirect()->route('questions.questions.index')
                ->with('success_message', 'Questions was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified questions from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $questions = Questions::findOrFail($id);
            $questions->delete();

            return redirect()->route('questions.questions.index')
                ->with('success_message', 'Questions was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }


    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
            'question' => 'required',
            'description' => 'required',
            'answer_type' => 'required|string|min:1',
        ];


        $data = $request->validate($rules);


        return $data;
    }

}
