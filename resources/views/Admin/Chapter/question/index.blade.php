 @extends('Admin.Layout.app')
@section('title', ucfirst($question_list['chapter_name']))
@section('content')
<style type="text/css">
    .set-question-ui{
        border: 22px solid;
        padding: 18px;  
    }
    .edit-delete-btn-setting{
        float: right;
    }
</style>
<section class="admin-content">
    <div class="bg-dark">
        <div class="container  m-b-30">
            <div class="row">
                <div class="col-10 text-white p-t-40 p-b-90">

                    <h4 class="">
                        Chapter Name : {{ ucfirst($question_list['chapter_name']) }} 
                    </h4>
                </div>
                <div class="col-2 text-white p-t-40 p-b-90">
                    <a href="{{ url('admin/chapter/question/add/'.$chapter_id)}}" class="add_record">Add question</a>
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
                            @if(count($question_list['questions_list'])>0)
                            @foreach($question_list['questions_list'] as $key=>$questions)
                                <div class="form-row set-question-ui">
                                    <div class="form-group col-md-12">
                                        <h5>
                                            <label for="inputEmail4">Question {{ $key+1}} . </label>
                                            {{ ucfirst($questions['question']) }}</h5>
                                    </div>
                                   
                                    <div class="form-group col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h6>
                                                    <label for="inputEmail4"> 1) </label>
                                                    {{ ucfirst($questions['option_1']) }}
                                                </h6>
                                            </div>
                                            <div class="col-sm-4">
                                                <h6>
                                                    <label for="inputEmail4"> 2) </label>
                                                    {{ ucfirst($questions['option_2']) }}
                                                </h6>
                                            </div>    
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h6>
                                                    <label for="inputEmail4"> 3) </label>
                                                    {{ ucfirst($questions['option_3']) }}
                                                </h6>
                                            </div>
                                            <div class="col-sm-4">
                                                <h6>
                                                    <label for="inputEmail4"> 4) </label>
                                                    {{ ucfirst($questions['option_4']) }}
                                                </h6>
                                            </div>    
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <?php 
                                            if($questions['correct_option'] == 'option_1'){
                                                $correct_opt = '1) '. ucfirst($questions['option_1']);
                                            }elseif($questions['correct_option'] == 'option_2'){
                                                $correct_opt = '2) '. ucfirst($questions['option_2']);
                                            }elseif($questions['correct_option'] == 'option_3'){
                                                $correct_opt = '3) '. ucfirst($questions['option_3']);
                                            }elseif($questions['correct_option'] == 'option_4'){
                                                $correct_opt = '4) '. ucfirst($questions['option_4']);
                                            }
                                        ?>

                                            <div class="faq_container">
                                                <div class="faq">
                                                    <div class="">
                                                        <div class="faq_answer">
                                                            <div class="row">
                                                                <div class="col-sm-12" style="padding: 25px;">
                                                                    <span class="show_ans" ><h4>Answer</h4>
                                                                        <div class="ful_ansr" style="border-left: 5px solid ">
                                                                            <span class="" style="margin-left: 15px;">{{ $correct_opt }}</span>
                                                                        </div>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>        
                                                </div>
                                                <div class="faq_question">
                                                    <buton type="button" class="btn btn-primary show_que view_ans" >Show Answer</buton>
                                                </div>
                                            </div>
                                            <div class="edit-delete-btn-setting">
                                                <a href="{{ url('admin/chapter/question/edit/'.$questions['id'])}}?chapter_id={{ $chapter_id }}" title="Edit Question"><i class="fa fa-edit"></i></a>
                                                <a href="{{ url('admin/chapter/question/delete/'.$questions['id'])}}" class="del_btn" title="Delete Question"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </h5>
                                    </div>
                                </div>   
                            @endforeach
                            @else
                            <h3>No Question Found.</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function() {
        $('.faq').hide();
        $('.view_ans').on('click',function(){
            var ths =$(this);
            var text =$(this).text(); 
            if(text == 'Show Answer'){
                ths.text('Hide Answer');
                ths.closest('.faq_container').find('.faq').slideDown('slow');
            }else{
                ths.closest('.faq_container').find('.faq').slideUp('slow');
                ths.text('Show Answer');
            }
        })
    });
</script>
@endsection()
