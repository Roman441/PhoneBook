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
		<th>Number</th>
		<th>age</th>
		<th>buiznes</th>
		<th>Edit</th>
            </tr>
            </thead>
            <tbody>
		@foreach ($phones as $phone)
                <tr>
                    <td> {{$phone->id}} </td>
		    <td> {{$phone->number}} </td>	
                </tr>
		@endforeach
            </tbody>
        </table>
    </div>
   </div>
@endsection
