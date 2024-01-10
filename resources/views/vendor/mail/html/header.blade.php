@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />@else
{{ $slot }}
@endif
</a>
</td>
</tr>
