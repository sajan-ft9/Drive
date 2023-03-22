<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MemberController extends Controller
{
    public function addmember(){
        return view('admin.addmember');
    }

    public function storemember(Request $request){
        $formFields = $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'min:10'],
            'address' => ['required', 'max:255'],
            'vehicle' => ['required'],
            // 'total_amount' => ['required','numeric','min:0'],
            'paid_amount' => ['required','numeric','min:0'],
        ]);

        $formFields['userid'] = substr($request->vehicle,0,1).'-'.$this->generateUniqueCode();

        Member::create($formFields);

        return redirect('/addmember')->with('message', 'Member added successfully!');
    }

    public function generateUniqueCode()
    {

        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersNumber = strlen($characters);

        $code = '';

        while (strlen($code) < 6) {
            $position = rand(0, $charactersNumber - 1);
            $character = $characters[$position];
            $code = $code.$character;
        }

        if (Member::where('userid', $code)->exists()) {
            $this->generateUniqueCode();
        }

        return $code;

    }

    public function showmembers() {
        $members = Member::all();
        return view('admin.showmembers', compact('members'));
    }

    public function editmember(Member $member) {
        return view('admin.editmember', ['member'=>$member]);
    }

    public function updatemember(Request $request, Member $member) {
        $formFields = $request->validate([
            'email' => ['required', 'email', Rule::unique('members', 'email')],
            'phone' => ['required', 'min:10'],
            'address' => ['required', 'max:255'],
        ]);

        $member->update($formFields);

        return redirect('/memberdetail/'.$member->id)->with('message', 'Member updated successfully!');

    }

    public function deletemember(Member $member) {
        $member->delete();
        return redirect('/showmembers')->with('message', 'Member deleted successfully!');

    }

    public function memberdetail(Member $member) {

        $dates = Attendance::where('user_id', $member->userid)->get('attended_at');
        
        return view('admin.memberdetail',['member'=>$member, 'dates'=>$dates]);
    }

    public function searchmember(Request $request){
        $search = $request->search;

        $members = Member::where('userid', 'LIKE', '%'.$search. '%')
        ->orWhere('name', 'LIKE', '%'.$search. '%')
        ->orWhere('email', 'LIKE', '%'.$search. '%')
        ->orWhere('address', 'LIKE', '%'.$search. '%')
        ->orWhere('phone', 'LIKE', '%'.$search. '%')
        ->orWhere('vehicle', 'LIKE', '%'.$search. '%')
        ->get();

        return view('admin.search', compact('members'));
    }

    public function addpayment(Request $request, Member $member){
        $request->validate([
            'pay_amount' => ['required', 'min:0']
        ]);
        $mem_detail = Member::find($member->id);
        $amount =  $mem_detail->paid_amount + $request->pay_amount;
        $member->paid_amount = $amount;
        $member->save();
        return redirect('/memberdetail/'.$member->id)->with('message', 'Payment updated successfully!');
    }

}
