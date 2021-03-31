
@foreach($subcategories as $subcategory)
        <ul>
            <li>{{$subcategory->title}}</li> 
	    @if(count($subcategory->subcategory))
            @include('Admin.category.subCategoryList',['subcategories' => $subcategory->subcategory])
        @endif
        </ul> 
@endforeach
