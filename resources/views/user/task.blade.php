@extends('layouts.default')

@section('title', 'Task')

@section('sidebar')
    <li class="nav-small-cap">
        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
        <span class="hide-menu">Home</span>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('user.dashboard') }}" aria-expanded="false">
            <span>
                <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Dashboard</span>
        </a>
    </li>
    <li class="nav-small-cap">
        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
        <span class="hide-menu">Task</span>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('task.index') }}" aria-expanded="false">
            <span>
                <i class="ti ti-list"></i>
            </span>
            <span class="hide-menu">Task List</span>
        </a>
    </li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100 h-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">List Task</h5>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                        Add Task
                    </button>
                    <!-- Add Modal -->
                    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="{{ route('task.store') }}">
                                    @csrf
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="addModalLabel">Add Task</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="name_task">Name Task</label>
                                            <input name="name_task" id="name_task" type="text" class="form-control"
                                                id="name_task">
                                        </div>
                                        <div class="mb-4">
                                            <label for="priority">Priority</label>
                                            <select name="priority" id="priority" class="form-control">
                                                <option value="" disabled selected>...</option>
                                                <option value="high">High</option>
                                                <option value="medium">Medium</option>
                                                <option value="low">Low</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="date">Date Task</label>
                                            <input name="date" type="date" class="form-control" id="date">
                                        </div>
                                        <div class="mb-3">
                                            <label for="deadline">Deadline Task</label>
                                            <input name="deadline" type="date" class="form-control" id="deadline">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">No</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Name Task</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Priority</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Date</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Deadline</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Status</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Action</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $index => $task)
                                    <tr>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">{{ $index + 1 }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1">{{ $task->name_task }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            @if ($task->priority == 'high')
                                                <span class="badge bg-danger rounded-3 fw-semibold">High</span>
                                            @elseif ($task->priority == 'medium')
                                                <span class="badge bg-warning rounded-3 fw-semibold">Medium</span>
                                            @else
                                                <span class="badge bg-success rounded-3 fw-semibold">Low</span>
                                            @endif
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">
                                                {{ \Carbon\Carbon::parse($task->date)->format('d/m/Y') }}</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">
                                                {{ \Carbon\Carbon::parse($task->deadline)->format('d/m/Y') }}</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            @if ($task->status == 'finished')
                                                <span class="badge bg-success rounded-3 fw-semibold">Finished</span>
                                            @else
                                                <span class="badge bg-danger rounded-3 fw-semibold">Unfinished</span>
                                            @endif
                                        </td>
                                        <td class="border-bottom-0">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $task->id }}">
                                                Edit
                                            </button>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="editModal{{ $task->id }}" tabindex="-1"
                                                aria-labelledby="editModalLabel{{ $task->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form method="POST"
                                                            action="{{ route('task.update', $task->id) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5"
                                                                    id="editModalLabel{{ $task->id }}">Edit Task
                                                                </h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="name_task_{{ $task->id }}">Name
                                                                        Task</label>
                                                                    <input name="name_task"
                                                                        id="name_task_{{ $task->id }}" type="text"
                                                                        class="form-control"
                                                                        value="{{ $task->name_task }}">
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label for="status_{{ $task->id }}">Status</label>
                                                                    <select name="status"
                                                                        id="status_{{ $task->id }}"
                                                                        class="form-control">
                                                                        <option value="" disabled selected>...
                                                                        </option>
                                                                        <option value="finished">Finished</option>
                                                                        <option value="unfinished">Unfinished</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $task->id }}">
                                                Delete
                                            </button>

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="deleteModal{{ $task->id }}" tabindex="-1"
                                                aria-labelledby="deleteModalLabel{{ $task->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5"
                                                                id="deleteModalLabel{{ $task->id }}">Delete Task</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete "{{ $task->name_task }}"?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <form method="POST"
                                                                action="{{ route('task.destroy', $task->id) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Yes,
                                                                    Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
