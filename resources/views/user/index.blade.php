@extends('layouts.backend')
@section('title')
User List
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="mb-2">
            <a href="{{route('register')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Register</a>
        </div>
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">User List</div>
            </div>
            <div class="ibox-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Branch</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr>
                                <td>
                                    {{$user->branch->name}}
                                </td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td> @foreach($user->roles as $role)
                                    {{ $role->name }}
                                    @if(!$loop->last)| @endif
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('users.changePasswordShow', $user) }}" class="text-muted"><i
                                            class="fa fa-key"></i></a>
                                </td>
                                <td>
                                    <a href="{{ route('users.edit', $user) }}" class="text-muted"><i
                                            class="fa fa-edit"></i></a>
                                </td>
                                <td>
                                    <form action="{{ route('users.destroy', $user) }}"
                                        onsubmit="return confirm('Are you sure to delete?')" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="border-0 my-0 p-0 text-danger bg-transparent"><i
                                                class="fa fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="10"><span class="text-danger">*No data list Found</span></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection