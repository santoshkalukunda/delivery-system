@extends('layouts.backend')
@section('title')
Dashbord
@endsection
@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Branch Form</div>
            </div>
            <div class="ibox-body">
                <form action="{{$branch->id ? route('branches.update',$branch) : route('branches.store')}}" method="post">
                    @csrf
                    @if ($branch->id)
                    @method('put')
                    @endif
                    <div class="md-form">
                        <input type="text" id="name" name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{old('name',$branch->name)}}">
                        <label for="name">Name Branch</label>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit"
                            class="btn btn-success btn-rounded">{{$branch->id ? "upadete" : "Add"}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="ibox">
            <div class="ibox-body table-responsive">
                <div class="row">
                    <div class="col-md">
                        <h3 class="m-0">Branches List</h3>
                    </div>
                    <div class="col-md text-right">
                        <span>Total Record: {{$branches->total()}}</span>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            
                            <th>Branch</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($branches as $branch)
                        <tr>
                            <td>{{$branch->name}}</td>
                            <td>
                                <a href="{{ route('branches.edit', $branch) }}" class="text-muted"><i
                                        class="fa fa-edit"></i></a>
                                <span class="mx-3">|</span>
                                <form action="{{ route('branches.destroy', $branch) }}"
                                    onsubmit="return confirm('Are you sure to delete?')" method="POST" class="d-inline">
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
                {{$branches->links()}}
            </div>
        </div>
    </div>
</div>
@endsection