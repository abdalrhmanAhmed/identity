<div class="row row-sm">
	<div class="col-xl-3 col-lg-6 col-sm-6 col-md-6">
		<div class="card text-center">
			<div class="card-body ">
				<div class="feature widget-2 text-center mt-0 mb-3">
					<i class="ti-bar-chart project bg-primary-transparent mx-auto text-primary "></i>
				</div>
				<h6 class="mb-1 text-muted">عدد الطلاب المقبولين </h6>
				<h2 class="counter mb-0 text-black">{{$students->count()}}</h2>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-6 col-sm-6 col-md-6">
		<div class="card text-center">
			<div class="card-body ">
				<div class="feature widget-2 text-center mt-0 mb-3">
					<i class="ti-pie-chart project bg-pink-transparent mx-auto text-pink "></i>
				</div>
				<h6 class="mb-1 text-muted">عدد الكليات</h6>
				<h2 class="counter mb-0 text-black">{{$facs->count()}}</h2>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-6 col-sm-6 col-md-6">
		<div class="card text-center">
			<div class="card-body">
				<div class="feature widget-2 text-center mt-0 mb-3">
					<i class="ti-pulse  project bg-teal-transparent mx-auto text-teal "></i>
				</div>
				<h6 class="mb-1 text-muted">عدد الأقسام</h6>
				<h2 class="counter mb-0 text-black">{{$depts->count()}}</h2>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-6 col-sm-6 col-md-6">
		<div class="card text-center">
			<div class="card-body ">
				<div class="feature widget-2 text-center mt-0 mb-3">
					<i class="ti-stats-up project bg-success-transparent mx-auto text-success "></i>
				</div>
				<h6 class="mb-1 text-muted">عدد المقبولين في الشواغر</h6>
				<h2 class="counter mb-0 text-black">------</h2>
			</div>
		</div>
	</div>
</div>