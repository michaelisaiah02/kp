@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row justify-content-center mb-3 mx-3">
            <div class="col d-flex justify-content-center">
                <h1 class="py-1 px-5 bg-dark-1 text-light rounded-3 fw-light border border-light">Rekon
                    {{ $rekon }}
                </h1>
            </div>
            <div class="row justify-content-center border-0 rounded-2 mt-3" style="max-height: 700px; overflow: auto;">
                <table class="table table-striped table-dark text-wrap text-center">
                    <thead class="fixed-header">
                        <tr>
                            <th scope="col" class="bg-danger-2 align-middle">#</th>
                            @foreach ($headers as $header)
                                <th scope="col" class="bg-danger-2 align-middle">{{ $header }}</th>
                            @endforeach
                            <th scope="col" class="bg-danger-2 align-middle">Eksekutor</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @dd($valins[1]['TIMESTAMP']) --}}
                        @foreach ($valins as $index => $valin)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $valin['TIMESTAMP'] }}</td>
                                <td>{{ $valin['WITEL'] }}</td>
                                <td>{{ $valin['ID VALINS'] }}</td>
                                <td><a href="{{ $valin['Upload Eviden Web Valins'] }}"
                                        target="blank">{{ Str::limit($valin['Upload Eviden Web Valins'], 25) }}</a>
                                </td>
                                <td><a href="{{ $valin['Tambahan Eviden Web Valins'] }}"
                                        target="blank">{{ Str::limit($valin['Tambahan Eviden Web Valins'], 25) }}</a>
                                </td>
                                {{-- <td>{{ $valin['ID VALINS LAMA'] }}</td> --}}
                                <td><a href="{{ $valin['Eviden Tambahan Untuk Pelanggan Non Indihome / Dinas'] }}"
                                        target="blank">{{ Str::limit($valin['Eviden Tambahan Untuk Pelanggan Non Indihome / Dinas'], 25) }}
                                    </a></td>
                                {{-- <td>{{ $valin['Approve ASO (OK/NOK)'] }}</td> --}}
                                {{-- <td>{{ $valin['KET ASO'] }}</td> --}}
                                <td>{{ $valin['RAM3'] }}</td>
                                <td>{{ $valin['REKON'] }}</td>
                                <td>{{ $valin['KET'] }}</td>
                                <td style="background-color: {{ fake()->hexColor() }}">Michael</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
