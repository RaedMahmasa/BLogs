<div class="form-group">
    <x-form.input name="name" type="text" :value="$category->name" label="Category Name" />
</div>
<div class="form-group">
    <x-form.input name="image" type="file" label="Image" />
    <img src="{{ $category->getFirstMediaUrl('category_image') }}" alt="" height="50">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Save</button>
</div>
