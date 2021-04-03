@extends('Admin.Layout.app')
@section('title', 'Add Category')
@section('content')

<section class="admin-content">
    <div class="bg-dark">
        <div class="container  m-b-30">
            <div class="row">
                <div class="col-12 text-white p-t-40 p-b-90">

                    <h4 class=""> Add Category</h4>

                </div>
            </div>
        </div>
    </div>
    <div class="container  pull-up">
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body ">
                        <form method="post" id="add_edit_category">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Title</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Title*" required value="">
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Category</label>
                                   <select name="category" class="form-control js-select2" id="">     <option selected disabled>Select</option>
                                        @foreach ($parentCategories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @if (count($category->childs) > 0)
                                                @include('Admin.category.subcategories', ['subcategories' => $category->childs, 'parent' => $category->title])
                                            @endif

                                        @endforeach
                                    </select>

                         
                                 </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Submit" class="btn btn-primary">
                                <a href="{{url('/admin/category')}}" class="btn btn-info">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
<script type="text/javascript">
    $('#add_edit_category').validate({
        ignore: [],
        rules: {
            title: {
                required: true,
                minlength: 2,
                maxlength: 30,
            }
        },
    });
</script>
@endsection