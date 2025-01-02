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
        <div style="background: linear-gradient(to right, rgba(6, 6, 195, 0.762), rgba(0, 26, 255, 0.3)), url('https://scontent.fmnl8-4.fna.fbcdn.net/v/t39.30808-6/468527189_544181965097454_8024350015574709989_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=cc71e4&_nc_eui2=AeEkPULJsFpb32fznDQHKyUsSiphzcSX-utKKmHNxJf668J-OhSv5qqtHebHHcpDF9HMFPsB4R-3js_AC9e4-_T9&_nc_ohc=5s4AMRgkI24Q7kNvgH6v2nd&_nc_zt=23&_nc_ht=scontent.fmnl8-4.fna&_nc_gid=ASAZxgfLz6WkAIo_OlVPLw5&oh=00_AYBf62z8ksfP8GuzKCQgi1W7Cdy11YalB3KbY9iZTmJPBQ&oe=676199C4');
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
                        <img src="https://scontent.fmnl13-4.fna.fbcdn.net/v/t39.30808-6/458099102_122156784806064980_4437962314495810010_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeEMo6agaYJfA_SPMYxyC0e27kSU1vIAFMzuRJTW8gAUzIa5YMpYvDvfS9xqTKOlyY7wrGM0AtQZM9V5-YBapSzK&_nc_ohc=xkUtSUx7JqMQ7kNvgHWX867&_nc_zt=23&_nc_ht=scontent.fmnl13-4.fna&_nc_gid=A5awhxHHDBbfqw-FCcZg-Nk&oh=00_AYBj0Jgm9ffkaK-ro46wA50V8HnRoqys7SA8u54zKF0QlQ&oe=675DD7F8" alt="Conexion Logo" style="width: 60px; height: 60px;">
                    </a>
                    <a href="https://web.facebook.com/ccdi.legazpi.2024" target="_blank">
                        <img src="https://scontent.fmnl13-1.fna.fbcdn.net/v/t39.30808-6/243255170_265459408918538_8416479987918411411_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeEitRWmBHjmjH41vtpkdsEu3vgmTtoM8vHe-CZO2gzy8e7u1qV1z0zdJ8wvVeZNu5FNJC1eWQAGfPPORl4JhjYo&_nc_ohc=HfBSo-7iP6cQ7kNvgHYsId8&_nc_zt=23&_nc_ht=scontent.fmnl13-1.fna&_nc_gid=AgFzeeO4iFH1yRL2c4v1Aug&oh=00_AYAcwmmZEIpRcDZZJFJEYhbke4KgDykgKzF3pjo0IJ_2fA&oe=675DAFF7" alt="CCDI Logo" style="width: 60px; height: 60px;">
                    </a>
                    <a href="https://web.facebook.com/profile.php?id=61550942620217" target="_blank">
                        <img src="https://scontent.fmnl13-2.fna.fbcdn.net/v/t39.30808-6/378954738_122108915558031420_5720355415518902872_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeGiCD4vCqVaVa4llyEgSVBTAgOyAj9ep00CA7ICP16nTRotxeyHJzA3jR9KLwyXUcSCyTsvbh5Uyhk19PJyd888&_nc_ohc=zN-U0mXU1EgQ7kNvgH_CH8n&_nc_zt=23&_nc_ht=scontent.fmnl13-2.fna&_nc_gid=A3O8XkEvSnBMGS7iwtk4T7C&oh=00_AYA14aybBQMBk0F9iX0eThTHkzEN3_ERjfu9ud7LlEODtg&oe=675DD6A3" alt="Third Logo" style="width: 60px; height: 60px;">
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
        <div id="registerForm" class="overlay">
            <div class="form-container">
                <form action="{{ route('register') }}" method="POST">
                @csrf
                    <h2>Register</h2>
                    <input name="student_no" type="text"  :value="old('student_no')" required autofocus autocomplete="student_no" placeholder="Student ID Number">
                    <x-input-error :messages="$errors->get('student_no')" class="mt-2" />
                    <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    <input id="course" type="text" name="course" :value="old('course')" required autofocus autocomplete="course" placeholder="Course" />
                    <input id="mobile_no" type="text" name="mobile_no" :value="old('mobile_no')" required autofocus autocomplete="mobile_no" placeholder="Mobile no" />
                    <x-input-error :messages="$errors->get('course')" class="mt-2" />
                    <input id="email" type="text" name="email" :value="old('email')" required autofocus autocomplete="email" placeholder="Email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    <input id="new-password" type="password" name="password" required autocomplete="new-password" placeholder="Password"/>
                    <x-input-error :messages="$errors->get('new-password')" class="mt-2" />
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password"/>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                    <button>Register</button>
                    <button class="close-btn" onclick="closeForms()">Close</button>
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
                        <li><strong class="text-blue-800">Student Council:</strong> CCDI Legazpi Student Council</li>
                    </ul>
                </div>

                <!-- Developer Information -->
                <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-2xl transition-shadow duration-300">
                    <h3 class="text-2xl font-semibold text-blue-700 mb-6 border-b pb-2">Developer & Publication</h3>
                    <ul class="space-y-4 text-gray-700">
                        <li><strong class="text-blue-800">Developer:</strong>
                            <span class="text-blue-600 font-medium">John Doe</span>
                            <p class="text-sm text-gray-500">Full-Stack Developer</p>
                        </li>
                        <li><strong class="text-blue-800">Email:</strong>
                            <a href="mailto:johndoe@example.com" class="text-blue-600 hover:underline">johndoe@example.com</a>
                        </li>
                        <li><strong class="text-blue-800">Phone:</strong>
                            <a href="tel:+639123456789" class="text-blue-600 hover:underline">+63 912 345 6789</a>
                        </li>
                        <li><strong class="text-blue-800">Publication Advisor:</strong>
                            <span class="text-blue-600 font-medium">Jane Smith</span>
                        </li>
                        <li><strong class="text-blue-800">Publication Email:</strong>
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
