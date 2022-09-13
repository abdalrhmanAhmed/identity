@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">السجل المدني</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة التصنيف المهني</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

@if ($errors->any())
	<div class="alert-danger">
		@foreach ($errors as $error)
			{{ $error }}
		@endforeach
	</div>
@endif

@include('notifications.notify')
				<!-- row -->
				<div class="row">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<div class="col-lg-12 margin-tb">
										<div class="pull-right">
											@can('role-create')
												<a class="btn btn-primary btn-sm effect-scale" href="#modaldemo8" data-toggle="modal" data-effect="effect-scale">اضافة</a>
											@endcan
											<button type="button" class="btn btn-primary btn-sm" id="btn-delete_all">
												حذف الصفوف المختارة
											</button>
										</div>
									</div>
									<br>
								</div>

							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap " id="example1">
										<thead>
											<tr>
												<th><input type="checkbox" name="chekckAll" id="select-all" onclick="checkAll('box1', this)"></th>
												<th>#</th>
												<th>الاسم</th>
												<th>العمليات</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($FailedJobsName as $key => $name)
												<tr>
													<td><input type="checkbox" value="{{$name->id}}" class="box1" name="check-item" id=""></td>
													<td>{{ ++$key }}</td>
													<td>{{ $name->name }}</td>
													<td>
														@can('permission-edit')
															<a class="btn btn-primary btn-sm" data-toggle="modal"
																href="#edit{{ $name->id }}">تعديل</a>
														@endcan
														{{--  --}}
														@if ($name->name !== 'Admin')
															@can('permission-delete')
																{!! Form::open(['method' => 'DELETE', 'route' => ['jobs.destroy',
																$name->id], 'style' => 'display:inline']) !!}
																{!! Form::submit('حذف', ['class' => 'btn btn-danger btn-sm']) !!}
																{!! Form::close() !!}
															@endcan
														@endif


													</td>
												</tr>
												<!-- edit modal -->
												<div class="modal" id="edit{{ $name->id }}">
													<div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content modal-content-demo">
															<div class="modal-header">
																<h6 class="modal-title">تعديل اسم المؤهل العلمي</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
															</div>
															<form action="{{ route('jobs.edit', $name->id) }}" method="PUT">
																{{ csrf_field() }}
																@method('put')
																<div class="modal-body">
																	<label for="">إسم المؤهل العلمي</label>
																	<input type="text" name="name" value="{{ $name->name }}" class="form-control">
																</div>
																<div class="modal-footer">
																	<button class="btn ripple btn-primary btn-sm" type="submit">حفظ</button>
																	<button class="btn ripple btn-secondary btn-sm" data-dismiss="modal" type="button">إلغاء</button>
																</div>
															</form>
														</div>
													</div>
												</div>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- delete all Modal -->
					<div class="modal" id="deleteAll">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content modal-content-demo">
								<div class="modal-header">
									<h6 class="modal-title">حذف الصفوف المختارة</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
								</div>
								<form action="{{ route('admin.deleteAll') }}" method="POST">
									{{ csrf_field() }}
									<div class="modal-body">
										<h6 class="text-danger">هل أنت متأكد من عملية الحذف ؟</h6>
										<input type="hidden" name="ids" id="delete_all_id">
									</div>
									<div class="modal-footer">
										<button class="btn ripple btn-primary btn-sm" type="submit">حذف الكل</button>
										<button class="btn ripple btn-secondary btn-sm" data-dismiss="modal" type="button">إلغاء</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- End Modal effects-->

						<!-- add modal -->
						<div class="modal" id="modaldemo8">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content modal-content-demo">
									<div class="modal-header">
										<h6 class="modal-title">إضافة مؤهل علمي جديد</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
									</div>
									<form action="{{ route('jobs.store') }}" method="POST">
										{{ csrf_field() }}
										<div class="modal-body">
											<label for="">إسم المؤهل العلمي</label>
											<input type="text" name="name" class="form-control">
										</div>
										<div class="modal-footer">
											<button class="btn ripple btn-primary btn-sm" type="submit">اضافة</button>
											<button class="btn ripple btn-secondary btn-sm" data-dismiss="modal" type="button">إلغاء</button>
										</div>
									</form>
								</div>
							</div>
						</div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
@jquery

<script>
	function checkAll(className, elem)
	{
		var elements = document.getElementsByClassName(className);
		var l = elements.length;

		if(elem.checked)
		{
			for(var i=0; i < l; i++)
			{
				elements[i].checked = true;
			}
		}else{
			for(var i=0; i < l; i++)
			{
				elements[i].checked = false;
			}
		}
	}
</script>

<script>
	$(function(){
		$('#btn-delete_all').click(function(){
			var selected = new Array();
			$('#datatable input[type="checkbox"]:checked').each(function(){
				selected.push(this.value);
			});
			if(selected.length > 0)
			{
				$('#deleteAll').modal('show')
				$('input[id="delete_all_id"]').val(selected);
			}
		});
	});
</script>
@endsection
