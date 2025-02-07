@extends('layouts.default')

@section('title', 'Dashboard')

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
        <div class="col-lg-4 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <div class="mb-4">
                        <h5 class="card-title fw-semibold">Recent Task</h5>
                    </div>
                    <ul class="timeline-widget mb-0 position-relative mb-n5">
                        @foreach ($tasks as $index => $task)
                            <li class="timeline-item d-flex position-relative overflow-hidden">
                                <div class="timeline-time">{{ $index + 1 }}
                                </div>
                                <div class="timeline-time">{{ \Carbon\Carbon::parse($task->created_at)->format('H:i') }}
                                </div>
                                <div class="timeline-desc fs-3 text-dark mt-n1">{{ $task->name_task }}</div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Recent Task</h5>
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
                                        <h6 class="fw-semibold mb-0">Status</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Priority</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Deadline</h6>
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
                                            @if ($task->status == 'finished')
                                                <span class="badge bg-success rounded-3 fw-semibold">Finished</span>
                                            @else
                                                <span class="badge bg-danger rounded-3 fw-semibold">Unfinished</span>
                                            @endif
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
                                                {{ \Carbon\Carbon::parse($task->deadline)->format('d/m/Y') }}</p>
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
