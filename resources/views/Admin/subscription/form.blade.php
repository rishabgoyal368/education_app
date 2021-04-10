<?php
if (isset($subscription_details)) {
    $title = 'Edit';
    $action = url('admin/subscription-list/edit/' . $subscription_details['id']);
} else {
    $title = 'Add';
    $action = url('admin/subscription-list/add');
}
?>
@extends('Admin.Layout.app')
@section('title', $title.' '.$label)
@section('content')

<section class="admin-content">
    <div class="bg-dark">
        <div class="container  m-b-30">
            <div class="row">
                <div class="col-12 text-white p-t-40 p-b-90">

                    <h4 class=""> {{ $title }} {{$label}}</h4>

                </div>
            </div>
        </div>
    </div>

    <div class="container  pull-up">
        <div class="row">
            <div class="col-lg-12">

                <!--widget card begin-->
                <div class="card m-b-30">
                    <div class="card-body ">
                        <form action="{{ $action }}" method="post" id="category_form" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ @$subscription_details['title'] }}" placeholder="Title">
                                </div>
                            </div>
                             <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Decription</label>
                                    <textarea  class="form-control" name="description" placeholder="Decription">{{ @$subscription_details['description'] }}</textarea>
                                </div>
                            </div>
                             <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Price</label>
                                    <input type="text" class="form-control" name="price" value="{{ @$subscription_details['price'] }}" placeholder="Price">
                                </div>
                            </div>
                             <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Image</label>
                                    @if(@$subscription_details['image'])
                                        <input type="file"  name="image" accept="image/*">
                                        {{ @$subscription_details['image'] }}
                                    @else
                                        <input type="file"  name="image" accept="image/*" required>
                                    @endif
                                </div>
                            </div>
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="subscription_id" value="{{ @$subscription_details['id'] }}" id="subscription_id">
                                <input type="submit" value="Submit" class="btn btn-primary">
                                <a href="{{'/admin/subscription-list'}}" class="btn btn-info">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
<script type="text/javascript">
    $('#category_form').validate({
        rules: {
            title: {
                required: true,
                minlength: 2,
                maxlength: 30,
                remote:{
                        url:"{{url('/admin/subscription-list/validate/name')}}",
                        data:{
                            subscription_id:function(){
                                return $('#subscription_id').val();
                            },
                    },
                },
            },
            price: {
                required: true,
                number:true
            }, 
            description: {
                required: true,
                minlength: 5,
                maxlength: 1000,
            },
        },
        messages:{
            title:{
                remote:"This Title is already Exists",
            },
        },
    });
</script>
@endsection