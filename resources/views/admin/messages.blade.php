@if (session()->has('success'))
    <strong>{{session()->get('success')}}</strong>
    @elseif (session()->has('error'))
    <strong>{{session()->get('error')}}</strong>
@endif

