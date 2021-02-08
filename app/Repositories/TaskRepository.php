<?php

namespace App\Repositories;

use App\User;

class TaskRepository {
	public function getByUser(User $user) {
		return $user->tasks()->orderBy('created_at', 'asc')->paginate(5);
	}
}