<!DOCTYPE html>
<html>

<head>
    <title>Andreatta Stack</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="stylesheet" href="{{asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/styles/tailwind.css')}}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('assets/styles/css/style.css')}}">

</head>

<body class="text-blueGray-700 antialiased">
    <nav id="colorlib-main-nav" role="navigation">
        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle active"><i></i></a>
        <div class="js-fullheight colorlib-table">
            <div class="img" style="background-image: url(images/bg_3.jpg);"></div>
            <div class="colorlib-table-cell js-fullheight">
                <div class="row no-gutters">
                    <div class="col-md-12 text-center">
                        <h1 class="mb-4"><a href="#" class="logo">CHOOSE AN OPTION</a></h1>
                        <ul>
                            <li><a href="{{route('home.index')}}"><span>Home</span></a></li>
                            <li class="active"><a href="{{route('profile.index')}}"><span>Profile</span></a></li>
                            <li><a href="{{route('portfolio.index')}}"><span>Portfolio</span></a></li>
                            <li>
                                <a href="{{route('app.ideas.index')}}">
                                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                    <span>Challenge yourself!</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main id="colorlib-page" class="profile-page">
        <header class="bg-dark">
            <div class="container py-1">
                <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle text-dark"><i></i></a>
            </div>
        </header>
        <section class="relative pt-48 pb-4 bg-gray-200">
            <div class="container mx-auto px-24">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg ">
                    <div class="px-6">
                        <div class="flex flex-wrap justify-center">
                            <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center ">
                                <div class="relative ">
                                    <img alt="..." src="{{$user->avatar_url ?? ''}}"
                                        class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px" />
                                </div>
                            </div>
                            <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
                                <div class="py-6 px-3 mt-32 sm:mt-0">
                                    <button
                                        class="bg-pink-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150"
                                        type="button" id="myButton">
                                        Connect
                                    </button>
                                </div>
                            </div>
                            <div class="w-full lg:w-4/12 px-4 lg:order-1">
                                <div class="flex flex-wrap justify-center py-4 lg:pt-4 pt-8">
                                    <div class="p-3 text-center">
                                        <span
                                            class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">22</span><span
                                            class="text-sm text-blueGray-400">Friends</span>
                                    </div>
                                    <div class="p-3 text-center">
                                        <span
                                            class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{$user->followers
                                            ?? ''}}</span><span class="text-sm text-blueGray-400">Followers</span>
                                    </div>
                                    <div class="p-3 text-center">
                                        <span
                                            class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{$user->following
                                            ?? ''}}</span><span class="text-sm text-blueGray-400">Following</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-12">
                            <h3 class="text-4xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
                                {{$user->name ?? ''}}
                            </h3>
                            <div class="flex flex-wrap text-center lg:text-center">
                                <div class="w-full  px-4">
                                    <div class="lg:mb-0 mb-6">
                                        <button
                                            class="bg-white text-pink-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
                                            type="button" id="myButtonInstagram">
                                            <i class="fab fa-instagram"></i></button><button
                                            class="bg-white text-lightBlue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
                                            type="button" id="myButtonLinkedin">
                                            <i class="fab fa-linkedin"></i></button><button
                                            class="bg-white text-blueGray-800 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
                                            type="button" id="myButtonGithub">
                                            <i class="fab fa-github"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>
                            <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                                <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
                                {{$user->location ?? ''}}
                            </div>
                            <div class="mb-2 text-blueGray-600 mt-10">
                                <i class="fas fa-briefcase mr-2 text-lg text-blueGray-400"></i>Developer at
                                {{$user->company ?? ''}}
                            </div>
                            <div class="mb-2 text-blueGray-600">
                                <i class="fas fa-university mr-2 text-lg text-blueGray-400"></i>University of YouTube
                            </div>
                        </div>
                        <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
                            <div class="flex flex-wrap justify-center">
                                <div class="w-full lg:w-9/12 px-4">
                                    <p class="mb-4 text-lg leading-relaxed text-blueGray-700">
                                        {{$user->bio ?? ''}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>
</body>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script>
    /* Make dynamic date appear */
    (function () {
        if (document.getElementById("get-current-year")) {
            document.getElementById(
                "get-current-year"
            ).innerHTML = new Date().getFullYear();
        }
    })();
    /* Function for opning navbar on mobile */
    function toggleNavbar(collapseID) {
        document.getElementById(collapseID).classList.toggle("hidden");
        document.getElementById(collapseID).classList.toggle("block");
    }
    /* Function for dropdowns */
    function openDropdown(event, dropdownID) {
        let element = event.target;
        while (element.nodeName !== "A") {
            element = element.parentNode;
        }
        Popper.createPopper(element, document.getElementById(dropdownID), {
            placement: "bottom-start",
        });
        document.getElementById(dropdownID).classList.toggle("hidden");
        document.getElementById(dropdownID).classList.toggle("block");
    }

</script>
<script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        window.open(`{{$user->html_url}}`, "_blank");
    };
    document.getElementById("myButtonInstagram").onclick = function () {
        window.open("http://instagram.com.br/andreattamatheus", "_blank");
    };
    document.getElementById("myButtonLinkedin").onclick = function () {
        window.open("https://www.linkedin.com/in/matheusandreatta/", "_blank");
    };
    document.getElementById("myButtonGithub").onclick = function () {
        window.open(`{{$user->html_url}}`, "_blank");
    };
</script>

<script type="text/javascript">
    function changeAtiveTab(event, wrapperID, color, tabID) {
        let tabsWrapper = document.getElementById(wrapperID);
        let tabsAnchors = tabsWrapper.querySelectorAll("[data-tab-toggle]");
        let tabsContent = tabsWrapper.querySelectorAll("[data-tab-content]");

        for (let i = 0; i < tabsAnchors.length; i++) {
            if (tabsAnchors[i].getAttribute("data-tab-toggle") === tabID) {
                tabsAnchors[i].classList.remove("text-" + color + "-600");
                tabsAnchors[i].classList.remove("bg-white");
                tabsAnchors[i].classList.add("text-black");
                tabsAnchors[i].classList.add("bg-" + color + "-600");
                tabsContent[i].classList.remove("hidden");
                tabsContent[i].classList.add("block");
            } else {
                tabsAnchors[i].classList.add("text-" + color + "-600");
                tabsAnchors[i].classList.add("bg-white");
                tabsAnchors[i].classList.remove("text-black");
                tabsAnchors[i].classList.remove("bg-" + color + "-600");
                tabsContent[i].classList.add("hidden");
                tabsContent[i].classList.remove("block");
            }
        }
    }
</script>

<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/popper.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>

</html>
