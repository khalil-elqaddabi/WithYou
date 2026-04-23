<x-guest-layout>
    <div style="
        border: 1px solid var(--border);
        background: linear-gradient(180deg, var(--surface), var(--surface-2));
        border-radius: 28px;
        padding: 28px;
        box-shadow: var(--shadow-md);
    ">
        <div style="margin-bottom: 22px;">
            <div style="
                display:inline-flex;
                align-items:center;
                gap:8px;
                border-radius:999px;
                padding:8px 12px;
                font-size:.76rem;
                font-weight:800;
                letter-spacing:.08em;
                text-transform:uppercase;
                color:#93c5fd;
                background: rgba(37,99,235,.14);
                border: 1px solid rgba(59,130,246,.25);
                margin-bottom:14px;
            ">
                <span style="width:8px;height:8px;border-radius:999px;background:var(--blue);display:inline-block;"></span>
                Sign in
            </div>

            <h2 style="
                font-family:'Sora',sans-serif;
                font-size: clamp(1.6rem, 3vw, 2rem);
                line-height:1.15;
                font-weight:800;
                margin-bottom:10px;
            ">
                Welcome back
            </h2>

            <p style="color: var(--muted); line-height: 1.75;">
                Enter your account details to continue your learning experience on WithYou.
            </p>
        </div>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div style="margin-bottom:16px;">
                <label for="email" style="
                    display:block;
                    margin-bottom:8px;
                    font-size:.92rem;
                    font-weight:700;
                    color:var(--text);
                ">
                    Email address
                </label>

                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                    style="
                        width:100%;
                        padding:14px 16px;
                        border-radius:16px;
                        border:1px solid var(--border);
                        background:var(--surface);
                        color:var(--text);
                        outline:none;
                        transition:.2s ease;
                        font-size:.95rem;
                    "
                    onfocus="this.style.borderColor='#60a5fa'"
                    onblur="this.style.borderColor='var(--border)'"
                >

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div style="margin-bottom:16px;">
                <label for="password" style="
                    display:block;
                    margin-bottom:8px;
                    font-size:.92rem;
                    font-weight:700;
                    color:var(--text);
                ">
                    Password
                </label>

                <input id="password" type="password" name="password" required autocomplete="current-password"
                    style="
                        width:100%;
                        padding:14px 16px;
                        border-radius:16px;
                        border:1px solid var(--border);
                        background:var(--surface);
                        color:var(--text);
                        outline:none;
                        transition:.2s ease;
                        font-size:.95rem;
                    "
                    onfocus="this.style.borderColor='#a78bfa'"
                    onblur="this.style.borderColor='var(--border)'"
                >

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div style="
                display:flex;
                align-items:center;
                justify-content:space-between;
                gap:12px;
                flex-wrap:wrap;
                margin-bottom:22px;
            ">
                <label for="remember_me" style="
                    display:inline-flex;
                    align-items:center;
                    gap:10px;
                    font-size:.92rem;
                    color:var(--muted);
                    font-weight:600;
                    cursor:pointer;
                ">
                    <input id="remember_me" type="checkbox" name="remember"
                        style="
                            width:16px;
                            height:16px;
                            accent-color:#2563eb;
                        ">
                    Remember me
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="
                        color:#93c5fd;
                        font-size:.9rem;
                        font-weight:700;
                    ">
                        Forgot password?
                    </a>
                @endif
            </div>

            <button type="submit" style="
                width:100%;
                display:inline-flex;
                align-items:center;
                justify-content:center;
                gap:10px;
                border:none;
                border-radius:16px;
                padding:14px 18px;
                font-size:.96rem;
                font-weight:800;
                color:white;
                cursor:pointer;
                background: linear-gradient(135deg, var(--blue), var(--violet));
                box-shadow: 0 12px 30px rgba(37, 99, 235, 0.22);
                transition:.2s ease;
            "
            onmouseover="this.style.transform='translateY(-1px)'"
            onmouseout="this.style.transform='translateY(0)'"
            >
                Sign in
            </button>

            @if (Route::has('register'))
                <p style="
                    margin-top:18px;
                    text-align:center;
                    color:var(--muted);
                    font-size:.92rem;
                    line-height:1.7;
                ">
                    Don’t have an account?
                    <a href="{{ route('register') }}" style="
                        color:#93c5fd;
                        font-weight:800;
                    ">
                        Create one
                    </a>
                </p>
            @endif
        </form>
    </div>
</x-guest-layout>
