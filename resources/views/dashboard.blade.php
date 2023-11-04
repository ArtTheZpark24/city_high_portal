@include('partials.header')
</head>
<body>
    <h1>Hello user</h1>
    <form action="{{route('logout') }}" method="POST">
        @csrf
    <button type="submit">Log out</button>
    </form>
</body>
</html>