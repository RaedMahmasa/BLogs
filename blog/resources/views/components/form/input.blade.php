@props([
'type'=>'text',
'name',
'value'=>'',
'label'=>false
])
@if ($label)
<lable>{{$label}}</lable>
@endif
<input type="{{$type ?? 'text' }}" name="{{$name}}" value="{{ old($name,$value)}}" {{$attributes->class([
        'form-control',
        'is-invalid'=> $errors->has($name)
        ])}}>

@error($name)
<div class="text-danger">{{ $message }}</div>
@enderror
