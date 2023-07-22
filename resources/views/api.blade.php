@extends('layouts.main')
@section('content')

    <h1>API</h1>

    <script>

        function getCookie(name) {
            const value = `; ${document.cookie}`;
            console.log('value', value);
            const parts = value.split(`; ${name}=`);
            console.log('parts', parts);
            console.log('patts.length', parts.length)
            if (parts.length === 2) {

                return parts.pop().split(';').shift();
            }
            return parts.split(';').shift();
        }

        function login() {

            //get cookie
            const csrfToken = getCookie('XSRF-TOKEN');
            console.log('csrfToken', csrfToken);
            console.log('csrfToken', decodeURIComponent(csrfToken));


            return fetch('/login', {
                headers: {
                    'content-type': 'application/json',
                    'accept': 'application/json',
                    'X-XSRF-TOKEN': decodeURIComponent(csrfToken)
                },
                credentials: 'include',
                method: 'POST',
                body: JSON.stringify({
                    'email': 'starscy@rambler.ru',
                    'password': 'starscy@rambler.ru'
                })
            })
        }

        fetch('/sanctum/csrf-cookie', {
            headers: {
                'content-type': 'application/json',
                'accept': 'application/json'
            },
            credentials: 'include',
        }).then(() => {
            return login();
        })


    </script>

@endsection
