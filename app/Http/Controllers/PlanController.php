<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Payment;
use Auth;

class PlanController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $plans = Plan::get();

        return view("plans", compact("plans"));
    }



    /**
     * Write code on Method
     *
     * @return response()
     */

    public function show(Plan $plan, Request $request)
    {
        $intent = Auth::user()->createSetupIntent();

        return view("subscription", compact("plan", "intent"));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function subscription(Request $request)
    {
        $plan = Plan::find($request->plan);

        $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_plan)
                        ->trialDays(1)
                        ->create($request->token);

        return redirect(route('admin.index'));
    }

    public function admin_index()
    {
        $data = Payment::limit(1)->get();

        return view('admin.payment.index',compact('data'));
    }

    public function admin_edit($id)
    {
        $data = Payment::find($id);

        return view('admin.payment.edit',compact('data'));
    }

    public function admin_update(Request $request, $id)
    {
        $data = Payment::find($id);

        $data->stripe_key = $request->stripe_key;
        $data->stripe_secret = $request->stripe_secret;
        $data->update();

        return redirect(route('admin.payment.index'));
    }

    public function plan_index()
    {
        $data = Plan::all();

        return view('admin.plan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function plan_create()
    {
        return view('admin.plan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function plan_store(Request $request)
    {
        $add = new Plan;
        $add->name = $request->name;
        $add->slug = $request->slug;
        $add->price = $request->price;
        $add->stripe_plan = $request->stripe_plan;
        $add->description = $request->description;
        $add->save();

        return redirect(route('admin.plan.index'));
    }

    /**
     * Display the specified resource.
     */
    public function plan_show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function plan_edit(string $id)
    {
        $data = Plan::find($id);

        return view('admin.plan.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function plan_update(Request $request, string $id)
    {

        $add = Plan::find($id);
        $add->name = $request->name;
        $add->slug = $request->slug;
        $add->price = $request->price;
        $add->stripe_plan = $request->stripe_plan;
        $add->description = $request->description;
        $add->update();

        return redirect(route('admin.plan.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function plan_destroy(string $id)
    {
        $delete = Plan::where('id',$id)->delete();

        return redirect(route('admin.plan.index'));
    }
}
