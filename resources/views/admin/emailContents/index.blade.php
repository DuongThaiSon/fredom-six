@extends('admin.layouts.main', ['activePage' => 'emailContent', 'title' => __('Email Content')])
@section('content')
<!-- Content -->
<div id="main-content">
    <div class="container-fluid" style="background: #e5e5e5;">
        <div id="content">
        <h1 class="mt-3 pl-4">QUẢN LÝ NỘI DUNG EMAIL GỬI TỪ HỆ THỐNG</h1>
        <!-- Save group button -->
        <div class="save-group-buttons">
            <a href="{{ route('admin.email-contents.create') }}"
            class="btn btn-sm btn-dark"
            data-toggle="tooltip"
            title="Tạo nội dung email mới"
            >
            <i class="material-icons">
                note_add
            </i>
            </a>
        </div>
        <!-- TABLE -->
        <div class="table-responsive bg-white mt-4" id="table">
            <table class="table-sm table-hover table mb-2" width="100%">
            <thead>
                <tr>
                <th style="width: 40px;">ID</th>
                {{-- <th>Gửi đi khi</th> --}}
                <th>Tiêu đề</th>
                <th style="width: 100px;">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($emailContents as $eco)
                <tr>
                <td>{{ $eco->id }}</td>
                {{-- <td>{{ $eco->send_when }}</td> --}}
                <td>{{ $eco->name }}</td>
                <td class="text-center">
                    <div class="btn-group">
                    <a
                        href="{{ route('admin.email-contents.edit', $eco->id) }}"
                        class="btn btn-sm p-1"
                        data-toggle="tooltip"
                        title="Sửa"
                    >
                        <i class="material-icons">border_color</i>
                    </a>
                    </div>
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        {{ $emailContents->links() }}
        <a
            href="https://drive.google.com/drive/folders/1HCQDgAW3zdZhjq9-Jgfwlep9kZjEkbnc"
            target="_blank"
            class="float-right mt-4"
        >
            <i class="material-icons">
            help_outline
            </i>
        </a>
        </div>
    </div>
</div>
@endsection
