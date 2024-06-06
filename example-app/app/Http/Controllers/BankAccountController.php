<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BankAccount;

class BankAccountController extends Controller
{
    public function home(){
        return view("home");
    }
    
    public function login(){
        return view('login');
    }

    public function BankAccount(){
        return view('bankaccount',[
            'heading'=>'testing',
            'bankAccounts'=>BankAccount::all()
        ]);
    }

    public function createAccount(){
        return view('createaccount');
    }

    public function profile($id){
        $temp=BankAccount::find($id);
        if ($temp!=null){
            return ($temp);
        }else{
            return("no user found");
        }
    }

    public function deleteAccount($id){
        $temp=BankAccount::find($id);
        if ($temp!=null){
            $temp->delete();
            return "successfully deleted";
    
        }else{
            return("no user found");
        }
    }

    public function deposit(){
        return view('deposit');
    }

    public function withdraw(){
        return view('withdraw');
    }
    
    public function changePassword(){
        return view('changepassword');
    }

    public function biayaAdmin(){//
        return view('biayaadmin');
    }

    public function deposito(){//
        return view('deposito');
    }
    
    public function requestKartu(){//
        return view ('requestkartu');
    }

    public function createdAccount(Request $request){
        $temp=$request->validate([
            'name'=>'required',
            'email'=>'required',
            'telno'=>'required',
            'balance'=>'required',
            'password'=>'required'
        ]);
        BankAccount::create([
            'name'=>$temp['name'],
            'email'=>$temp['email'],
            'telno'=>$temp['telno'],
            'balance'=>$temp['balance'],
            'password'=>$temp['password']
        ]);
        return $temp;
    }

    public function loggedIn(Request $request){
        $temp=$request->validate([
            'id'=>'required',
            'password'=>'required'
        ]);
        $targetAccount=BankAccount::find($temp['id']);
        if(($targetAccount==null)||($temp['password']!=$targetAccount['password'])){
            return "invalid credentals";
        }else{
            return $targetAccount;
        }
    }

    public function depositComplete(Request $request){
        $temp=$request->validate([
            'id'=>'required',
            'depositAmount'=>'required'
        ]);
        $targetAccount=BankAccount::find($temp['id']);
        if($targetAccount==null){
            return "invalid id";
        }
        $after=$targetAccount['balance']+$temp['depositAmount'];
        $targetAccount->update(['balance'=>$after]);
        return $targetAccount;
    }

    public function withdrawComplete(Request $request){
        $temp=$request->validate([
            'id'=>'required',
            'withdrawAmount'=>'required'
        ]);
        $targetAccount=BankAccount::find($temp['id']);
        if($targetAccount==null){
            return "invalid id";
        }
        $after=$targetAccount['balance']-$temp['withdrawAmount'];
        $targetAccount->update(['balance'=>$after]);
        return $targetAccount;
    }
    

    public function changedPass(Request $request){
        $temp=$request->validate([
            'id'=>'required',
            'oldPassword'=>'required',
            'newPassword'=>'required'
        ]);
        $targetAccount=BankAccount::find($temp['id']);
        if($targetAccount==null){
            return "invalid credential";
        }
        if($targetAccount['password']!=$temp['oldPassword']){
            return "invalid credential";
        }
        $targetAccount->update(['password'=>$temp['newPassword']]);
        return $targetAccount;
    }
}
