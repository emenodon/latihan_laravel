@extends('layout.index')

@section('title', 'New Post')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('post.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Buat Post Baru</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('post.index') }}">List Postingan</a></div>
                <div class="breadcrumb-item">Buat Post Baru</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Buat Post Baru</h2>
            <p class="section-lead">
                Pada halaman ini anda dapat membuat postingan baru.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Write Your Post</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        Title
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <input name="title" type="text" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="category" required>
                                            <option value="" selected>----Pilih----</option>
                                            @forelse ($data as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @empty
                                                <option value="">Tidak Ada Category</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        Desctiption
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="description" rows="30" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Choose File</label>
                                            <input type="file" name="image" id="image-upload" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" required name="status">
                                            <option value="" selected>---Pilih--</option>
                                            <option value="1">Publish</option>
                                            <option value="2">Draft</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary" type="submit">Buat Post</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
