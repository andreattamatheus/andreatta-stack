<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}"/>
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="stylesheet" href="{{asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/styles/tailwind.css')}}"/>
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Andreatta Stack</title>
</head>

<body class="text-blueGray-700 antialiased">

    <main class="profile-page">
        <section class="relative block h-500-px">
            <div class="absolute top-0 w-full h-full bg-center bg-cover" style="
            background-image: url('https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80');
          ">
                <img src="{{asset('assets/img/meteor-falling.gif')}}" alt="Computer man" style="width:100%;object-position:top;">
            </div>

            <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px"
                style="transform: translateZ(0px)">
                <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                    <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </section>
        <section class="relative py-16 bg-blueGray-200">
            <div class="container mx-auto px-24">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
                    <div class="px-6 ">
                        <div class="flex flex-wrap justify-center ">
                            <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center ">
                                <div class="relative ">
                                    <img alt="..." src="{{$user->avatar_url ?? ''}}"
                                        class="animate-pulse shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px" />
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
                                <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                    <div class="mr-4 p-3 text-center">
                                        <span
                                            class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">22</span><span
                                            class="text-sm text-blueGray-400">Friends</span>
                                    </div>
                                    <div class="mr-4 p-3 text-center">
                                        <span
                                            class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{$user->followers
                                            ?? ''}}</span><span class="text-sm text-blueGray-400">Followers</span>
                                    </div>
                                    <div class="lg:mr-4 p-3 text-center">
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

                        <div class="flex flex-wrap" id="wrapper-for-icons-amber">
                            <div class="w-full flex-wrap">
                                <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row flex-md-column">
                                    {{-- <li class="mb-px mr-2 last:mr-0 flex-auto text-center">
                                        <a href="{{route('blog.index')}}" class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-white bg-amber-600"
                                            data-tab-toggle="icon-tab-profile-amber"
                                            onclick="changeAtiveTab(event,'wrapper-for-icons-amber','amber','icon-tab-profile-amber')">
                                            <i class="fas fa-space-shuttle text-base mr-1"></i> Blog
                                        </a>
                                    </li> --}}
                                    <li class="mb-px mr-2 last:mr-0 flex-auto text-center">
                                        <a href="{{route('portfolio.index')}}" class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-amber-600 bg-white"
                                            data-tab-toggle="icon-tab-settings-amber"
                                            onclick="changeAtiveTab(event,'wrapper-for-icons-amber','amber','icon-tab-settings-amber')">
                                            <i class="fas fa-cog text-base mr-1"></i> Portfolio
                                        </a>
                                    </li>
                                    <li class="mb-px mr-2 last:mr-0 flex-auto text-center">
                                        <a href="/functions" class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-amber-600 bg-white"
                                            data-tab-toggle="icon-tab-options-amber"
                                            onclick="changeAtiveTab(event,'wrapper-for-icons-amber','amber','icon-tab-options-amber')">
                                            <i class="fas fa-briefcase text-base mr-1"></i> The only choice!
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <footer class="relative bg-blueGray-200 pt-8 pb-6">
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
                        Copyright © <span id="get-current-year"></span> Developed by
                        <a href="https://www.creative-tim.com?ref=njs-profile"
                            class="text-blueGray-500 hover:text-blueGray-800">{{$user->login}}</a>.
                    </div>
                </div>
            </div>
        </div>
    </footer>
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
    function changeAtiveTab(event,wrapperID,color,tabID){
      let tabsWrapper = document.getElementById(wrapperID);
      let tabsAnchors = tabsWrapper.querySelectorAll("[data-tab-toggle]");
      let tabsContent = tabsWrapper.querySelectorAll("[data-tab-content]");

      for(let i = 0; i < tabsAnchors.length; i++) {
        if(tabsAnchors[i].getAttribute("data-tab-toggle") === tabID){
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

</html>
