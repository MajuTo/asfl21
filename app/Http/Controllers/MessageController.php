<?php

namespace App\Http\Controllers;

use App\Category;
use App\Helpers\Alert;
use App\Message;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     * @throws BindingResolutionException
     */
    public function index(): View
    {
        if($this->isAdminRequest()) {
            return view()->make('admin.message.index', [
                'messages' => Message::orderBy('created_at','desc')->paginate(10)
            ]);
        } else {
            //Messages admin
//            Paginator::setPageName('am');
            $aMessages = Message::with('user')
                ->where('category_id', '=', 1)
                ->orderBy('created_at','desc')
                ->paginate(2, ['*'], 'am');
            //Messages membres
//            Paginator::setPageName('mm');
            $mMessages = Message::with('user')
                ->where('category_id', '=', 2)
                ->orderBy('created_at','desc')
                ->paginate(2, ['*'], 'mm');

            return view('message.index', [
                'mMessages' => $mMessages,
                'aMessages' => $aMessages
            ]);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     * @throws BindingResolutionException
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function store(): RedirectResponse
    {
        $rules = array(
            'title'   => 'required',
            'content' => 'required'
        );

        $validation = validator()->make(request()->all(), $rules);

        if ($validation->fails()) {
            Alert::add("alert-danger", "Le message n'a pas pu être envoyé");
            return back()->withErrors($validation)->withInput();
        }

        $message = new Message();
        $message->title = request()->get('title');
        $message->content = request()->get('content');
        $message->category_id = (request()->get('admin-msg')) ? 1 : 2;
        $message->user_id = auth()->id();

        //Sauvegarde
        $message->save();

        Alert::add("alert-success", "Votre message a bien été envoyé");

        return redirect()->route('message.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show(int $id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return View
     * @throws BindingResolutionException
     */
    public function edit(int $id): View
    {
        $view = ($this->isAdminRequest()) ? 'admin.message.edit' : 'message.edit';
        $message = Message::find($id);
        $categories = Category::pluck('categoryName', 'id');

        return view()->make($view, [
            'message' => $message,
            'categories'=> $categories
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return RedirectResponse
     */
    public function update(int $id): RedirectResponse
    {
        $view = ($this->isAdminRequest()) ? 'admin.message.index' : 'message.index';
        $message = Message::find($id);
        $message->update(request()->all());

        return redirect()->route($view);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        Message::destroy($id);
        Alert::add("alert-success", "Le message a bien été supprimé");

        return redirect()->route('admin.message.index');
    }

}
