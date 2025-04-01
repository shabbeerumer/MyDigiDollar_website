<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Permissions-Policy" content="clipboard-write=(self), clipboard-read=(self)">
    <title>Referral Program - MyDigiDollar</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root {
    --gradient-background: linear-gradient(
        334deg, 
        rgba(35, 49, 174, 0.2), 
        rgba(57, 171, 122, 0.5), 
        rgba(230, 171, 150, 0.5)
    );
}
        body {
            background-image: var(--gradient-background);
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
            font-family: 'Arial', sans-serif;
        }
        .referral-container {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 40px;
            margin-top: 50px;
        }
        .referral-stats {
            background-color: rgba(255,255,255,0.1);
            border-radius: 10px;
            padding: 20px;
            margin-top: 30px;
        }
        .copy-btn {
            background-color: #28a745;
            color: white;
            transition: all 0.3s ease;
        }
        .copy-btn:hover {
            background-color: #218838;
            transform: translateY(-3px);
        }
        .referral-link {
            background-color: rgba(255,255,255,0.2);
            border: 2px dashed rgba(255,255,255,0.5);
            padding: 15px;
            border-radius: 8px;
            word-break: break-all;
        }
    </style>
</head>
<body>
    @extends('layouts.layout')
    @section('content')
        
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="referral-container text-center">
                    <h2 class="mb-4">Referral Program</h2>
                    
                    <div class="alert alert-light" role="alert">
                        <strong>Earn Rewards!</strong> Invite friends and earn $10 for each successful referral.
                    </div>
                    
                    <div class="mb-4">
                        <h4 class="text-white">How It Works:</h4>
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <ol class="text-start text-white">
                                    <li>Share your unique referral link</li>
                                    <li>Friend signs up using your link</li>
                                    <li>Friend subscribes to a package</li>
                                    <li>You earn $10 instantly!</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    
                    <div class="referral-link mb-4">
                        <p id="referralLink"> 
                            {{ url('auth/register?ref_code=' . Auth::user()->referral_code . '&referrer_id=' . Auth::id()) }}
                        </p>
                    </div>
                    
                    {{-- <button id="copyButton" class="btn copy-btn" onclick="copyReferralLink()">
                        <i class="fas fa-copy"></i> Copy Referral Link
                    </button> --}}
                    <button onclick="copyReferralLink()" class="btn copy-btn">
                        <i class="fas fa-copy"></i> Copy Referral Link
                    </button>
                    
                    
                 
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    {{-- <script>
        function copyReferralLink() {
            const referralLink = document.getElementById('referralLink');
            const linkText = referralLink.innerText;
            
            navigator.clipboard.writeText(linkText).then(() => {
                alert('Referral link copied successfully!');
                
                // Optional: Add visual feedback
                referralLink.style.backgroundColor = '#28a745';
                referralLink.style.color = 'white';
                setTimeout(() => {
                    referralLink.style.backgroundColor = 'rgba(255,255,255,0.2)';
                    referralLink.style.color = 'white';
                }, 1000);
            }).catch(err => {
                console.error('Failed to copy: ', err);
                alert('Failed to copy referral link');
            });
        }
    </script> --}}
    <script>
        // First check permissions
        navigator.permissions.query({name: 'clipboard-write'}).then(permissionStatus => {
            if (permissionStatus.state === 'granted') {
                console.log('Clipboard write permission granted');
            } else {
                console.log('Clipboard write permission denied');
            }
        });

        function copyReferralLink() {
            const referralLink = document.getElementById('referralLink');
            const linkText = referralLink.innerText;
            
            try {
                navigator.clipboard.writeText(linkText)
                    .then(() => alert('Copied!'))
                    .catch(fallbackCopyTextMethod);
            } catch (err) {
                fallbackCopyTextMethod();
            }
        }

        function fallbackCopyTextMethod() {
            const textArea = document.createElement("textarea");
            textArea.value = document.getElementById('referralLink').innerText;
            document.body.appendChild(textArea);
            textArea.select();
            
            try {
                document.execCommand('copy');
                alert('Copied using fallback method');
            } catch (err) {
                console.error('Fallback copy failed', err);
                alert('Copy failed');
            }
            
            document.body.removeChild(textArea);
        }
    </script>
    @endsection

</body>
</html>
