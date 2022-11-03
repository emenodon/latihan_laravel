@extends('layout.index')

@section('title', 'List Post')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>List Post</h1>
            <div class="float-right">
                <a href="{{ route('post.create') }}" class="btn btn-success ml-2"><i class="fas fa-plus"></i> Post Baru</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">List Postingan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4>Database</h4>
                    </div> --}}
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                                <h4>Filter</h4>
                            </div>
                            @if (Session::has('danger'))
                                <p class="alert alert-danger">
                                    {{ Session::get('danger') }}
                                </p>
                            @endif
                            @if (Session::has('success'))
                                <p class="alert alert-success">
                                    {{ Session::get('success') }}
                                </p>
                            @endif
                            <div class="card-body">
                                <form action="{{ route('post.index') }}">
                                    <div class="row">
                                        <div class="form-group col-3">
                                            <label>Nama Post</label>
                                            <input type="text" name="q" class="form-control"
                                                placeholder="Nama Post">
                                        </div>
                                        <div class="form-group col-3">
                                            <label>Status</label>
                                            <select name="status" class="form-control">
                                                <option value="" selected>All</option>
                                                <option value="0">Draft</option>
                                                <option value="1">Publish</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-3">
                                            <label>Tanggal Mulai</label>
                                            <input type="date" name="from_date" class="form-control">
                                        </div>
                                        <div class="form-group col-3">
                                            <label>Tanggal Selesai</label>
                                            <input type="date" name="to_date" class="form-control">
                                        </div>
                                        <div class="form-group col-4">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="fas fa-fingerprint"></i> Filter</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <thead align="center">
                                    <tr>
                                        <th>#</th>
                                        <th>Photo</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody align="center">
                                    @php
                                        $no = 1;
                                    @endphp
                                    @forelse ($data as $val)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                <img src="{{ $val->photo }}" alt="" width="50px">
                                            </td>
                                            <td align="left">{{ $val->title }}</td>
                                            <td>{{ $val->category->name }}</td>
                                            <td>
                                                @if ($val->is_active == 1)
                                                    <div class="badge badge-success">Active</div>
                                                @else
                                                    <div class="badge badge-danger">Non-Active</div>
                                                @endif
                                            </td>
                                            <td>{{ $val->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <a href="/detail" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                <a href="/edit" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                                <a href="/delete" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">
                                                tidak ada data
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <ul class="pagination mb-0 pt-5">
                            {!! $data->links('components.pagination') !!}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
