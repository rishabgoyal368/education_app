@extends('Admin.Layout.app')
@section('title', 'Manage Chapter')
@section('content')

<section class="admin-content">
    <div class="bg-dark">
        <div class="container  m-b-30">
            <div class="row">
                <div class="col-10 text-white p-t-40 p-b-90">

                    <h4 class="">
                        Manage Chapter
                    </h4>
                </div>
                <div class="col-2 text-white p-t-40 p-b-90">
                    <a href="{{ url('admin/chapter/add')}}" class="add_record">Add Chapter</a>
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
                                        <th>Chapter Name</th>
                                        <th>Paper Name</th>
                                        <th>Class Name</th>
                                        <th>subject Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($chapter_list as $key=>$chapters)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ ucfirst($chapters['chapter_name']) }}</td>
                                        <td>{{ ucfirst($chapters['paper']['title']) }}</td>
                                        <td>{{ ucfirst($chapters['class']['title']) }}</td>
                                        <td>{{ ucfirst($chapters['subject']['title']) }}</td>
                                        <td>
                                            <a href="{{ url('/admin/chapter/edit/'.$chapters['id'])}}"  title="Edit"><i class="fa fa-edit"></i></a>
                                            <a href="{{ url('/admin/chapter/delete/'.$chapters['id'])}}" class="del_btn" title="Delete"><i class="fa fa-trash"></i></a>
                                            <a href="{{ url('/admin/chapter/question/'.$chapters['id'])}}"  title="Questions"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
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
