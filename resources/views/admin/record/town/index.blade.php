@extends('layouts.master')
@section('css')
<!--Internal   Notify -->
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">السجل المدني</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/قائمة الوحدات الادارية</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
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

										</div>
									</div>
									<br>
								</div>

							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table mg-b-0 text-md-nowrap table-hover " id="datatable">
										<thead>
											<tr>
												<th><input type="checkbox" name="chekckAll" id="select-all" onclick="checkAll('box1', this)"></th>
												<th>#</th>
												<th>إسم المدينة</th>
												<th>إسم المحلية</th>
												<th>إسم الولاية</th>
												<th>العمليات</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($towns as $key => $adminis_name)
												<tr>
													<td><input type="checkbox" value="{{$adminis_name->id}}" class="box1" name="check-item" id=""></td>
													<td>{{ ++$key }}</td>
													<td>{{ $adminis_name->town_name }}</td>
													<td>{{$adminis_name->states[0]->state_name}}</td>
													<td>{{$adminis_name->local[0]->local_name}}</td>
													<td>
														@can('permission-edit')
															<a class="btn btn-primary btn-sm" data-toggle="modal"
																href="#edit{{ $adminis_name->id }}">تعديل</a>
														@endcan
														{{--  --}}

                                                        @can('permission-delete')
                                                            {!! Form::open(['method' => 'DELETE', 'route' => ['town.destroy',
                                                            $adminis_name->id], 'style' => 'display:inline']) !!}
                                                            {!! Form::submit('حذف', ['class' => 'btn btn-danger btn-sm']) !!}
                                                            {!! Form::close() !!}
                                                        @endcan



													</td>
												</tr>
												<!-- edit modal -->
												<div class="modal" id="edit{{ $adminis_name->id }}">
													<div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content modal-content-demo">
															<div class="modal-header">
																<h6 class="modal-title">تعديل إسم  المدينة</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
															</div>
															<form action="{{ route('town.edit', $adminis_name->id) }}" method="PUT">
																{{ csrf_field() }}
																@method('PUT')
																<div class="modal-body">
																	<label for="">إسم المدينة </label>
																	<input type="text" name="town_name" value="{{ $adminis_name->town_name }}" class="form-control">
																	<label class="form-label">لإسم الولاية</label>
																	<select name="state_id" id="select-beast" class="form-control" data-parsley-class-handler="#lnWrapper" required="">
																		<option selected value="{{$adminis_name->states[0]->id}}">{{$adminis_name->states[0]->state_name}}</option>
																		@foreach ($States	 as $item)
																			<option value="{{$item->id}}">{{$item->state_name}}</option>
																		@endforeach
																	</select>
																	<label class="form-label">اسم المحلية</label>
																	<select name="local_id" id="select-beast" class="form-control" data-parsley-class-handler="#lnWrapper" required="">
																		<option selected value="{{$adminis_name->local[0]->id}}">{{$adminis_name->local[0]->local_name}}</option>
																		@foreach ($locales as $item)
																			<option value="{{$item->id}}">{{$item->local_name}}</option>
																		@endforeach
																	</select>
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

						<!-- add modal -->
						<div class="modal" id="modaldemo8">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content modal-content-demo">
									<div class="modal-header">
										<h6 class="modal-title">إضافة إسم   المدينة</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
									</div>
									<form action="{{ route('town.store') }}" method="POST">
										{{ csrf_field() }}
										<div class="modal-body">
											<label for="">إسم المدينة</label>
											<input type="text" name="town_name" class="form-control" required>
											<label class="form-label">لإسم الولاية</label>
											<select name="state_id" id="select-beast" class="form-control" data-parsley-class-handler="#lnWrapper" required="">
												@foreach ($States	 as $item)
													<option value="{{$item->id}}">{{$item->state_name}}</option>
												@endforeach
											</select>
											<label class="form-label">اسم المحلية</label>
											<select name="local_id" id="select-beast" class="form-control" data-parsley-class-handler="#lnWrapper" required="">
												@foreach ($locales as $item)
													<option value="{{$item->id}}">{{$item->local_name}}</option>
												@endforeach
											</select>
										</div>
										<div class="modal-footer">
											<button class="btn ripple btn-primary btn-sm" type="submit">إضافة</button>
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
