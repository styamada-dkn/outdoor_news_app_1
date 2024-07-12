<?php

namespace App\Http\Controllers;

use App\Http\Requests\InquiryRequest;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function index()
    {
        return view('site.inquiry');
    }

    public function send(InquiryRequest $request)
    {

        $inquiry = new Inquiry($request->validated());
        $inquiry->save();

        return to_route('inquiry.complete');

    }
    public function complete()
    {
        return view('site.inquiry-complete');
    }

    //管理者画面用
    public function indexWithAdmin()
    {
        $inquiries = Inquiry::latest("updated_at")->paginate(10);
        return view('admin.inquiry.index',compact('inquiries'));
    }
    public function showWithAdmin(Inquiry $inquiry)
    {
        return view('admin.inquiry.show',compact('inquiry'));
    }

}
