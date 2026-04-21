<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
            <!-- <div class="container"> -->
                <!-- <a class="navbar-brand" href="/">Bihari Muslim Group UK</a> -->

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#mainMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="mainMenu">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="/member" class="nav-link">Members</a></li>
                        <li class="nav-item"><a href="/coming-soon" class="nav-link">Events</a></li>
                        <li class="nav-item"><a href="/coming-soon" class="nav-link">Gallery</a></li>
                        <li class="nav-item"><a href="/contact" class="nav-link">Contact</a></li>
                        @if(session()->has('member_id'))
                            <li class="nav-item"><a href="/dashboard" class="nav-link">{{session()->get('member_name')}}</a></li>
                            <li class="nav-item"><a href="/member-logout" class="nav-link">Logout</a></li>
                        @else
                            <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
                        @endif
                    </ul>
                </div>
        </nav>