<x-mail::message>
    # New Message from {{ $lead['name'] }}

    Message:
    {{ $lead['message'] }}



    Thanks,
    {{ config('app.name') }}
</x-mail::message>
