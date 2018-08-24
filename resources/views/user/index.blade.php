@extends ('layout')

@section ('content')
    <div class="page-header">
        <h1>
            Phonebook
        </h1>
    </div>
    <div class="row">
    <table id="table_record" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
          <th style="width: 50%">Name</th>
          <th style="width: 50%">Phone number</th>
          <th style="width: 30%">Organization</th>
          <th style="width: 20%">Edit</th>
          <th style="width: 20%">Delete</th>
        </tr>
      </thead>
    </table>

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

<style>
#table_record_info{display: none;}
</style>
   <script>
     $('#table_record').DataTable( {
       ajax: {url: "/get_user","dataSrc":""},
       "paging": false,
       columns: [
         { data: "name" },
         { data: "number" },
         { data: "organization"},
         {
           "mData": null,
           "bSortable": false,
           "mRender": function (data, type, full) {
             return '<a onClick = "getRecord('+data.id+')">Edit</a> ';
           }
         },
         {
           "mData": null,
           "bSortable": false,
           "mRender": function (data, type, full) {
             return '<a href = "user/delete/'+ data.id+'">Delete</a>';
           }
         },
       ],
       select: true,
     });

     function getRecord(i) {
       $.ajax({
         type: 'get',
         url: '/user/'+ i,
         success: function(data) {
           $('#fir').attr('action', 'user/edit/'+data.id);
           $('#updateModal').modal();
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
