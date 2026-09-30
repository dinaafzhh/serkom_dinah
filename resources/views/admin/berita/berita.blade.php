@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">
                Data Berita
            </h4>

            <p class="text-muted mb-0">
                Kelola berita dan informasi sekolah
            </p>
        </div>

        <a href="{{ route('admin.berita.create') }}"
           class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>
            Tambah Berita
        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>

    @endif

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <h5 class="mb-0 fw-semibold">
                Daftar Berita
            </h5>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-light">

                        <tr class="text-center">

                            <th width="60">
                                No
                            </th>

                            <th width="120">
                                Gambar
                            </th>

                            <th width="180">
                                Judul
                            </th>

                            <th width="350">
                                Isi Berita
                            </th>

                            <th width="130">
                                Tanggal
                            </th>

                            <th width="120">
                                Penulis
                            </th>

                            <th width="100">
                                Status
                            </th>

                            <th width="120">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($berita as $index => $item)

                            <tr>


                                <td class="text-center">
                                    {{ $index + 1 }}
                                </td>

                                <td class="text-center">

                                    @if($item->gambar)

                                        <img
                                            src="{{ asset('storage/' . $item->gambar) }}"
                                            alt="Gambar Berita"
                                            width="80"
                                            height="60"
                                            class="rounded"
                                            style="object-fit: cover;"
                                        >

                                    @else

                                        <div
                                            class="bg-light rounded d-flex align-items-center justify-content-center mx-auto"
                                            style="width:80px;height:60px;"
                                        >
                                            <i class="bi bi-image text-muted fs-4"></i>
                                        </div>

                                    @endif

                                </td>

                                <td>

                                    <div class="fw-semibold">
                                        {{ $item->judul }}
                                    </div>

                                </td>

                                <td>

                                    @if($item->isi)

                                        <div class="isi-berita">
                                            {{ $item->isi }}
                                        </div>

                                    @else

                                        <span class="text-muted">
                                            Belum ada isi berita
                                        </span>

                                    @endif

                                </td>



                                <td class="text-center">

                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}

                                </td>

                                <td>

                                    @if($item->user)

                                        {{ $item->user->username }}

                                    @else

                                        <span class="text-muted">
                                            -
                                        </span>

                                    @endif

                                </td>

                                <td class="text-center">

                                    @if($item->status == 'Publish')

                                        <span class="badge bg-success">
                                            Publish
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            Draft
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <div class="d-flex justify-content-center gap-2">

                                        <a
                                            href="{{ route('admin.berita.edit', ['id' => $item->id_berita]) }}"
                                            class="btn btn-sm btn-warning"
                                            title="Edit"
                                        >
                                            <i class="bi bi-pencil-square"></i>
                                        </a>


                                        <form
                                            action="{{ route('admin.berita.destroy', ['id' => $item->id_berita]) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus berita ini?')"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-danger"
                                                title="Hapus"
                                            >
                                                <i class="bi bi-trash"></i>
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="8"
                                    class="text-center py-5"
                                >

                                    <i class="bi bi-newspaper fs-1 text-muted d-block mb-2"></i>

                                    <h6 class="fw-semibold">
                                        Belum Ada Berita
                                    </h6>

                                    <p class="text-muted mb-0">
                                        Silakan tambahkan berita baru.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>


<style>

.isi-berita {
    max-width: 350px;

    display: -webkit-box;

    -webkit-line-clamp: 3;

    -webkit-box-orient: vertical;

    overflow: hidden;

    line-height: 1.5;

}

</style>

@endsection
