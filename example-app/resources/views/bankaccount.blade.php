<h1>{{$heading}}</h1>

@unless(count($bankAccounts)==0)

@foreach($bankAccounts as $bankAccount)
<h2>
    id:{{$bankAccount['id']}}
</h2>
<p>
    name:{{$bankAccount['name']}}
</p>
<p>
    email:{{$bankAccount['email']}}
</p>
<p>
    telno:{{$bankAccount['telNo']}}
</p>
<p>
    balance:{{$bankAccount['balance']}}
</p>
<p>
    password:{{$bankAccount['password']}}
</p>
@endforeach
@else
<p> nothing found</p>
@endunless
#test1