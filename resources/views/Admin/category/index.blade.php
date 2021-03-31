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
                    <a href="#" class="add_record">Add Category</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        @foreach($parentCategories as $category)
                            <ul>
                                <li>{{$category->title}}</li>
                                @if(count($category->subcategory))
                                     @include('Admin.category.subCategoryList',['subcategories' => $category->subcategory])
                                @endif 
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection()
