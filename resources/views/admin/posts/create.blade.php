@extends('admin.layouts.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Новая сатья</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Новая сатья</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                            {{--                                //для сохранения данных categories.store, который будет вести на такую же страничку что и--}}
                            {{--                                показ списка категорий, но метод отправки данных у нас должен быть POST--}}
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror" id="title"
                                           placeholder="Название">

                                    <div class="form-group mt-3">
                                        <label for="description">Цитата</label>
                                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3" placeholder="Цитата ..." ></textarea>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="content">Контент</label>
                                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" rows="7" placeholder="Контент ..."></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="category_id">Категория</label>
                                        <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                                            @foreach($categories as $k => $v)
                                            <option value="{{ $k }}">{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="tags">Теги</label>
                                        <select class="select2" id="tags" name="tags[]" multiple="multiple" data-placeholder="Выбор тегов" style="width: 100%;">
                                            @foreach($tags as $k => $v)
                                            <option value="{{ $k }}">{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="thumbnail">Изображение</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="thumbnail" id="thumbnail" class="custom-file-input">
                                                <label class="custom-file-label" for="thumbnail">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection


