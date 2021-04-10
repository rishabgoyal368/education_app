@extends('Admin.Layout.app')
@section('title', 'Subscription Packages')
@section('content')

<section class="admin-content">
    <div class="bg-dark">
        <div class="container  m-b-30">
            <div class="row">
                <div class="col-10 text-white p-t-40 p-b-90">
                    <h4 class="">
                        Subscription Packages
                    </h4>
                </div>
                <div class="col-2 text-white p-t-40 p-b-90">
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
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($subscription_list as $value)
                                    <tr>
                                        <td>{{ucfirst($value['title'])}}</td>
                                        <td>{{ucfirst($value['description'])}}</td>
                                        <td>
                                            <a href="{{ url('/admin/subscription-list/edit/'.$value['id']) }}" title="Edit"><i class="fa fa-edit"></i></a>
                                        </td>
                                        
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
