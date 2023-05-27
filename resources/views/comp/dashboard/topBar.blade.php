            <div class='topBar shadow d-flex justify-content-center align-items-center'>
                <div class="container d-flex justify-content-between align-items-center">
                    <h2 class='m-0'>Store</h2>
                    <div class="d-flex justify-content-center align-items-center">

                        <a class="btn btn-primary mx-2" href="/">Go To Home</a>

                        <a class="btn btn-danger mx-2" href="#">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <button class="text-white" type="submit" @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </a>
                    </div>
                </div>
            </div>
