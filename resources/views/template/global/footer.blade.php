<footer>
    <svg class="absolute bottom-0 -z-10" viewBox="0 -20 700 110" width="100%" height="110" preserveAspectRatio="none">
        <path transform="translate(0, -20)" d="M0,10 c80,-22 240,0 350,18 c90,17 260,7.5 350,-20 v50 h-700" fill="#E3FDFD" />
        <path d="M0,10 c80,-18 230,-12 350,7 c80,13 260,17 350,-5 v100 h-700z" fill="#CBF1F5" />
    </svg>
    <div class="footer">
        <div class="about">
            <div class="title">About</div>
            <div class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
        </div>
        <div class="links">
            <div class="title">Database</div>
            <div class="body">
                <div>
                    <a href="#">Cosplayers</a>
                </div>
                <div>
                    <a href="#">Cosplays</a>
                </div>
                <div>
                    <a href="#">Events</a>
                </div>
                <div>
                    <a href="#">Scammer</a>
                </div>
            </div>
        </div>
        <div class="links">
            <div class="title">Website</div>
            <div class="body">
                <div>
                    <a href="#">About Us</a>
                </div>
                <div>
                    <a href="#">Terms</a>
                </div>
                <div>
                    <a href="#">link</a>
                </div>
            </div>
        </div>
    </div>
    <div class="credits">
        <div class="website">
            <a href="{{ route('homepage') }}">{{ config('app.name', 'Cosplayer.gg') }}</a> made by <i class="fa-solid fa-heart text-red-500"></i> and <i class="fa-solid fa-mug-hot"></i>
        </div>
        <div class="developer">Developed by <a href="#">Azukiss</a></div>
    </div>
</footer>
