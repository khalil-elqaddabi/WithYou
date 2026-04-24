<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workspace Call</title>
    @vite('resources/js/app.js')

    <style>
        :root {
            --bg: #f3f6fb;
            --surface: rgba(255, 255, 255, 0.92);
            --surface-strong: #ffffff;
            --border: #e5e7eb;
            --text: #0f172a;
            --text2: #64748b;
            --blue: #2563eb;
            --blue-dark: #1d4ed8;
            --red: #dc2626;
            --red-dark: #b91c1c;
            --shadow: 0 18px 45px rgba(15, 23, 42, 0.10);
        }

        * {
            box-sizing: border-box;
        }

        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background:
                radial-gradient(circle at top left, rgba(37, 99, 235, 0.10), transparent 28%),
                radial-gradient(circle at top right, rgba(124, 58, 237, 0.10), transparent 24%),
                linear-gradient(180deg, #f8fbff 0%, #eef3f9 100%);
            color: var(--text);
            overflow: hidden;
        }

        #root {
            width: 100vw;
            height: 100vh;
            padding: 88px 20px 20px;
        }

        .topbar {
            position: fixed;
            inset: 16px 16px auto 16px;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 12px 14px;
            border: 1px solid rgba(255,255,255,0.7);
            border-radius: 20px;
            background: rgba(255,255,255,0.72);
            backdrop-filter: blur(14px);
            box-shadow: var(--shadow);
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 0;
        }

        .call-badge {
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--blue), #7c3aed);
            color: white;
            box-shadow: 0 10px 24px rgba(37, 99, 235, 0.25);
            font-size: 18px;
            font-weight: 800;
        }

        .topbar-text {
            min-width: 0;
        }

        .topbar-title {
            margin: 0;
            font-size: 16px;
            font-weight: 800;
            color: var(--text);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .topbar-subtitle {
            margin: 4px 0 0;
            font-size: 13px;
            color: var(--text2);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            height: 42px;
            padding: 0 16px;
            border-radius: 12px;
            border: 1px solid var(--border);
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s ease;
            white-space: nowrap;
        }

        .action-btn:hover {
            transform: translateY(-1px);
        }

        .action-btn.back {
            background: var(--surface-strong);
            color: var(--text);
        }

        .action-btn.back:hover {
            border-color: #cbd5e1;
        }

        .action-btn.end {
            background: var(--red);
            color: white;
            border-color: var(--red);
        }

        .action-btn.end:hover {
            background: var(--red-dark);
            border-color: var(--red-dark);
        }

        .call-frame {
            width: 100%;
            height: 100%;
            border-radius: 26px;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,0.7);
            background: rgba(255,255,255,0.55);
            backdrop-filter: blur(12px);
            box-shadow: 0 24px 70px rgba(15, 23, 42, 0.12);
        }

        @media (max-width: 768px) {
            #root {
                padding: 120px 12px 12px;
            }

            .topbar {
                inset: 12px 12px auto 12px;
                align-items: flex-start;
                flex-direction: column;
            }

            .topbar-actions {
                width: 100%;
            }

            .action-btn {
                flex: 1;
            }
        }
    </style>
</head>
<body>

    <div class="topbar">
        <div class="topbar-left">
            <div class="call-badge">📹</div>
            <div class="topbar-text">
                <p class="topbar-title">
                    {{ $workspace->name ?? 'Workspace' }} Call
                </p>
                <p class="topbar-subtitle">
                    {{ auth()->user()->name }} • Live session
                </p>
            </div>
        </div>

        <div class="topbar-actions">
            <a href="{{ url()->previous() }}" class="action-btn back">
                ← Back to Room
            </a>

            @if (auth()->user()->role === 'teacher' && isset($workspace))
                <form action="{{ route('teacher.call.end', $workspace->id) }}" method="POST" style="margin:0;">
                    @csrf
                    <button type="submit" class="action-btn end">
                        End Call
                    </button>
                </form>
            @endif
        </div>
    </div>

    <div id="root">
        <div class="call-frame" id="call-frame"></div>
    </div>

    <script>
        window.addEventListener('load', function() {
            function logDebug(message) {
                console.log(message);
            }

            try {
                logDebug('Window loaded');

                const roomID = "{{ $roomID }}";
                const userID = "{{ auth()->id() }}";
                const userName = "{{ auth()->user()->name }}";

                const appID = 493275094;
                const serverSecret = "710f64eb579aa334c327348fbd242676";

                if (!window.ZegoUIKitPrebuilt) {
                    throw new Error('ZegoUIKitPrebuilt not loaded');
                }

                const kitToken = window.ZegoUIKitPrebuilt.generateKitTokenForTest(
                    appID,
                    serverSecret,
                    roomID,
                    userID,
                    userName
                );

                const zp = window.ZegoUIKitPrebuilt.create(kitToken);

                zp.joinRoom({
                    container: document.getElementById('call-frame'),
                    sharedLinks: [{
                        name: 'Join Call',
                        url: window.location.href
                    }],
                    scenario: {
                        mode: window.ZegoUIKitPrebuilt.VideoConference,
                    },
                });

                logDebug('joinRoom called');
            } catch (error) {
                console.error(error);
                alert('Error loading call. Check console for details.');
            }
        });
    </script>
</body>
</html>
