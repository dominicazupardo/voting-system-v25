<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Online Voting System</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body style="margin: 0; font-family: Arial, sans-serif;">

        <!-- Background and Header Section -->
        <div style="background: linear-gradient(to right, rgba(6, 6, 195, 0.762), rgba(0, 26, 255, 0.3)), url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYCOOhlUfb6E1sldsTgZYz6Jjpbpo1-BRN9A&s');
            background-size: cover; background-position: center; height: 100vh; color: rgb(255, 255, 255); text-align: center; position: relative;">

            <!-- Navigation Bar -->
            <div style="display: flex; justify-content: space-between; padding: 20px 50px; position: absolute; top: 0; width: 100%;">
                <div>
                    <a href="#" style="color: white; text-decoration: none; font-weight: bold; font-size: 18px; margin-right: 20px;">Homepage</a>
                    <a href="#contact" style="color: white; text-decoration: none; font-weight: bold; font-size: 18px; margin-right: 20px;">Contact</a>
                    <a href="#about" style="color: white; text-decoration: none; font-weight: bold; font-size: 18px;">About</a>
                </div>
                <div style="cursor: pointer;">
                    <div style="width: 30px; height: 3px; background: white; margin: 5px;"></div>
                    <div style="width: 30px; height: 3px; background: white; margin: 5px;"></div>
                    <div style="width: 30px; height: 3px; background: white; margin: 5px;"></div>
                </div>
            </div>

            <!-- Main Content -->
            <div style="position: absolute; top: 20%; left: 50%; transform: translate(-50%, -20%);">
                <h1 style="font-size: 16px; letter-spacing: 2px;">COMPUTER COMMUNICATION DEVELOPMENT INSTITUTE - LEGAZPI</h1>
                <p style="margin: 5px 0;">SIKATUNA, OLD ALBAY DISTRICT, LEGAZPI CITY, ALBAY</p>
                <h1 style="font-size: 60px; font-weight: bold; margin: 30px 0;">ONLINE VOTING</h1>
                <p style="font-size: 18px; margin: 20px 0; max-width: 600px;">An Online Election System for CCDIANS. Making election process efficient, transparent, and convenient for all.</p>

                <!-- Get Started Button -->
                <button onclick="showLoginForm()" style="padding: 15px 40px; background: orange; color: white; border: none; border-radius: 5px; font-size: 18px; cursor: pointer;">Get Started</button>
            </div>

            <!-- Powered By Section -->
            <div style="position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%); text-align: center;">
                <p style="font-size: 16px; margin-bottom: 10px;">Powered by:</p>
                <div style="display: flex; justify-content: center; gap: 20px; align-items: center;">
                    <a href="https://web.facebook.com/profile.php?id=61551949402367" target="_blank">
                        <img src="https://scontent.fmnl13-4.fna.fbcdn.net/v/t39.30808-6/458099102_122156784806064980_4437962314495810010_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeEMo6agaYJfA_SPMYxyC0e27kSU1vIAFMzuRJTW8gAUzIa5YMpYvDvfS9xqTKOlyY7wrGM0AtQZM9V5-YBapSzK&_nc_ohc=2fVilWAuC2MQ7kNvgELO-L7&_nc_zt=23&_nc_ht=scontent.fmnl13-4.fna&_nc_gid=AcyMgjnKvSQQTGAxzUADCar&oh=00_AYCUJD9fHbJ8kh9xcR6ZG5HfXfuzYphymw2KUoXfhXEnnw&oe=678BC438" alt="Conexion Logo" style="width: 60px; height: 60px;">
                    </a>
                    <a href="https://web.facebook.com/ccdi.legazpi.2024" target="_blank">
                        <img src="https://scontent.fmnl13-1.fna.fbcdn.net/v/t39.30808-6/243255170_265459408918538_8416479987918411411_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeEitRWmBHjmjH41vtpkdsEu3vgmTtoM8vHe-CZO2gzy8e7u1qV1z0zdJ8wvVeZNu5FNJC1eWQAGfPPORl4JhjYo&_nc_ohc=9BstICA_-8sQ7kNvgFpty9Y&_nc_zt=23&_nc_ht=scontent.fmnl13-1.fna&_nc_gid=AKfD_hIJTlhVZa09tQoH8aV&oh=00_AYC_As_S83dRPBwJnRRq66OEFs4VC9LEWKuLU5O6ncf3lw&oe=678BD477" alt="CCDI Logo" style="width: 60px; height: 60px;">
                    </a>
                    <a href="https://web.facebook.com/profile.php?id=61550942620217" target="_blank">
                        <img src="https://scontent.fmnl13-2.fna.fbcdn.net/v/t39.30808-6/378954738_122108915558031420_5720355415518902872_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeGiCD4vCqVaVa4llyEgSVBTAgOyAj9ep00CA7ICP16nTRotxeyHJzA3jR9KLwyXUcSCyTsvbh5Uyhk19PJyd888&_nc_ohc=i-_uc3X_Qc4Q7kNvgFRGTHY&_nc_zt=23&_nc_ht=scontent.fmnl13-2.fna&_nc_gid=Ay-_8ULnVuPhi2NJ6g8YZY4&oh=00_AYAG9cN-SJYd3_g82cyLVRbUgXZzFBLZlRw7wEZQv_fiaA&oe=678BC2E3" alt="Third Logo" style="width: 60px; height: 60px;">
                    </a>
                </div>
                <p style="margin-top: 20px; font-size: 14px;">est 2024</p>
            </div>
        </div>

        <!-- Login Form -->
        <div id="loginForm" class="overlay">
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <div class="form-container">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <h2>Login</h2>
                    <input id="student_no" type="text" name="student_no" :value="old('student_no')" required autofocus autocomplete="student_no" placeholder="Student ID Number"/>
                    <x-input-error :messages="$errors->get('student_no')" class="mt-2" />
                    <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Password"/>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    <button>Login</button>
                    <p>Don't have an account? <span class="link" onclick="showRegisterForm()">Register here</span></p>
                    <button class="close-btn" onclick="closeForms()">Close</button>
                </form>
            </div>
        </div>

       <!-- Registration Form -->
        <div id="registerForm" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; display: flex; justify-content: center; align-items: center; background-color: rgba(0, 0, 0, 0.7); z-index: 1000;">
            <div class="form-container" style="background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); width: 400px; max-width: 90%;">
                <form action="{{ route('register') }}" method="POST" style="display: flex; flex-direction: column; gap: 5px;">
                    @csrf
                    <h2 style="text-align: center; margin-bottom: 10px; font-family: Arial, sans-serif; font-size: 30px; color: #333;">Student Registration</h2>

                    <!-- Student ID -->
                    <div class="form-group">
                        <input name="student_no" type="text" :value="old('student_no')" required autofocus autocomplete="student_no" placeholder="Student ID Number" 
                            style="width: 100%; padding: 5px; font-size: 14px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; outline: none;" />
                    </div>

                    <!-- Name Fields -->
                    <div class="form-group" style="display: flex; flex-direction: column; gap: 10px;">
                        <input id="firstname" type="text" name="firstname" :value="old('firstname')" required autofocus autocomplete="given-name" placeholder="First Name" 
                            style="width: 100%; padding: 5px; font-size: 14px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; outline: none;" />
                        <input id="middlename" type="text" name="middlename" :value="old('middlename')" autocomplete="additional-name" placeholder="Middle Name" 
                            style="width: 100%; padding: 5px; font-size: 14px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; outline: none;" />
                        <input id="lastname" type="text" name="lastname" :value="old('lastname')" required autocomplete="family-name" placeholder="Last Name" 
                            style="width: 100%; padding: 5px; font-size: 14px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; outline: none;" />
                    </div>

                    <!-- Course -->
                    <div class="form-group">
                        <select id="course" name="course" required autofocus  
                                style="width: 100%; padding: 5px; font-size: 14px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; outline: none; background-color: #fff;">
                            <option value="" disabled selected>Select Course</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->course }}">{{ $course->course }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Mobile No -->
                    <div class="form-group">
                        <input id="mobile_no" type="text" name="mobile_no" :value="old('mobile_no')" required autofocus autocomplete="mobile_no" placeholder="Mobile No" 
                            style="width: 100%; padding: 5px; font-size: 14px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; outline: none;" />
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" placeholder="Email" 
                            style="width: 100%; padding: 5px; font-size: 14px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; outline: none;" />
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <input id="new-password" type="password" name="password" required autocomplete="new-password" placeholder="Password" 
                            style="width: 100%; padding: 5px; font-size: 14px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; outline: none;" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group">
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" 
                            style="width: 100%; padding: 5px; font-size: 14px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; outline: none;" />
                    </div>

                    <!-- Buttons -->
                    <div class="form-buttons" style="display: flex; justify-content: space-between; gap: 10px;">
                        <button type="submit" style="padding: 10px; font-size: 14px; border: none; border-radius: 4px; background-color: #007bff; color: white; cursor: pointer;">Register</button>
                        <button type="button" onclick="closeForms()" style="padding: 10px; font-size: 14px; border: none; border-radius: 4px; background-color: #ccc; color: black; cursor: pointer;">Close</button>
                    </div>
                </form>
            </div>
        </div>


        <!-- About Section -->
        <div id="about" class="section about-section" style="text-align: center; background-color: #f3f4f6; padding: 40px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); max-width: 800px; margin: 20px auto;">
            <h2 style="font-size: 24px; font-weight: 700; color: #1f2937; margin-bottom: 20px;">About the Online Voting System</h2>
            <p style="font-size: 16px; color: #374151; line-height: 1.8; margin-bottom: 20px;">
                The Online Voting System is designed to modernize the election process for schools and communities. This web-based platform ensures secure, efficient, and accessible voting for everyone involved. With real-time results and a user-friendly interface, it eliminates traditional voting challenges like manual errors and paper waste.
            </p>
            <ul style="list-style-type: disc; text-align: left; margin: 0 auto; padding: 0 20px; max-width: 600px; color: #374151;">
                <li style="margin-bottom: 10px;">Streamlined voting process with minimal delays.</li>
                <li style="margin-bottom: 10px;">Enhanced security to prevent fraudulent voting.</li>
                <li style="margin-bottom: 10px;">Eco-friendly approach by reducing paper usage.</li>
                <li style="margin-bottom: 10px;">Easy access for voters from any device with an internet connection.</li>
            </ul>
        </div>

        <!-- Contact Section -->
        <div id="contact" class="bg-gradient-to-b from-blue-50 to-gray-100 py-16 px-6 md:px-20 lg:px-40">
            <h2 class="text-4xl font-extrabold text-blue-800 mb-12 text-center uppercase tracking-wider">Contact Us</h2>

            <div class="grid md:grid-cols-2 gap-12">
                <!-- General Information -->
                <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-2xl transition-shadow duration-300">
                    <h3 class="text-2xl font-semibold text-blue-700 mb-6 border-b pb-2">General Information</h3>
                    <ul class="space-y-4 text-gray-700">
                        <li><strong class="text-blue-800">School:</strong> Computer Communication Development Institute (CCDI) - Legazpi</li>
                        <li><strong class="text-blue-800">Address:</strong> Sikatuna, Old Albay District, Legazpi City, Albay</li>
                        <li><strong class="text-blue-800">School Publication:</strong>
                            <span class="font-medium text-blue-600">Conexión</span> - CCDI's Official School Publication
                        </li>
                        <li><strong class="text-blue-800">Student Council:</strong> CCDI Legazpi - College Student Governing Body</li>
                    </ul>
                </div>

                <!-- Developer Information -->
                <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-2xl transition-shadow duration-300">
                    <h3 class="text-2xl font-semibold text-blue-700 mb-6 border-b pb-2">Developer's Information</h3>
                    <ul class="space-y-4 text-gray-700">
                        <li><strong class="text-blue-800">Developer:</strong>
                            <span class="text-blue-600 font-medium">Dominic L. Azupardo</span>
                            <p class="text-sm text-gray-500">Full-Stack Developer</p>
                        </li>
                        <li><strong class="text-blue-800">Email:</strong>
                            <a href="mailto:dominicazupardo21@gmail.com" class="text-blue-600 hover:underline">dominicazupardo21@gmail.com</a>
                        </li>
                        <li><strong class="text-blue-800">Phone:</strong>
                            <a href="tel:+639123456789" class="text-blue-600 hover:underline">+63 991 402 8625</a>
                        </li>
                        <li><strong class="text-blue-800">Advisor:</strong>
                            <span class="text-blue-600 font-medium">SIR JAY</span>
                        </li>
                        <li><strong class="text-blue-800">Advisor Email:</strong>
                            <a href="mailto:conexion@ccdi.edu.ph" class="text-blue-600 hover:underline">conexion@ccdi.edu.ph</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Social Media Links -->
            <div class="mt-12 text-center">
                <h3 class="text-2xl font-semibold text-blue-700 mb-4 uppercase tracking-wide">Stay Connected</h3>
                <div class="flex justify-center space-x-8">
                    <a href="https://www.facebook.com/CCDI-Legazpi" target="_blank" class="text-blue-600 hover:text-blue-800 transition-colors duration-300">
                        <i class="fab fa-facebook-square text-4xl"></i>
                    </a>
                    <a href="mailto:johndoe@example.com" class="text-blue-600 hover:text-blue-800 transition-colors duration-300">
                        <i class="fas fa-envelope text-4xl"></i>
                    </a>
                    <a href="tel:+639123456789" class="text-blue-600 hover:text-blue-800 transition-colors duration-300">
                        <i class="fas fa-phone-square text-4xl"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Feedback Form Section -->
        <section id="feedback" class="bg-gray-100 py-16">
            <div class="container mx-auto px-6 md:px-12 lg:px-24">
                <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-8">
                    <!-- Form Heading -->
                    <h3 class="text-3xl font-bold text-blue-900 mb-6 text-center">
                        We Value Your Feedback
                    </h3>
                    <p class="text-gray-600 mb-8 text-center">
                        Please let us know how we can improve our services.
                    </p>

                    <!-- Form Start -->
                    <form action="#" method="POST" class="space-y-6">
                        <!-- Name Input -->
                        <div>
                            <label for="name" class="block text-gray-700 font-medium mb-2">Your Name</label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                placeholder="Enter your name"
                                class="w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            />
                        </div>

                        <!-- Email Input -->
                        <div>
                            <label for="email" class="block text-gray-700 font-medium mb-2">Your Email</label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                placeholder="Enter your email"
                                class="w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            />
                        </div>

                        <!-- Feedback Textarea -->
                        <div>
                            <label for="message" class="block text-gray-700 font-medium mb-2">Your Feedback</label>
                            <textarea
                                id="message"
                                name="message"
                                rows="5"
                                placeholder="Write your feedback here"
                                class="w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            ></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button
                                type="submit"
                                class="bg-blue-600 text-white font-semibold py-3 px-6 rounded-md w-full hover:bg-blue-700 transition duration-300"
                            >
                                Submit Feedback
                            </button>
                        </div>
                    </form>
                    <!-- Form End -->
                </div>
            </div>
        </section>
        <script src="{{ asset('js/script.js') }}"></script>
    </body>
</html>
