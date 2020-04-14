<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Questions_types;
use Illuminate\Http\Request;
use Exception;

class Questions_typesController extends Controller
{

    /**
     * Display a listing of the questions types.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $questionsTypesObjects = Questions_types::paginate(25);

        return view('questions_types.index', compact('questionsTypesObjects'));
    }

    /**
     * Show the form for creating a new questions types.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('questions_types.create');
    }

    /**
     * Store a new questions types in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Questions_types::create($data);

            return redirect()->route('questions_types.questions_types.index')
                ->with('success_message', 'Questions Types was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified questions types.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $questionsTypes = Questions_types::findOrFail($id);

        return view('questions_types.show', compact('questionsTypes'));
    }

    /**
     * Show the form for editing the specified questions types.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $questionsTypes = Questions_types::findOrFail($id);
        

        return view('questions_types.edit', compact('questionsTypes'));
    }

    /**
     * Update the specified questions types in the storage.
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
            
            $questionsTypes = Questions_types::findOrFail($id);
            $questionsTypes->update($data);

            return redirect()->route('questions_types.questions_types.index')
                ->with('success_message', 'Questions Types was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified questions types from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $questionsTypes = Questions_types::findOrFail($id);
            $questionsTypes->delete();

            return redirect()->route('questions_types.questions_types.index')
                ->with('success_message', 'Questions Types was successfully deleted.');
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
                'titolo' => 'required|string|min:1|max:150', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
