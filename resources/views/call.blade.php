<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workspace Call</title>
    @vite('resources/js/app.js')

    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            background: #f8fafc;
        }

        #root {
            width: 100vw;
            height: 100vh;
        }

        #debug {
            position: fixed;
            top: 12px;
            left: 12px;
            z-index: 9999;
            background: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 10px 12px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            max-width: 420px;
            white-space: pre-wrap;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }
    </style>
</head>

<body>
    <div id="debug">Loading call...</div>
    <div id="root"></div>
    @if (auth()->user()->role === 'teacher' && isset($workspace))
        <form action="{{ route('teacher.call.end', $workspace->id) }}" method="POST"
            style="position: fixed; top: 16px; right: 16px; z-index: 9999;">
            @csrf
            <button type="submit"
                style="background:#dc2626; color:white; border:none; padding:10px 16px; border-radius:10px; cursor:pointer;">
                End Call
            </button>
        </form>
    @endif
<a href="{{ url()->previous() }}"
   class="inline-flex items-center bg-gray-200 text-gray-700 px-4 py-2 rounded-xl hover:bg-gray-300"
   style="position: fixed; top: 16px; left: 16px; z-index: 9999;">
    ← Back to Room
</a>
    <script>
        window.addEventListener('load', function() {
            const debugBox = document.getElementById('debug');

            function logDebug(message) {
                console.log(message);
                debugBox.textContent += '\n' + message;
            }

            try {
                logDebug('Window loaded');

                const roomID = "{{ $roomID }}";
                const userID = "{{ auth()->id() }}";
                const userName = "{{ auth()->user()->name }}";

                const appID = 493275094;
                const serverSecret = "710f64eb579aa334c327348fbd242676";

                logDebug('roomID: ' + roomID);
                logDebug('userID: ' + userID);
                logDebug('userName: ' + userName);

                if (!window.ZegoUIKitPrebuilt) {
                    throw new Error('ZegoUIKitPrebuilt not loaded');
                }

                logDebug('ZegoUIKitPrebuilt loaded');

                const kitToken = window.ZegoUIKitPrebuilt.generateKitTokenForTest(
                    appID,
                    serverSecret,
                    roomID,
                    userID,
                    userName
                );

                logDebug('Kit token generated');

                const zp = window.ZegoUIKitPrebuilt.create(kitToken);

                logDebug('Zego instance created');

                zp.joinRoom({
                    container: document.getElementById('root'),
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
                debugBox.textContent = 'Error:\n' + error;
            }
        });
    </script>
</body>

</html>
