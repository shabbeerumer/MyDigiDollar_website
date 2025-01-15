<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Account - MyDigiDollar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
        }

        body {
            background-image: linear-gradient(334deg, rgba(35, 49, 174, 0.2), rgba(57, 171, 122, 0.5), rgba(230, 171, 150, 0.5));
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
        }

        .account-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
        }

        .profile-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .profile-image {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .nav-pills .nav-link {
            color: #666;
            padding: 12px 25px;
            border-radius: 10px;
            margin: 5px;
            transition: all 0.3s ease;
        }

        .nav-pills .nav-link.active {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }

        .form-control {
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .btn-update {
            background: var(--primary-color);
            color: white;
            padding: 12px 30px;
            border-radius: 8px;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-update:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }

        .section-title {
            color: var(--primary-color);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--primary-color);
        }

        .form-section {
            background: white;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>
    @extends('layouts.layout')
    @section('content')
        
    <div class="account-container">
        <div class="row">
            <!-- Profile Sidebar -->
            <div class="col-md-4">
                <div class="profile-card text-center">
                    <img src="profile-photo.jpg" alt="Profile Photo" class="profile-image">
                    <h4 class="mt-3">{{Auth::user()->name}}</h4>
                    <p class="text-muted">Member since Jan 2024</p>
                    <a href="userpage.html" class="btn btn-outline-primary mt-3">View Profile</a>
                </div>

                <div class="nav flex-column nav-pills">
                    <a class="nav-link active" href="#general" data-bs-toggle="pill">Account</a>
                    <a class="nav-link" href="#password" data-bs-toggle="pill">Change Password</a>
                    <a class="nav-link" href="#privacy" data-bs-toggle="pill">Privacy</a>
                    <a class="nav-link" href="#delete" data-bs-toggle="pill">Delete Account</a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-8">
                <div class="tab-content">
                    <!-- General Tab -->
                    <div class="tab-pane fade show active" id="general">
                        <div class="form-section">
                            <h3 class="section-title">Account Information</h3>
                            <form id="accountForm">
                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->name}}" disabled>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">First Name</label>
                                            <input type="text" class="form-control" name="first_name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control" name="last_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" class="form-control" value="{{Auth::user()->email}}">
                                </div>
                                <button type="submit" class="btn btn-update">Update Account</button>
                            </form>
                        </div>
                    </div>

                    <!-- Password Tab -->
                    <div class="tab-pane fade" id="password">
                        <div class="form-section">
                            <h3 class="section-title">Change Password</h3>
                            <form id="passwordForm">
                                <div class="mb-3">
                                    <label class="form-label">Current Password</label>
                                    <input type="password" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">New Password</label>
                                    <input type="password" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Confirm New Password</label>
                                    <input type="password" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-update">Update Password</button>
                            </form>
                        </div>
                    </div>

                    <!-- Privacy Tab -->
                    <div class="tab-pane fade" id="privacy">
                        <div class="form-section">
                            <h3 class="section-title">Privacy Settings</h3>
                            <form id="privacyForm">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="hideProfile">
                                        <label class="form-check-label" for="hideProfile">
                                            Hide my profile from directory
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="showLogin">
                                        <label class="form-check-label" for="showLogin">
                                            Show my last login
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-update">Update Privacy</button>
                            </form>
                        </div>
                    </div>

                    <!-- Delete Account Tab -->
                    <div class="tab-pane fade" id="delete">
                        <div class="form-section">
                            <h3 class="section-title">Delete Account</h3>
                            <p class="text-danger">Warning: This action cannot be undone.</p>
                            <form id="deleteForm">
                                <div class="mb-3">
                                    <label class="form-label">Enter your password to confirm</label>
                                    <input type="password" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-danger">Delete Account</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Form submission handlers
        document.getElementById('accountForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Add account update logic here
            alert('Account updated successfully!');
        });

        document.getElementById('passwordForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Add password change logic here
            alert('Password updated successfully!');
        });

        document.getElementById('privacyForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Add privacy settings update logic here
            alert('Privacy settings updated successfully!');
        });

        document.getElementById('deleteForm').addEventListener('submit', function(e) {
            e.preventDefault();
            if(confirm('Are you sure you want to delete your account? This action cannot be undone.')) {
                // Add account deletion logic here
                alert('Account deleted successfully!');
            }
        });
    </script>
        @endsection

</body>
</html>
