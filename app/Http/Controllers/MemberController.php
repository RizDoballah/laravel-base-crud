<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $member = Member::all();

      return view('members.index', compact('member'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->all();

      $newMember = new Member;
      // $member->name = $data['name'];
      // $member->phone = $data['phone'];
      // $member->joinDate = $data['joinDate'];
      // $member->coach = $data['coach'];
      // $member->team = $data['team'];
      // $member->gender = $data['gender'];

      $newMember->fill($data);

      $savedData = $newMember->save();

      $member = Member::orderBy('id', 'desc')->first();

      if ($savedData) {
        return redirect()->route('members.show', compact('member'));
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //   $member = Member::find($id);
    //
    //   if(empty($member)) {
    //     abort('404');
    //   }
    //
    //   return view('members.show', compact('member'));
    // }

    public function show(Member $member)
    {
      if(empty($member)) {
        abort('404');
      }

      return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        if (empty($member)) {
          abort('404');
        }
        return view('members.create', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $member = Member::find($id);
        if (empty($member)) {
          abort('404');
        }
        $data = $request->all();
        $updated = $member->update($data);

        if ($updated) {
          $member = Member::find($id);

          return redirect()->route('members.show', compact('member'));

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
      $id = $member->id;
      $deleted = $member->delete();

      $data = [
        'id' =>$id,
        'member' => Member::all()
      ];

      return view('members.index', $data);

    }
}
