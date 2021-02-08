@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			<form action="{{ url('tasks') }}" method="POST">
				{{ csrf_field() }}
				<div class="form-group">
					<div class="input-group">
						<label for="newTaskName" class="sr-only">Novo nome da tarefa</label>
						<input type="text" name="name" id="newTaskName" class="form-control" placeholder="Descreva a tarefa">
						<span class="input-group-btn">
							<button class="btn btn-primary" type="submit">Adicionar Tarefa</button>
						</span>
					</div>
				</div>
				@include('commons.errors')
			</form>			
			<div class="panel panel-info">
				<div class="panel-heading">Tarefas</div>

				<div class="panel-body">
					@if(count($tasks))
						<table class="table table-hover" id="taskListTable">
							<thead>
								<tr>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($tasks as $task)
									<tr>
										<td>
											@if($task->done)
												<del>{{ $task->name }}</del>
											@else
												{{ $task->name }}
											@endif
										</td>
										<td class="text-center">
											<form class="inline" action={{ url('tasks/'.$task->id) }} method="POST">
												{{ csrf_field() }}
												{{ method_field('PATCH') }}

												@if($task->done)
													<button class="btn btn-danger" type="submit" aria-label="Undone" title="Marque como não feito">
														<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
													</button>
												@else
													<button class="btn btn-success" type="submit" aria-label="Done" title="Marque como feito">
														<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
													</button>
												@endif
											</form>
											<form class="inline" action="{{ url('tasks/'.$task->id) }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}
												
												<button class="btn btn-default" type="submit" aria-label="Delete" title="Deletar tarefa">
													<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
												</button>
											</form>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					@endif
					{{ $tasks->links() }}
				</div>
			</div>	
		</div>
	</div>
</div>
@endsection
