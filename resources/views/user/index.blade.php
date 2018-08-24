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
		<th>Name</th>
		<th>Phone number</th>
                <th>Organization</th>
		<th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
		@foreach ($users as $user)
                <tr>
		    <td> {{$user->name}} </td>	
                    <td> {{$user->phone->organization}} </td>
                    <td> {{$user->phone->number}} </td>
                    <td> <a onClick = 'getRecord({{ $user->id }})'>Edit</a> </td>
                    <td> <a href = 'user/delete/{{ $user->id }}'>Delete</a> </td>
                </tr>
		@endforeach
            </tbody>
        </table>
    </div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">New record</button>
    <!-- Modal for create record -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        	   {!! Form::text('name_user', '', array('class' => 'form-control', 'required')) !!}
		   {!! Form::label('number', 'Number')!!}
                   {!! Form::number('number', '', array('class' => 'form-control', 'required')) !!}
		   {!! Form::label('name_organization', 'Name_organization')!!}
                   {!! Form::text('name_organization', '', array('class' => 'form-control', 'required')) !!}
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
    <!-- Modal for update record -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" >
       <div class="modal-dialog" role="document">
          <div class="modal-content">
             <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </button>
             </div>
             <div class="modal-body">
                {!! Form::open(array('url' => 'user/edit', 'id' => 'fir')) !!}
                   {!! Form::label('name', 'Name user')!!}
                   {!! Form::text('name_user', '', array('class' => 'form-control', 'id' => 'name_up', 'required')) !!}
                   {!! Form::label('number', 'Number')!!}
                   {!! Form::number('number', '', array('class' => 'form-control', 'id' => 'number_up', 'required')) !!}
                   {!! Form::label('name_organization', 'Name_organization')!!}
                   {!! Form::text('name_organization', '', array('class' => 'form-control', 'id' => 'name_org_up', 'required')) !!}
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
   <script>
      function getRecord(i) {
        $.ajax({
          type: 'get',
          url: '/user/'+ i,
          success: function(data) {
             $('#fir').attr('action', 'user/edit/'+data.id);
             $('#updateModal').modal();
             console.log(data);
             $('#name_up').val(data.name);
             $('#number_up').val(data.phone.number);
             $('#name_org_up').val(data.phone.organization);
          },
          error:  function(xhr, str){
            alert('Ошибка');
          }
        });
      }
   </script>
@endsection
