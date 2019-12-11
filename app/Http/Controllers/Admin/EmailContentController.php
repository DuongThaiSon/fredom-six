<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailContent;
use Illuminate\Http\Request;

class EmailContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emailContents = EmailContent::latest()->paginate();
        return view('admin.emailContents.index', compact('emailContents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.emailContents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:email_contents',
            'detail' => 'required'
        ]);

        $attributes = $request->only([
            'name', 'detail'
        ]);
        $attributes['language'] = app()->getLocale();
        // TODO: add created_by column and rename update_by to updated_by
        $attributes['update_by'] = auth()->id();

        $emailContent = EmailContent::create($attributes);

        return redirect()->route('admin.email-contents.edit', $emailContent->id)
            ->with('success', 'Tạo nội dung email thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmailContent  $emailContent
     * @return \Illuminate\Http\Response
     */
    public function show(EmailContent $emailContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmailContent  $emailContent
     * @return \Illuminate\Http\Response
     */
    public function edit(EmailContent $emailContent)
    {
        return view('admin.emailContents.edit', compact('emailContent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmailContent  $emailContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmailContent $emailContent)
    {
        $request->validate([
            'name' => "required|unique:email_contents,name,{$emailContent->id}",
            'detail' => 'required'
        ]);

        $attributes = $request->only([
            'name', 'detail'
        ]);
        $attributes['language'] = app()->getLocale();
        $attributes['update_by'] = auth()->id();

        $emailContent = $emailContent->fill($attributes);
        $emailContent->save();

        return redirect()->route('admin.email-contents.edit', $emailContent->id)
            ->with('success', 'Cập nhật nội dung email thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmailContent  $emailContent
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmailContent $emailContent)
    {
        //
    }
}
