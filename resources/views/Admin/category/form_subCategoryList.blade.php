
@foreach($subcategories as $subcategory)
            <option value="{{ $subcategory->title }}" datalevel="{{$dataLevel + 1}}">{{$dataLevel + 1}}  {{$subcategory->title}}</option>
	    @if(count($subcategory->subcategory))
            @include('Admin.category.form_subCategoryList',['subcategories' => $subcategory->subcategory, 'dataLevel' => $dataLevel +1])
        @endif

@endforeach
