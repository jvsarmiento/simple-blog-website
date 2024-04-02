<div class="container">
    <div class="row ">
        <div class="col-12 col-md-4">
            <div class="p-3">
                <h3 class="text-warning">{{ config('app.name', 'Simple Blog Website') }}</h3>
                <p>
                    This simple blog website is for technical exam purposes only. All features and fuctionalities of this blog website are requirements of the employer. Thank you!
                </p>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="p-3">
                <h3>Quick Links</h3>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('blogs.index') }}">Blogs</a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}">Login</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="p-3">
                <h3>Applicant Details</h3>
                <ul>
                    <li><span class="fw-bold">Name:</span> Jefferson V. Sarmiento</li>
                    <li><span class="fw-bold">Email:</span> jvsarmiento.job@gmail.com</li>
                    <li><span class="fw-bold">Contact No.:</span> +63 998 417 8703</li>
                    <li><span class="fw-bold">Applied Position:</span> Web Developer</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-dark py-3 text-center text-white">
    Copyright &copy; <?= date('Y') ?>. All Rights Reserved.
</div>
