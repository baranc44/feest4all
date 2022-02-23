@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-orange-300 focus:border-orange-200 focus:ring focus:ring-orange-200 focus:ring-opacity-50 rounded-md shadow-sm']) !!}>
