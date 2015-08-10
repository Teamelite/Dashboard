<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\ApplicationRequest;
use App\Models\Application;
use App\Repositories\ApplicationRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class ApplicationController extends Controller
{

    /**
     * @var ApplicationRepository
     */
    private $repository;

    /**
     * @param ApplicationRepository $repository
     */
    public function __construct(ApplicationRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Show the application form.
     *
     * @return \Illuminate\View\View
     */
    public function showApply()
    {
        $application = Application::where('user_id', Auth::user()->id);
        if ($application->exists()) {
            $accepted = $application->whereNotNull('status')->where('status', true)->exists();
            $message = $accepted ? Lang::get('user.application_already_accepted') : Lang::get('user.application_pending');

            return redirect()->back()->with([
                "notice" => $message,
            ]);
        }
        return view('user.apply');
    }

    /**
     * Send an application form.
     *
     * @param ApplicationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function apply(ApplicationRequest $request)
    {
        $this->repository->create(Auth::user(), $request->all());

        return redirect()->route('page.home')->with([
            'notice' => Lang::get('user.application_submitted'),
        ]);
    }

    /**
     * Show the application edit form.
     *
     * @param $id
     * @return $this
     */
    public function edit($id)
    {
        $application = Application::where('id', $id)->first();
        if ($application) {
            return view('user.apply')->with(['application' => $application]);
        }
        return redirect()->back()->withErrors([
            'application_edit_error' => Lang::get('application_edit_error'),
        ]);
    }

    /**
     * Update the user's application form.
     *
     * @param ApplicationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ApplicationRequest $request)
    {
        if ($request->has('id')) {
            $application = Application::where('id', $request->has('id'))->first();
            if ($application->status != 'PENDING') {
                return redirect()->back()->with([
                    'notice' => Lang::get('user.application_stop_edit'),
                ]);
            }
            if ($application->user_id == Auth::user()->id) {
                $this->repository->update($request->all());
                return redirect()->route('user.account')->with([
                    'notice' => Lang::get('user.application_updated'),
                ]);
            }
            return redirect()->back()->with([
                'notice' => Lang::get('user.application_cannot_edit'),
            ]);
        }
        return redirect()->back()->with([
            'notice' => Lang::get('user.application_cannot_edit')
        ]);
    }

}
