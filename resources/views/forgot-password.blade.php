@extends("layouts.layout")
@section("content")
    <main>
            <div>
                @if ($errors->any())
                    <div>
                        @foreach($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    </div>
                @endif

                @if (session()->has('error'))
                    <div>{{session('error')}}</div>
                @endif

                @if (session()->has('success'))
                    <div>{{session('success')}}</div>
                @endif
            </div>
        </div>
            <p>Glemt Passord? Vi skal sende en link til din email, bruk linken til å bytte passord</p>
            <form action="/forgot-password.post" method="POST">
                @csrf
                <input type="text" name="login_email" placeholder="Email">
                <button type="submit">Send</button>
            </form>
        </div>
    </main>
@endsection