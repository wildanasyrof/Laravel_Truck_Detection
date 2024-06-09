@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Truk Terindikasi OverDimensi</h4>
                        {{-- <p class="card-description">
                Add class <code>.table-bordered</code>
                </p> --}}
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Original
                                        </th>
                                        <th>
                                            Bounding box
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($images as $image)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                <img id="image" src="{{ asset('storage/' . $image->image_ori_path) }}"
                                                    width="400">
                                            </td>
                                            <td>
                                                <img id="image" src="{{ asset('storage/' . $image->image_bb_path) }}"
                                                    width="400">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
