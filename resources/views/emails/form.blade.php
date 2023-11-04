<x-mail::message>
# Introduction

{{$message}}

The body of your message.

<x-mail::button :url="$url">
HOME
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
