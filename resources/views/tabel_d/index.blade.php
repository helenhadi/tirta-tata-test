@extends('layout')
@section('title', 'Table D')

@section('content')
    <div class="row">
        <div class="col">
            @include('includes.alert')
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Table D</h3>
                        </div>
                    </div>
                    <div class="col text-right">
                        <button class="btn btn-sm btn-primary" data-target="#modalPopup" data-toggle="modal" onclick="showModal(0, 'd')">Add New Data</button>
                        <button class="btn btn-sm btn-success" data-target="#modalPopup" data-toggle="modal" onclick="showModal(0, 'd-import')">Import Data</button>
                        <div class="dropdown">
                            <button class="btn btn-danger dropdown-toggle btn-sm" type="button" id="dropdownExport" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Export
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownExport">
                                <div class="dropdown-item">
                                    <a href="{{ route('d.export.excel') }}" class="btn btn-sm btn-info">Excel</a>
                                </div>
                                <div class="dropdown-item">
                                    <a href="{{ route('d.export.pdf') }}" class="btn btn-sm btn-warning">PDF</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="datatable">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Kode Sales</th>
                                <th scope="col">Nama Sales</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @if (count($data) > 0)
                                @foreach ($data as $item)
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm">{{ $item->kode_sales }}</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td>{{ $item->nama_sales }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-success" data-target="#modalPopup" data-toggle="modal" onclick="showModal('{{ $item->kode_sales }}', 'd')">Edit</button>
                                            <form method="POST" action="{{ route('d.delete', ['id' => $item->kode_sales]) }}">
                                                @csrf
                                                <button class="btn btn-sm btn-danger" type="submit" onclick="if(!confirm('Are you sure want to delete this data? You can\'t undo this action.')) return false;">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <th colspan="3">Tidak ada data.</th>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection