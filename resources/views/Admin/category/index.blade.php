 @extends('Admin.Layout.app')
@section('title', 'Manage Category')
@section('content')

<section class="admin-content">
    <div class="bg-dark">
        <div class="container  m-b-30">
            <div class="row">
                <div class="col-10 text-white p-t-40 p-b-90">

                    <h4 class="">
                        Manage Category
                    </h4>
                </div>
                <div class="col-2 text-white p-t-40 p-b-90">
                    <a href="{{ url('admin/category/add')}}" class="add_record">Add Category</a>
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
                                        <th>Title</th>
                                        <th>Parent Id</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($parentCategories as $category)
                                    <tr>
                                        <td>{{ $category['id']}}</td>
                                        <td>{{ $category['title']}}</td>
                                        <td>@if($category['parent'] == null ) - @else  {{ $category['parent']['title'] }}  @endif</td>
                                        <td>
                                            <a href="{{ url('/admin/category/edit/'.$category['id']) }}" title="Edit"><i class="fa fa-edit"></i></a>
                                            <a href="{{ url('/admin/category/delete/'.$category['id'])}}" class="del_btn" title="Delete"><i class="fa fa-trash"></i></a>

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
