<div class="form-group">
    <label for="parent_id">Select Category Level</label>
    <select name="parent_id" id="parent_id" class="form-control" style="color: #161515;">
        <option value="0" @if(isset($category['parent_id']) && $category['parent_id'] == 0) selected="" @endif>Main Category</option>
        @if(!empty($getCategories))
            @foreach($getCategories as $parent_category)
                <option value="{{$parent_category['id']}}" @if(isset($category['parent_id']) && $category['parent_id'] == $parent_category['id']) selected="" @endif>{{$parent_category['category_name']}}</option>
                @if(!empty($parent_category['sub_categories']))
                    @foreach($parent_category['sub_categories'] as $sub_category)
                        <option value="{{$sub_category['id']}}" @if(isset($sub_category['parent_id']) && $sub_category['parent_id'] == $sub_category['id']) selected="" @endif>&nbsp;&raquo;&nbsp;{{$sub_category['category_name']}}</option>
                    @endforeach
                @endif
            @endforeach
        @endif
    </select>
</div>