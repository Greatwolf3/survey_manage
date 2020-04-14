<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Questions;
use App\Models\Question_answers;
use Illuminate\Http\Request;
use Exception;

class QuestionAnswersController extends Controller
{

    /**
     * Display a listing of the question answers.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $questionAnswersObjects = Question_answers::with('question')->paginate(25);

        return view('question_answers.index', compact('questionAnswersObjects'));
    }
    public function index_partial($id)
    {

        $questionAnswersObjectsPartial = Question_answers::with('question')->where('id_question','=',$id)->paginate(25);
        return view('question_answers.index_partial', ['questionAnswersObjects'=>$questionAnswersObjectsPartial]);
    }

    /**
     * Show the form for creating a new question answers.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Questions = Questions::pluck('question','id')->all();
        
        return view('question_answers.create', compact('Questions'));
    }

    /**
     * Store a new question answers in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Question_answers::create($data);

            return redirect()->route('question_answers.question_answers.index')
                ->with('success_message', 'Question Answers was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified question answers.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $questionAnswers = Question_answers::with('question')->findOrFail($id);

        return view('question_answers.show', compact('questionAnswers'));
    }

    /**
     * Show the form for editing the specified question answers.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $questionAnswers = Question_answers::findOrFail($id);
        $Questions = Questions::pluck('question','id')->all();

        return view('question_answers.edit', compact('questionAnswers','Questions'));
    }

    /**
     * Update the specified question answers in the storage.
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
            
            $questionAnswers = Question_answers::findOrFail($id);
            $questionAnswers->update($data);

            return redirect()->route('question_answers.question_answers.index')
                ->with('success_message', 'Question Answers was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified question answers from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $questionAnswers = Question_answers::findOrFail($id);
            $questionAnswers->delete();

            return redirect()->route('question_answers.question_answers.index')
                ->with('success_message', 'Question Answers was successfully deleted.');
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
                'id_question' => 'required|string|min:1',
            'testo' => 'required', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
