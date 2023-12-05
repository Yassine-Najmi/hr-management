@extends('backend.layouts.app')

@section('content')
    @livewire('backend.employees.employee-edit', ['user' => $user, 'jobs' => $jobs, 'id' => $user->id])
@endsection
