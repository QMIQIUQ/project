@extends('layouts.app2')
@section('content') 
<div class="container">
	    <div class="row">
		<form   method="post" action="" >
			@csrf
		    <table class="table ">
				
		        <thead>
		        <tr class="thead-dark">
		            
                    <th>Item</th>
		            <th>Name</th>
                   
		            <th>Quantity</th>
		            <th>Amount</th>
                    <th>Status</th>
					<th>Address</th>
		        </tr>
		    </thead>
		        <tbody>	
				@php
					$total=0;
				@endphp
                @foreach($orders as $myorder)
		            <tr>
		                
                        <td><img src="{{ asset('images/') }}/{{$myorder->image}}" alt="" width="50"></td>
		                <td style="max-width:300px">
		                    <h6>{{$myorder->name}}</h6>		                   
		                </td>
		                
                        <td>{{$myorder->qty}}</td>
						@php
							$subtotal = $myorder->qty*$myorder->price;

							$total=$total+$subtotal;
						@endphp

                        <td>{{$subtotal}}</td>
		                <td>
		                    {{ $myorder->paymentStatus }}
		                </td>
						<td>{{$myorder->Address}}</td>
		            </tr> 
                @endforeach
				 
				<tr class="thead-dark">
		        <td>&nbsp;</td>
                <td>&nbsp;</td>
		        <td>&nbsp;</td>                   
		        <td>&nbsp;</td>
				<td>&nbsp;</td>	
				<input type="hidden" name="amount" value="RM{{ $total }}" >
		        <td><input type="" name="amount" value="RM{{ $total }}" disabled></td>
                <td><input type="submit" name="paynow" value="Pay Now"></td>
		    </tr>
		</form>					
		        </tbody>			
		    </table>		

	</div>
    </div>
@endsection