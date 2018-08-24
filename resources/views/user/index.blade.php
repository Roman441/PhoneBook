@extends ('layout')

@section ('content')
    <div class="page-header">
        <h1>
            List onwers
        </h1>
    </div>
    <div class="row">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
		<th>Name</th>
		<th>Number</th>
		<th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
		@foreach ($users as $user)
                <tr>
                    <td> {{$user->id}} </td>
		    <td> {{$user->name}} </td>	
                    <td> {{$user->phone->number}} </td>
                    <td> <a href = 'user/{{ $user->id }}'>Edit</a> </td>
                    <td> <a href = 'user/delete/{{ $user->id }}'>Delete</a> </td>
                </tr>
		@endforeach
            </tbody>
        </table>
    </div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">New record</button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
          <div class="modal-content">
             <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </button>
             </div>
             <div class="modal-body">
		{!! Form::open(array('url' => 'user/create')) !!}
	           {!! Form::label('name', 'Name user')!!}
        	   {!! Form::text('name_user', '', array('class' => 'form-control')) !!}
		   {!! Form::label('number', 'Number')!!}
                   {!! Form::number('number', '', array('class' => 'form-control')) !!}
		   {!! Form::label('name_organization', 'Name_organization')!!}
                   {!! Form::text('name_organization', '', array('class' => 'form-control')) !!}
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {!! Form::submit('Save!', array('class' => 'btn btn-primary')) !!}
             {!! Form::close() !!}
		</form>
            </div>
         </div>
      </div>
   </div>
@endsection
