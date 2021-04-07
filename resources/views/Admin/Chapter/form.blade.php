<?php
    if (isset($chapter_details)) {
        $title = 'Edit';
        $action = url('admin/chapter/edit/' . @$chapter_details['id']);
    } else {
        $title = 'Add';
        $action = url('admin/chapter/add');
    }
?>
@extends('Admin.Layout.app')
@section('title', $title.' Chapter')
@section('content')

<section class="admin-content">
    <div class="bg-dark">
        <div class="container  m-b-30">
            <div class="row">
                <div class="col-12 text-white p-t-40 p-b-90">
                    <h4 class=""> {{ $title }} Chapter</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="container  pull-up">
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body ">
                        <form method="post" action="{{ $action }}"  id="add_edit_chapter">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Chapter Name</label>
                                    <input type="text" class="form-control" name="chapter_name" id="chapter_name" placeholder="Chapter Name*" value="{{ @$chapter_details['chapter_name'] }}" >
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Paper</label>
                                    <select name="paper_id" id="paper" class="form-control" >
                                        <option disabled selected>Select</option>
                                        @foreach($paper_list as $papers)
                                            <option value="{{ $papers['id'] }}" <?php if($papers['id'] == @$chapter_details['paper_id']){
                                                echo "selected";
                                            } ?>>{{ $papers['title'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Class</label>
                                    <select name="class_id" id="class" class="form-control" >
                                    @if(@$class_list)
                                        @foreach($class_list as $classes)
                                            <option  value="{{ $classes['id']}}" <?php if(@$classes['id'] == $chapter_details['class_id']){echo "selected";} ?>>{{ $classes['title']}}</option>
                                        @endforeach
                                    @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Subject</label>
                                    <select name="subject_id" id="subject" class="form-control" required>
                                        @if(@$subject_list)
                                            @foreach($subject_list as $subjects)
                                                <option  value="{{ $subjects['id']}}" <?php if(@$subjects['id'] == $chapter_details['subject_id']){echo "selected";} ?>>{{ $subjects['title']}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>             
                            <div class="form-group">
                                <input type="submit" value="Submit" class="btn btn-primary">
                                <a href="{{url('/admin/chapter')}}" class="btn btn-info">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
<script type="text/javascript">
    $('#add_edit_chapter').validate({
        rules: {
            chapter_name: {
                required: true,
                minlength: 2,
                maxlength: 100,
            },
            paper_id:{
                required:true,
            },
            class_id:{
                required:true,
            },
            subject_id:{
                required:true,
            },
        },
    });
</script>
<script type="text/javascript">
    $(document).on('change','#paper',function(){
        var paper_id = $(this).val();
        $.ajax({
            type:'post',
            url:"{{ url('admin/paper-change')}}",
            data:{paper_id:paper_id,'_token':"{{ csrf_token() }}"},
            success:function(resp){
                if(resp.status == 'true'){
                    $('#class').html(resp.html);
                }
            }
        })

    });
</script>
<script type="text/javascript">
    $(document).on('change','#class',function(){
        var class_id = $(this).val();
        $.ajax({
            type:'post',
            url:"{{ url('admin/class-change')}}",
            data:{class_id:class_id,'_token':"{{ csrf_token() }}"},
            success:function(resp){
                if(resp.status == 'true'){
                    $('#subject').html(resp.html);
                }
            }
        })

    });
</script>
@endsection