@extends('layouts.index')
@section('content')
<div class="container">
	<div class="row">

	{{-- Présentation des activités --}}
		<div id="présentations">
			<div class="col-sm-6 col-md-3">
				<div class="service wow fadeInDown animated" style="visibility: visible; -webkit-animation: fadeInDown;">
			        <h3>Activité 1</h3>
			        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et...</p>
			        <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#activity1">
			          Détails...
			        </button>
			    </div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="service wow fadeInDown animated" style="visibility: visible; -webkit-animation: fadeInDown;">
			        <h3>Activité 2</h3>
			        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et...</p>
			        <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#activity2">
			          Détails...
			        </button>
			    </div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="service wow fadeInDown animated" style="visibility: visible; -webkit-animation: fadeInDown;">
			        <h3>Activité 3</h3>
			        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et...</p>
			        <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#activity3">
			          Détails...
			        </button>
			    </div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="service wow fadeInDown animated" style="visibility: visible; -webkit-animation: fadeInDown;">
			        <h3>Activité 4</h3>
			        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et...</p>
			        <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#activity4">
			          Détails...
			        </button>
			    </div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="service wow fadeInDown animated" style="visibility: visible; -webkit-animation: fadeInDown;">
			        <h3>Activité 5</h3>
			        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et...</p>
			        <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#activity5">
			          Détails...
			        </button>
			    </div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="service wow fadeInDown animated" style="visibility: visible; -webkit-animation: fadeInDown;">
			        <h3>Activité 6</h3>
			        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et...</p>
			        <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#activity6">
			          Détails...
			        </button>
			    </div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="service wow fadeInDown animated" style="visibility: visible; -webkit-animation: fadeInDown;">
			        <h3>Activité 7</h3>
			        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et...</p>
			        <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#activity7">
			          Détails...
			        </button>
			    </div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="service wow fadeInDown animated" style="visibility: visible; -webkit-animation: fadeInDown;">
			        <h3>Activité 8</h3>
			        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et...</p>
			        <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#activity8">
			          Détails...
			        </button>
			    </div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="service wow fadeInDown animated" style="visibility: visible; -webkit-animation: fadeInDown;">
			        <h3>Activité 9</h3>
			        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et...</p>
			        <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#activity9">
			          Détails...
			        </button>
			    </div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="service wow fadeInDown animated" style="visibility: visible; -webkit-animation: fadeInDown;">
			        <h3>Activité 10</h3>
			        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et...</p>
			        <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#activity10">
			          Détails...
			        </button>
			    </div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="service wow fadeInDown animated" style="visibility: visible; -webkit-animation: fadeInDown;">
			        <h3>Activité 11</h3>
			        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et...</p>
			        <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#activity11">
			          Détails...
			        </button>
			    </div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="service wow fadeInDown animated" style="visibility: visible; -webkit-animation: fadeInDown;">
			        <h3>Activité 12</h3>
			        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et...</p>
			        <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#activity12">
			          Détails...
			        </button>
			    </div>
			</div>
		</div>
	</div>

	{{-- Descriptions des activités --}}
	<div id="descriptions">
		<div class="modal fade" id="activity1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Activité 1</h4>
					</div>
					<div class="modal-body">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga aliquid rem, enim ipsa error expedita libero voluptas omnis ullam possimus explicabo nesciunt quae praesentium illo iste et alias, dolor cumque consequatur sunt debitis reiciendis architecto saepe sequi. Repellat deserunt distinctio nihil, eius corrupti culpa libero necessitatibus quam, ab eveniet, totam.
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="activity2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Activité 2</h4>
					</div>
					<div class="modal-body">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga aliquid rem, enim ipsa error expedita libero voluptas omnis ullam possimus explicabo nesciunt quae praesentium illo iste et alias, dolor cumque consequatur sunt debitis reiciendis architecto saepe sequi. Repellat deserunt distinctio nihil, eius corrupti culpa libero necessitatibus quam, ab eveniet, totam.
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="activity3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Activité 3</h4>
					</div>
					<div class="modal-body">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga aliquid rem, enim ipsa error expedita libero voluptas omnis ullam possimus explicabo nesciunt quae praesentium illo iste et alias, dolor cumque consequatur sunt debitis reiciendis architecto saepe sequi. Repellat deserunt distinctio nihil, eius corrupti culpa libero necessitatibus quam, ab eveniet, totam.
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="activity4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Activité 4</h4>
					</div>
					<div class="modal-body">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga aliquid rem, enim ipsa error expedita libero voluptas omnis ullam possimus explicabo nesciunt quae praesentium illo iste et alias, dolor cumque consequatur sunt debitis reiciendis architecto saepe sequi. Repellat deserunt distinctio nihil, eius corrupti culpa libero necessitatibus quam, ab eveniet, totam.
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="activity5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Activité 5</h4>
					</div>
					<div class="modal-body">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga aliquid rem, enim ipsa error expedita libero voluptas omnis ullam possimus explicabo nesciunt quae praesentium illo iste et alias, dolor cumque consequatur sunt debitis reiciendis architecto saepe sequi. Repellat deserunt distinctio nihil, eius corrupti culpa libero necessitatibus quam, ab eveniet, totam.
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="activity6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Activité 6</h4>
					</div>
					<div class="modal-body">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga aliquid rem, enim ipsa error expedita libero voluptas omnis ullam possimus explicabo nesciunt quae praesentium illo iste et alias, dolor cumque consequatur sunt debitis reiciendis architecto saepe sequi. Repellat deserunt distinctio nihil, eius corrupti culpa libero necessitatibus quam, ab eveniet, totam.
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="activity7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Activité 7</h4>
					</div>
					<div class="modal-body">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga aliquid rem, enim ipsa error expedita libero voluptas omnis ullam possimus explicabo nesciunt quae praesentium illo iste et alias, dolor cumque consequatur sunt debitis reiciendis architecto saepe sequi. Repellat deserunt distinctio nihil, eius corrupti culpa libero necessitatibus quam, ab eveniet, totam.
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="activity8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Activité 8</h4>
					</div>
					<div class="modal-body">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga aliquid rem, enim ipsa error expedita libero voluptas omnis ullam possimus explicabo nesciunt quae praesentium illo iste et alias, dolor cumque consequatur sunt debitis reiciendis architecto saepe sequi. Repellat deserunt distinctio nihil, eius corrupti culpa libero necessitatibus quam, ab eveniet, totam.
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="activity9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Activité 9</h4>
					</div>
					<div class="modal-body">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga aliquid rem, enim ipsa error expedita libero voluptas omnis ullam possimus explicabo nesciunt quae praesentium illo iste et alias, dolor cumque consequatur sunt debitis reiciendis architecto saepe sequi. Repellat deserunt distinctio nihil, eius corrupti culpa libero necessitatibus quam, ab eveniet, totam.
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="activity10" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Activité 10</h4>
					</div>
					<div class="modal-body">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga aliquid rem, enim ipsa error expedita libero voluptas omnis ullam possimus explicabo nesciunt quae praesentium illo iste et alias, dolor cumque consequatur sunt debitis reiciendis architecto saepe sequi. Repellat deserunt distinctio nihil, eius corrupti culpa libero necessitatibus quam, ab eveniet, totam.
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="activity11" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Activité 11</h4>
					</div>
					<div class="modal-body">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga aliquid rem, enim ipsa error expedita libero voluptas omnis ullam possimus explicabo nesciunt quae praesentium illo iste et alias, dolor cumque consequatur sunt debitis reiciendis architecto saepe sequi. Repellat deserunt distinctio nihil, eius corrupti culpa libero necessitatibus quam, ab eveniet, totam.
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="activity12" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Activité 12</h4>
					</div>
					<div class="modal-body">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga aliquid rem, enim ipsa error expedita libero voluptas omnis ullam possimus explicabo nesciunt quae praesentium illo iste et alias, dolor cumque consequatur sunt debitis reiciendis architecto saepe sequi. Repellat deserunt distinctio nihil, eius corrupti culpa libero necessitatibus quam, ab eveniet, totam.
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop