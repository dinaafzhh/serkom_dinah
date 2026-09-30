@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">
                Data Ekstrakurikuler
            </h4>

            <p class="text-muted mb-0">
                Kelola data kegiatan ekstrakurikuler sekolah
            </p>
        </div>

        <a href="{{ route('admin.ektrakurikuler.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-lg me-1"></i>
            Tambah Ekstrakurikuler

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <i class="bi bi-check-circle me-2"></i>

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
                Daftar Ekstrakurikuler
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
                                Nama Ekskul
                            </th>

                            <th width="150">
                                Pembina
                            </th>

                            <th width="170">
                                Jadwal Latihan
                            </th>

                            <th width="350">
                                Deskripsi
                            </th>

                            <th width="130">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($ekstrakurikuler as $index => $item)

                            <tr>
                                <td class="text-center">
                                    {{ $index + 1 }}
                                </td>

                                <td class="text-center">

                                    @if($item->gambar)

                                        <img src="{{ asset('storage/' . $item->gambar) }}"
                                             alt="Gambar Ekskul"
                                             class="rounded"
                                             style="
                                                width:80px;
                                                height:60px;
                                                object-fit:cover;
                                             ">

                                    @else

                                        <div class="bg-light rounded d-flex align-items-center justify-content-center mx-auto"
                                             style="
                                                width:80px;
                                                height:60px;
                                             ">

                                            <i class="bi bi-image text-muted fs-4"></i>

                                        </div>

                                    @endif

                                </td>

                                <td>

                                    <div class="fw-semibold">
                                        {{ $item->nama_ekskul }}
                                    </div>

                                    <small class="text-muted">
                                        ID: {{ $item->id_ekskul }}
                                    </small>

                                </td>

                                <td>
                                    {{ $item->pembina }}
                                </td>

                                <td>

                                    <span class="badge bg-light text-dark border">

                                        <i class="bi bi-clock me-1"></i>

                                        {{ $item->jadwal_latihan }}

                                    </span>

                                </td>

                                <td>

                                    @if($item->deskripsi)

                                        <div class="deskripsi-singkat">
                                            {{ $item->deskripsi }}
                                        </div>

                                    @else

                                        <span class="text-muted">
                                            Belum ada deskripsi
                                        </span>

                                    @endif

                                </td>


                                <td>

                                    <div class="d-flex justify-content-center gap-2">

                                        <a href="{{ route('admin.ektrakurikuler.edit', $item->id_ekskul) }}"
                                           class="btn btn-sm btn-outline-primary"
                                           title="Edit">

                                            <i class="bi bi-pencil"></i>

                                        </a>


                                        <form action="{{ route('admin.ektrakurikuler.destroy', $item->id_ekskul) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-outline-danger"
                                                    title="Hapus">

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7"
                                    class="text-center py-5">

                                    <i class="bi bi-trophy fs-1 text-muted d-block mb-2"></i>

                                    <h6 class="fw-semibold">
                                        Belum Ada Data Ekstrakurikuler
                                    </h6>

                                    <p class="text-muted mb-0">
                                        Silakan tambahkan kegiatan ekstrakurikuler baru.
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

    .deskripsi-singkat {
        max-width: 350px;

        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;

        overflow: hidden;

        line-height: 1.5;
    }

</style>

@endsection
