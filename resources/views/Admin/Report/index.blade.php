@extends('Admin.Layout.app')
@section('title', 'Report Management')
@section('content')

<section class="admin-content">
    <div class="bg-dark">
        <div class="container  m-b-30">
            <div class="row">
                <div class="col-10 text-white p-t-40 p-b-90">
                    <h4 class="">
                        Report Management
                    </h4>
                </div>
            </div>
        </div>
    </div>

    <div class="container  pull-up">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive p-t-10">
                            <table id="example" class="table " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>User Name</th>
                                        <th>Total Question</th>
                                        <th>Total Number Correct Quesiton</th>
                                        <th>Percentage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($reports as $key=>$report)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        @if(!empty($report['user_name']))
                                            <td>{{ ucfirst($report['user_name']['first_name'])  }} {{ $report['user_name']['last_name'] }}</td>
                                        @else
                                            <td></td>
                                        @endif
                                        <td>{{ $report['total_question'] }}</td>
                                        <td>{{ $report['total_correct_quesiton'] }}</td>
                                        <td>{{ $report['percentage'] }} %</td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td>No data Found!</td>
                                        </tr>
                                    @endforelse
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()
