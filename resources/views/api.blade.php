@extends('layouts.main')
@section('content')

    <h1>API</h1>

    <script>

        function getCookie(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) {

                return parts.pop().split(';').shift();
            }
            return parts.split(';').shift();
        }

        function request(url, options){
            //get cookie
            const csrfToken = getCookie('XSRF-TOKEN');

            return fetch(url, {
                headers: {
                    'content-type': 'application/json',
                    'accept': 'application/json',
                    'X-XSRF-TOKEN': decodeURIComponent(csrfToken)
                },
                credentials: 'include',
                ...options
            })

        }

        function logout(){
            return request('/logout', {
                method: 'POST'
            })
        }

        function login() {
            return request('/login', {
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
        })
            .then(()=> {
                return logout();
            })
            .then(() => {
            return login();
        })


    </script>

@endsection
