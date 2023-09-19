@extends('admin.includes.main')
@section('content')
<section class="content">
    <div class="col-md-12">
        <div class="card">

            <div class="card-body p-0">

                <table class="table table-striped projects" id="myTable">
                    <thead>
                        <tr>
                            <th> # </th>
                            {{-- <th>Image</th> --}}
                            <th> Email </th>
                            <th>Subscribed at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($subscribers)>0)
                            @foreach ($subscribers as $subscriber)
                            <tr>
                                <td> {{$loop->iteration}} </td>
                                <td> {{$subscriber->email}} </td>
                                <td>{{ $subscriber->created_at }}</td>
                            </tr>

                            @endforeach
                        @else
                            <tr><td colspan="6"><i class="fa fa-exclamation-triangle"></i> {!! trans('No Data Found') !!}</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</section>
@endsection
