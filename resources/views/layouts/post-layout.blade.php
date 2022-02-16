<!--

=========================================================
* Notus JS - v1.1.0 based on Tailwind Starter Kit by Creative Tim
=========================================================

* Product Page: https://www.creative-tim.com/product/notus-js
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/notus-js/blob/main/LICENSE.md)

* Tailwind Starter Kit Page: https://www.creative-tim.com/learning-lab/tailwind-starter-kit/presentation

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Matheus Andreatta | Blog</title>
    <meta name="author" content="name" />
    <meta name="description" content="description here" />
    <meta name="keywords" content="keywords,here" />

    <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" />
    {{-- <link rel="stylesheet" href="../assets/styles/tailwind.css" /> --}}

    <link rel="stylesheet" href="{{asset('assets/styles/tailwind.css')}}" />
    <script src="https://cdn.tailwindcss.com"></script>


    <!--Replace with your tailwind.css once created-->
    </head>

    <body class="bg-gray-100 font-sans leading-normal tracking-normal">


        @yield('content')

        <footer class="relative bg-blueGray-200 pt-8 pb-6 mt-32">
            <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20 h-20"
                style="transform: translateZ(0px)">
                <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                    version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                    <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap text-center lg:text-center">
                    <div class="w-full  px-4">
                        <h4 class="text-3xl font-semibold">The game doesn't end here!</h4>
                        <h5 class="text-lg mt-0 mb-2 text-blueGray-600">
                            Find me on any of these platforms, i try to reply within 5 business days.
                        </h5>
                        <div class="mt-6 lg:mb-0 mb-6">
                            <button
                                class="bg-white text-pink-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
                                type="button"
                                id="myButtonInstagram">
                                <i class="fab fa-instagram"></i></button><button
                                class="bg-white text-lightBlue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
                                type="button"
                                id="myButtonLinkedin">
                                <i class="fab fa-linkedin"></i></button><button
                                class="bg-white text-blueGray-800 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
                                type="button"
                                id="myButtonGithub">
                                <i class="fab fa-github"></i>
                            </button>
                        </div>
                    </div>

                </div>
                <hr class="my-6 border-blueGray-300" />
                <div class="flex flex-wrap items-center md:justify-between justify-center">
                    <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                        <div class="text-sm text-blueGray-500 font-semibold py-1">
                            Copyright © <span id="get-current-year"></span> Developed by Matheus Andreatta.
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <script>
            /* Progress bar */
            //Source: https://alligator.io/js/progress-bar-javascript-css-variables/
            var h = document.documentElement,
                b = document.body,
                st = 'scrollTop',
                sh = 'scrollHeight',
                progress = document.querySelector('#progress'),
                scroll;
            var scrollpos = window.scrollY;
            var header = document.getElementById("header");
            var navcontent = document.getElementById("nav-content");

            document.addEventListener('scroll', function() {

                /*Refresh scroll % width*/
                scroll = (h[st] || b[st]) / ((h[sh] || b[sh]) - h.clientHeight) * 100;
                progress.style.setProperty('--scroll', scroll + '%');

                /*Apply classes for slide in bar*/
                scrollpos = window.scrollY;

                if (scrollpos > 10) {
                    header.classList.add("bg-white");
                    header.classList.add("shadow");
                    navcontent.classList.remove("bg-gray-100");
                    navcontent.classList.add("bg-white");
                } else {
                    header.classList.remove("bg-white");
                    header.classList.remove("shadow");
                    navcontent.classList.remove("bg-white");
                    navcontent.classList.add("bg-gray-100");

                }

            });


            //Javascript to toggle the menu
            document.getElementById('nav-toggle').onclick = function() {
                document.getElementById("nav-content").classList.toggle("hidden");
            }
        </script>

    </body>

</html>
