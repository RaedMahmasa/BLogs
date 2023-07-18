<div class="form-group">
    <x-form.input name="title" type="text" label="Title" :value="$blog->title" />
</div>


<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <label>Date:</label>
            <x-form.input class="form-control" name="posting_time" :value="$blog->posting_time" type="datetime-local" />
        </div>

    </div>
</div>

<div class="form-group">
    <x-form.textarea name="description" type="text" label="Description" :value="$blog->description" />
</div>

<div class="from-group">
    <lable>Tags</lable>
    <select class="form-control " id="tags" name="tags[]" multiple="multiple">
        @foreach ($tags as $tag)
        <option @selected(in_array( $tag->id ,$blog->tags->pluck('id')->toArray())) value="{{$tag->id}}">{{$tag->name}}</option>
        @endforeach
    </select>
    @error('tags')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="from-group">
    <lable>Category</lable>

    <select class="form-control " name="category_id">
        @foreach ($categories as $category)
        <option @selected($blog->category?->id == $category->id) value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
</div>


<div class="form-group">
    <x-form.input name="image" type="file" label="Image" />
    <img src="{{ $blog->getFirstMediaUrl('blog_image') }}" alt="" height="60">
</div>


<div class="form-group">
    <button type="submit" class="btn btn-primary">Save</button>
</div>
@push('styles')


<!-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet"> -->

<!-- select2 -->
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />

<!-- tagify -->
<!-- <link href="{{ asset('css/tagify.css') }}" rel="stylesheet" type="text/css" /> -->

@endpush
@push('scripts')

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->

<!-- Include Moment.js CDN -->
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script> -->

<!-- Include Bootstrap DateTimePicker CDN -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script> -->

<!-- <script>
    $('#datetime').datetimepicker({
        format: 'hh:mm:ss a'
    });
</script> -->


<!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> -->
<!-- <script>
    $(function() {
        $("#datepicker").datepicker();
    });
</script> -->

<!-- select2 -->

<script src="{{ asset('js/select2.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#tags').select2({
            placeholder: "Select a Tags",
            allowClear: true
        });
    });
</script>

<!-- tagify -->

<!-- <script src="{{ asset('js/tagify.min.js') }}"></script>
<script src="{{ asset('js/tagify.polyfills.min.js') }}"></script>
<script>
    var inputElm = document.querySelector('[name=tags]'),
        tagify = new Tagify(inputElm);
</script> -->
@endpush
