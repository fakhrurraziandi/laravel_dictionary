@extends('layouts.backend')

@section('content')
    <div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card border-light">
					<div class="card-header">
						<h5 class="mb-0">Words</h5>
					</div>
					<div class="card-body">
						<div class="table-data-toolbar">
							<a href="{{route('backend.word.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add new</a>
						</div>
						<table class="table-data"></table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script>
		$(function(){
			$('.table-data').bootstrapTable({
				toolbar: ".table-data-toolbar",
				classes: 'table table-striped table-no-bordered',
				search: true,
				showRefresh: true,
				sortOrder: 'desc',
				// showToggle: true,
				// showColumns: true,
				// showExport: true,
				// showPaginationSwitch: true,
				pagination: true,
				pageList: [10, 25, 50, 100, 'ALL'],
				// showFooter: false,
				sidePagination: 'server',
				url: "{{route('backend.word.json')}}",
				columns: [
	                {
	                    field: 'id',
	                    title: 'Action',
	                    formatter: function(value, row, index){
	                    	html = '';
	                    	html += `<a href="{{url('backend/word')}}/${value}/edit" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a> `;
	                    	html += `<form class="d-inline-block" action="{{url('backend/word')}}/${value}" method="POST" onsubmit="return confirm('Are you sure want to delete ${row.name}?')">
	                    				{{csrf_field()}}
	                    				{{method_field('DELETE')}}
	                    				<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    				</form>`;
            				return html;
	                    }
	                },
	                {
	                    field: 'id',
	                    title: 'ID',
	                    sortable: true,
	                },
	                {
	                    field: 'name',
	                    title: 'Name',
	                    sortable: true,
	                },
	                {
	                    field: 'slug',
	                    title: 'Slug',
	                    sortable: true,
	                },
	                {
	                    field: 'hit',
	                    title: 'Hit',
	                    sortable: true,
	                },
	                {
	                    field: 'created_at',
	                    title: 'Created at',
	                    sortable: true,
	                },
	                {
	                    field: 'updated_at',
	                    title: 'Updated at',
	                    sortable: true,
	                },
	            ]
			});
		});
	</script>
@endsection

