@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid mt-xxl-5 mt-2">
        <div class="row justify-content-center mb-3 mx-3">
            <div class="col-12 d-flex justify-content-center">
                <h1 class="py-1 px-5 bg-dark-1 text-light rounded-3 fw-light border border-light">Rekon
                    {{ $rekon }}
                </h1>
            </div>
            <div class="row justify-content-center border-0 rounded-2 mt-3" id="tabelRekon">
                <div>
                    <table class="table table-dark text-nowrap table-hover text-center">
                        <thead class="fixed-header">
                            <tr>
                                <th scope="col" class="bg-danger-2 align-middle">#</th>
                                @foreach ($headers as $header)
                                    <th scope="col" class="bg-danger-2 align-middle">{{ $header }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($valins as $index => $valin)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $valin['TIMESTAMP'] }}</td>
                                    <td>{{ $valin['WITEL'] }}</td>
                                    <td>{{ $valin['ID VALINS'] }}</td>
                                    <td><a href="../../../storage/{{ $valin['Upload Eviden Web Valins'] }}"
                                            target="blank">{{ Str::limit($valin['Upload Eviden Web Valins'], 25) }}</a>
                                    </td>
                                    <td><a href="../../../storage/{{ $valin['Tambahan Eviden Web Valins'] }}"
                                            target="blank">{{ Str::limit($valin['Tambahan Eviden Web Valins'], 25) }}</a>
                                    </td>
                                    <td><a href="../../../storage/{{ $valin['Eviden Tambahan Untuk Pelanggan Non Indihome / Dinas'] }}"
                                            target="blank">{{ Str::limit($valin['Eviden Tambahan Untuk Pelanggan Non Indihome / Dinas'], 25) }}
                                        </a></td>
                                    <td>{{ $valin['RAM3'] }}</td>
                                    <td>{{ $valin['REKON'] }}</td>
                                    <td>{{ $valin['KET'] }}</td>
                                    @foreach ($users as $user)
                                        @if ($user->name == $valin['Eksekutor'])
                                            <td style="background-color: {{ $user->warna }}">{{ $valin['Eksekutor'] }}
                                            </td>
                                        @endif
                                    @endforeach
                                    @if ($valin['Eksekutor'] == '')
                                        <td>-</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
