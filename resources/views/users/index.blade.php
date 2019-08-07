<div class="dashboard_graph">
	<div class="col-md-12">
	<div class="row x_title">sdfdsfsdf</div>
		<table id="table_id" class="display">
		    <thead>
		        <tr>
		            <th>No</th>
		            <th>Name</th>
		            <th>Email</th>
		        </tr>
		    </thead>
		    <tbody>
		    	@foreach($users as $numb => $user)
		        <tr>
		            <td>{{$numb+1}}</td>
		            <td>{{$user->name}}</td>
		            <td>{{$user->email}}</td>
		        </tr>
		        @endforeach
		    </tbody>
		</table>		
	</div>
</div>


