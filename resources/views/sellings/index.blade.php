<div class="dashboard_graph">
        <div class="col-md-12">
        <div class="row x_title"><span class="pull-right"><i class="fa fa-plus"></i> <a href="{{url('sellings/create-new')}}">Create-new</a></span></div>
            <table id="table_id" class="display">
                <thead>
                    <tr>
                    <th>No</th>
                       <th>Name</th>
                    <th>price</th>
                    <th>status</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sellings as $sell)
                    <tr>
                        <td>{{$sell->code}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>		
        </div>
    </div>
    
    
    