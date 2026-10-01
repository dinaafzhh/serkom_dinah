@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">
                Data Siswa
            </h4>

            <p class="text-muted mb-0">
                Kelola data siswa sekolah.
            </p>
        </div>

        <a href="{{ route('admin.siswa.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-circle me-1"></i>
            Tambah Siswa

        </a>

    </div>


    {{-- PESAN SUCCESS --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show"
             role="alert">

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close">
            </button>

        </div>

    @endif


    {{-- FILTER JENIS KELAMIN --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <h6 class="fw-bold mb-3">
                Filter Jenis Kelamin
            </h6>

            <div class="d-flex gap-2 flex-wrap">

                {{-- SEMUA --}}
                <a href="{{ route('admin.siswa.siswa') }}"
                   class="btn {{ !request('jenis_kelamin') ? 'btn-primary' : 'btn-outline-primary' }}">

                    <i class="bi bi-people-fill me-1"></i>
                    Semua

                </a>


                {{-- LAKI-LAKI --}}
                <a href="{{ route('admin.siswa.siswa', ['jenis_kelamin' => 'Laki-Laki']) }}"
                   class="btn {{ request('jenis_kelamin') == 'Laki-Laki' ? 'btn-primary' : 'btn-outline-primary' }}">

                    <i class="bi bi-gender-male me-1"></i>
                    Laki-Laki

                </a>


                {{-- PEREMPUAN --}}
                <a href="{{ route('admin.siswa.siswa', ['jenis_kelamin' => 'Perempuan']) }}"
                   class="btn {{ request('jenis_kelamin') == 'Perempuan' ? 'btn-danger' : 'btn-outline-danger' }}">

                    <i class="bi bi-gender-female me-1"></i>
                    Perempuan

                </a>

            </div>

        </div>

    </div>


    {{-- DATA SISWA --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <h5 class="mb-0 fw-bold">

                Daftar Siswa

                @if(request('jenis_kelamin'))

                    <span class="text-muted fs-6">
                        - {{ request('jenis_kelamin') }}
                    </span>

                @endif

            </h5>

        </div>


        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-light">

                        <tr class="text-center">

                            <th width="5%">
                                No
                            </th>

                            <th>
                                NISN
                            </th>

                            <th>
                                Nama Siswa
                            </th>

                            <th>
                                Jenis Kelamin
                            </th>

                            <th>
                                Tahun Masuk
                            </th>

                            <th width="15%">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($siswa as $index => $item)

                            <tr>

                                {{-- NOMOR --}}
                                <td class="text-center">
                                    {{ $siswa->firstItem() + $index }}
                                </td>


                                {{-- NISN --}}
                                <td>
                                    {{ $item->nisn }}
                                </td>


                                {{-- NAMA --}}
                                <td class="fw-semibold">
                                    {{ $item->nama_siswa }}
                                </td>


                                {{-- JENIS KELAMIN --}}
                                <td class="text-center">

                                    @if($item->jenis_kelamin == 'Laki-Laki')

                                        <span class="badge bg-primary-subtle text-primary px-2 py-2">

                                            <i class="bi bi-gender-male me-1"></i>

                                            Laki-Laki

                                        </span>

                                    @elseif($item->jenis_kelamin == 'Perempuan')

                                        <span class="badge bg-danger-subtle text-danger px-2 py-2">

                                            <i class="bi bi-gender-female me-1"></i>

                                            Perempuan

                                        </span>

                                    @else

                                        <span class="badge bg-secondary-subtle text-secondary px-2 py-2">

                                            {{ $item->jenis_kelamin }}

                                        </span>

                                    @endif

                                </td>


                                {{-- TAHUN MASUK --}}
                                <td class="text-center">

                                    <span class="badge bg-primary-subtle text-primary px-2 py-2">

                                        {{ $item->tahun_masuk }}

                                    </span>

                                </td>


                                {{-- AKSI --}}
                                <td class="text-center">

                                    {{-- EDIT --}}
                                    <a href="{{ route('admin.siswa.edit', ['siswa' => $item->id_siswa]) }}"
                                       class="btn btn-sm btn-warning text-white me-1"
                                       title="Edit">

                                        <i class="bi bi-pencil-square"></i>

                                    </a>


                                    {{-- HAPUS --}}
                                    <form action="{{ route('admin.siswa.destroy', ['siswa' => $item->id_siswa]) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus data siswa ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-sm btn-danger"
                                                title="Hapus">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6"
                                    class="text-center py-4 text-muted">

                                    <i class="bi bi-person-x fs-3 d-block mb-2"></i>

                                    Belum ada data siswa yang ditambahkan.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- PAGINATION --}}
            @if($siswa->hasPages())

                <div class="mt-4">

                    {{ $siswa->links() }}

                </div>

            @endif

        </div>

    </div>

</div>

@endsection
