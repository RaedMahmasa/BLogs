@props([
'name',
'value'=>'',
'label'=>false
])
@if ($label)
<lable>{{$label}}</lable>
@endif
<textarea  name="{{$name}}"  {{$attributes->class([
        'form-control',
        'is-invalid'=> $errors->has($name)
        ])}}
>{{ old($name,$value)}}</textarea>

@error($name)
<div class="invalid-feedback">
        {{ $message }}
</div>
@enderror
