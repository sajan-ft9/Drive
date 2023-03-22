<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Member;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function makeattendance(Member $member)
    {
        $reid = $member->id;
        $attnd = new Attendance;
        $attnd->user_id = $member->userid;
        $attnd->save();
        return redirect('/memberdetail/'.$reid)->with('message', 'Attendance done.');
    }

}
