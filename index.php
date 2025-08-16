<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Melody Vista – Your Music, Elevated</title>
    <meta
      name="description"
      content="Stream playlists, discover artists, and elevate your music experience with Melody Vista."
    />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <style>
      :root {
        --bg: #0b0d12; /* page background */
        --card: #141824; /* card background */
        --muted: #aab2c0; /* secondary text */
        --text: #e7ebf3; /* primary text */
        --brand: #7c5cff; /* accent */
        --brand-2: #25d0a6; /* accent 2 */
        --ring: 0 0 0 3px color-mix(in oklab, var(--brand) 35%, transparent);
        --radius: 16px;
        --shadow: 0 10px 25px rgba(0, 0, 0, 0.35);
      }
      * {
        box-sizing: border-box;
      }
      html,
      body {
        height: 100%;
      }
      body {
        margin: 0;
        font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto,
          Helvetica, Arial, Noto Sans, "Apple Color Emoji", "Segoe UI Emoji";
        background: radial-gradient(
            1200px 800px at 85% -20%,
            rgba(124, 92, 255, 0.35),
            transparent 55%
          ),
          radial-gradient(
            1000px 700px at -10% -10%,
            rgba(37, 208, 166, 0.25),
            transparent 50%
          ),
          var(--bg);
        color: var(--text);
        line-height: 1.5;
      }
      a {
        color: inherit;
        text-decoration: none;
      }
      .container {
        width: min(1200px, 92%);
        margin: auto;
      }
      /* --- navbar --- */
      .nav {
        position: sticky;
        top: 0;
        backdrop-filter: saturate(1.4) blur(10px);
        background: rgba(11, 13, 18, 0.35);
        border-bottom: 1px solid rgba(255, 255, 255, 0.06);
        z-index: 10;
      }
      .nav-inner {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        padding: 14px 0;
      }
      .brand {
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 700;
      }
      .logo {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        display: grid;
        place-items: center;
        background: conic-gradient(from 210deg, var(--brand), var(--brand-2));
        box-shadow: inset 0 0 0 2px rgba(255, 255, 255, 0.08);
      }
      .brand span {
        letter-spacing: 0.2px;
      }
      .nav-actions {
        display: flex;
        gap: 10px;
      }
      .btn {
        border: 1px solid rgba(255, 255, 255, 0.08);
        background: rgba(255, 255, 255, 0.02);
        color: var(--text);
        padding: 10px 14px;
        border-radius: 12px;
        font-weight: 600;
        cursor: pointer;
      }
      .btn:hover {
        border-color: rgba(255, 255, 255, 0.18);
      }
      .btn.primary {
        background: linear-gradient(135deg, var(--brand), var(--brand-2));
        border-color: transparent;
        box-shadow: 0 10px 20px rgba(124, 92, 255, 0.25);
      }
      /* --- hero --- */
      .hero {
        padding: 32px 0 28px;
      }
      .hero-grid {
        display: grid;
        grid-template-columns: 1.1fr 0.9fr;
        gap: 28px;
      }
      @media (max-width: 900px) {
        .hero-grid {
          grid-template-columns: 1fr;
        }
      }
      .hero-card {
        background: linear-gradient(
            165deg,
            rgba(124, 92, 255, 0.18),
            rgba(124, 92, 255, 0.04) 35%,
            rgba(37, 208, 166, 0.06)
          ),
          var(--card);
        border: 1px solid rgba(255, 255, 255, 0.06);
        border-radius: var(--radius);
        padding: 34px;
        box-shadow: var(--shadow);
      }
      .eyebrow {
        font-size: 0.85rem;
        color: var(--muted);
        letter-spacing: 0.28em;
        text-transform: uppercase;
      }
      h1 {
        font-size: clamp(28px, 4.5vw, 56px);
        margin: 8px 0 12px;
        line-height: 1.05;
      }
      .lead {
        color: var(--muted);
        font-size: clamp(14px, 1.85vw, 18px);
      }
      .hero-actions {
        margin-top: 20px;
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
      }
      .search {
        margin-top: 22px;
        display: flex;
        gap: 10px;
      }
      .input {
        flex: 1;
        padding: 12px 14px;
        background: #0d1018;
        border: 1px solid rgba(255, 255, 255, 0.08);
        color: var(--text);
        border-radius: 12px;
      }
      .input:focus {
        outline: none;
        box-shadow: var(--ring);
        border-color: transparent;
      }
      .stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 14px;
        margin-top: 22px;
      }
      .stat {
        background: var(--card);
        border: 1px solid rgba(255, 255, 255, 0.06);
        padding: 16px;
        border-radius: 14px;
        text-align: center;
      }
      .stat b {
        font-size: 1.25rem;
      }
      /* --- playlists --- */
      .section {
        padding: 24px 0;
      }
      .section h2 {
        font-size: clamp(22px, 2.6vw, 30px);
        margin: 0 0 12px;
      }
      .grid {
        display: grid;
        grid-auto-flow: column;
        grid-auto-columns: 16%;
        gap: 16px;
        overflow-x: auto;
        padding-bottom: 10px;
        -ms-overflow-style: none; /* hide scrollbar in IE/Edge */
        scrollbar-width: none; 
      }
      @media (max-width: 1200px) {
        .grid {
          grid-template-columns: repeat(4, 1fr);
        }
      }
      @media (max-width: 900px) {
        .grid {
          grid-template-columns: repeat(3, 1fr);
        }
      }
      @media (max-width: 620px) {
        .grid {
          grid-template-columns: repeat(2, 1fr);
        }
      }
      .card {
        background: var(--card);
        border: 1px solid rgba(255, 255, 255, 0.06);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: var(--shadow);
        transition: transform 0.2s ease;
      }
      .card:hover {
        transform: translateY(-3px);
      }
      .thumb {
        aspect-ratio: 1/1;
        background: linear-gradient(
          135deg,
          rgba(124, 92, 255, 0.25),
          rgba(37, 208, 166, 0.25)
        );
        display: grid;
        place-items: center;
        font-weight: 700;
        font-size: 20px;
      }
      .pill {
        display: inline-block;
        font-size: 12px;
        padding: 4px 8px;
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 999px;
        color: var(--muted);
      }
      .card-body {
        padding: 12px 14px;
      }
      .subtitle {
        color: var(--muted);
        font-size: 0.92rem;
      }
      /* --- player --- */
      .player {
        position: sticky;
        bottom: 0;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
        background: rgba(13, 16, 24, 0.85);
        backdrop-filter: blur(12px);
      }
      .player-inner {
        display: grid;
        grid-template-columns: 1.2fr 1fr 1fr;
        gap: 16px;
        align-items: center;
        padding: 12px 0;
      }
      @media (max-width: 900px) {
        .player-inner {
          grid-template-columns: 1fr;
        }
      }
      .track {
        display: flex;
        align-items: center;
        gap: 12px;
      }
      .track img {
        width: 48px;
        height: 48px;
        border-radius: 10px;
      }
      .controls {
        display: flex;
        align-items: center;
        gap: 10px;
        justify-content: center;
      }
      .controls button {
        background: #101522;
        border: 1px solid rgba(255, 255, 255, 0.08);
        padding: 8px 10px;
        border-radius: 12px;
        cursor: pointer;
        color: var(--text);
      }
      .progress {
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
      }
      .range {
        flex: 1;
        height: 6px;
        background: #0f1420;
        border-radius: 999px;
        position: relative;
        overflow: hidden;
      }
      /* .fill {
        position: absolute;
        inset: 0 40% 0 0;
        background: linear-gradient(90deg, var(--brand), var(--brand-2));
      } */
      .fill {
          position: absolute;
          inset: 0 100% 0 0; /* starts at 0% progress */
          background: linear-gradient(90deg, var(--brand), var(--brand-2));
          transition: inset 0.1s linear; /* smooth progress */
      }
      /* --- footer --- */
      footer {
        padding: 36px 0 80px;
        color: var(--muted);
      }

      #overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5); /* dark shade */
        backdrop-filter: blur(5px);      /* blur background */
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
      }

      #overlay img {
          width: 80px; /* adjust loader size */
          height: 80px;
      }

    </style>
  </head>
  <body>
    <header class="nav">
      <div class="container nav-inner">
        <a class="brand" href="#">
          <span class="logo" aria-hidden="true">🎵</span>
          <span>Melody Vista</span>
        </a>
        <nav class="nav-actions">
          <a class="btn" href="#explore">Explore</a>
          <a class="btn" href="#library">Library</a>
          <a class="btn primary" href="#get-started">Get Started</a>
        </nav>
      </div>
    </header>

    <main class="container">
      <section class="hero">
        <div class="hero-grid">
          <div class="hero-card">
            <div class="eyebrow">Your Music, Elevated</div>
            <h1>Discover new sounds. Build your vibe. Play it loud.</h1>
            <p class="lead">
              A sleek music hub for playlists, artists, and tracks you love. No
              clutter—just a beautiful, fast experience.
            </p>

            <div class="hero-actions">
              <a class="btn primary" href="#explore">Start Listening</a>
              <a class="btn" href="#trending">See What’s Trending</a>
            </div>

            <form class="search" onsubmit="event.preventDefault()">
              <input
                class="input"
                type="search"
                placeholder="Search songs, artists, or albums…"
                aria-label="Search"
              />
              <button class="btn" type="submit">Search</button>
            </form>

            <div class="stats">
              <div class="stat">
                <b>2.1M+</b>
                <div class="subtitle">Tracks</div>
              </div>
              <div class="stat">
                <b>120k</b>
                <div class="subtitle">Artists</div>
              </div>
              <div class="stat">
                <b>24/7</b>
                <div class="subtitle">Streaming</div>
              </div>
            </div>
          </div>
          <div class="hero-card" aria-label="Featured Playlist">
            <div
              class="thumb"
              style="border-bottom: 1px solid rgba(255, 255, 255, 0.06)"
            >
              Top Mix
            </div>
            <div class="card-body">
              <div class="pill">Curated</div>
              <h3 style="margin: 8px 0 0">Focus Flow</h3>
              <p class="subtitle" style="margin: 6px 0 0">
                Synthwave • Lo-fi • Ambient
              </p>
            </div>
          </div>
        </div>
      </section>

      <section id="trending" class="section">
        <h2>Trending Songs</h2>
        <div class="grid" id="loadInit">
        </div>
      </section>

      <section id="explore" class="section">
        <h2>Popular Artists</h2>
        <div class="grid" id="loadInitArtist">
          
          <article class="card">
            <div class="thumb">🧑‍🎤</div>
            <div class="card-body">
              <strong>Neon Dusk</strong>
              <div class="subtitle">Indie Pop</div>
            </div>
          </article>
          <article class="card">
            <div class="thumb">🎙️</div>
            <div class="card-body">
              <strong>Blue Echo</strong>
              <div class="subtitle">Lo‑fi</div>
            </div>
          </article>
          <article class="card">
            <div class="thumb">🎹</div>
            <div class="card-body">
              <strong>Analog Sky</strong>
              <div class="subtitle">Ambient</div>
            </div>
          </article>
          <article class="card">
            <div class="thumb">🥁</div>
            <div class="card-body">
              <strong>Rhythm Yard</strong>
              <div class="subtitle">Hip‑hop</div>
            </div>
          </article>
          <article class="card">
            <div class="thumb">🎻</div>
            <div class="card-body">
              <strong>String Theory</strong>
              <div class="subtitle">Classical</div>
            </div>
          </article>
        </div>
      </section>
    </main>
    
    <div id="overlay" style="display:none;">
        <img src="assets/loading1.gif" alt="Loading...">
    </div>

    <footer class="container">
      <footer>
        <div>© <span id="year"></span> Melody Vista. All rights reserved.</div>
      </footer>
    </footer>

    <div class="player">
      <div class="container player-inner">
        <div class="track">
          <img src="https://usercontent.jamendo.com?type=album&id=144705&width=300&trackid=1204669" alt="Album art" id="curr_img" />
          <div>
            <div><strong  id="curr_music">What Is Love</strong></div>
            <div class="subtitle"><span id="curr_artist">Melanie Ungar</span> • <span id="curr_duration">2:12</span></div>
            <div style="display: none;">
              <audio controls id="player">
                <source src="https://prod-1.storage.jamendo.com/?trackid=1204669&format=mp32&from=kPWpcG%2F9SDBv2UkHGmUIlA%3D%3D%7Ckwg9Di0tmucSjPc1XxiQlA%3D%3D" type="audio/mpeg" id="curr_play">
              </audio>
            </div>
          </div>
        </div>
        <div class="controls">
          <button aria-label="Previous">⏮</button>
          <button aria-label="Play/Pause" id="play_pause" onclick="startMusic('play')">▶</button>
          <button aria-label="Next">⏭</button>
        </div>
        <div class="progress">
          <small id="curr_time">0:00</small>
          <div class="range" aria-hidden="true"><span class="fill"></span></div>
          <small id="end_time">3:42</small>
        </div>
      </div>
    </div>

  <script>
  document.getElementById("year").textContent = new Date().getFullYear();

  $(document).ready(function () {
    initApp();
    initArtist();
  });

  const player = document.getElementById("player");
  const range = document.querySelector(".range");
  const fill = document.querySelector(".fill");
  const currTime = document.getElementById("curr_time");

  player.addEventListener("timeupdate", () => {
    const percent = (player.currentTime / player.duration) * 100;
    fill.style.width = percent + "%";

    let cleanTime = Math.floor(player.currentTime);
    currTime.textContent = formatTime(cleanTime);
  });

  range.addEventListener("mousedown", (e) => {
    const rect = range.getBoundingClientRect();
    const updateTime = (clientX) => {
      const clickX = clientX - rect.left;
      const percent = Math.max(0, Math.min(1, clickX / rect.width));
      player.currentTime = percent * player.duration;
    };

    updateTime(e.clientX);

    const move = (ev) => updateTime(ev.clientX);
    const up = () => {
      document.removeEventListener("mousemove", move);
      document.removeEventListener("mouseup", up);
    };

    document.addEventListener("mousemove", move);
    document.addEventListener("mouseup", up);
  });


  function initApp() {
    $.ajax({
      url: "ajax_music.php",
      type: "POST",
      data: {
        action: "localInitMusic"
      },
      cache: false,
      success: function (response) {
        var data = JSON.parse(response);
        var htmlReponse = "";
        for (let i=0; i < data.length; i++){
          var id = data[i].id;
          var name = data[i].name;
          var image = data[i].image;
          var artist = data[i].artist;
          var duration = data[i].duration;
          duration = formatTime(duration);
          var musicJson = data[i];
          musicJson = JSON.stringify(musicJson);
          
          htmlReponse += "<article class='card' onclick='playMusic("+id+")'> <div class='thumb'><img src='"+image+"' alt='logo' style='width: 100%;height: auto;'></div> <div class='card-body'> <strong>"+name+"</strong> <div class='subtitle'>I"+artist+"</div><input type='hidden' id='musicJson"+id+"' value='"+musicJson+"'> </div> </article>";
        }
        $('#loadInit').html(htmlReponse);
      }
    });
  }

  function initArtist() {
    $.ajax({
      url: "ajax_music.php",
      type: "POST",
      data: {
        action: "localInitArtist"
      },
      cache: false,
      success: function (response) {
        var data = JSON.parse(response);
        var htmlReponse = "";
        for (let i=0; i < data.length; i++){
          var name = data[i].name;
          var image = data[i].image;
          if(image == "" || image == undefined){
            image = "assets/user.png";
          }
          var band_id = data[i].shareurl;
          
          htmlReponse += "<article class='card'> <div class='thumb'><img src='"+image+"' alt='logo' style='width: 100%;height: auto;'></div> <div class='card-body'> <strong>"+name+"</strong> <div class='subtitle'></div><input type='hidden' value='"+band_id+"'> </div> </article>";
        }
        $('#loadInitArtist').html(htmlReponse);
      }
    });
  }

  function playMusic(id) {
    var song_details = $('#musicJson'+ id).val();
    song_details = JSON.parse(song_details);
    $('#curr_img').attr("src", song_details.image);
    $('#curr_music').html(song_details.name);
    $('#curr_artist').html(song_details.artist);
    var duration = song_details.duration;
    duration = formatTime(duration);
    $('#curr_duration').html(duration);
    $('#end_time').html(duration);
    $('#curr_play').attr("src", song_details.audio);

    $("#overlay").show();
    $("#player")[0].load();
    $("#player")[0].play();
    $('#play_pause').html("⏸");
    $("#play_pause").attr("onclick", "startMusic('pause')");
    
    $("#player").off("canplay").on("canplay", function() {
        $("#overlay").hide();
    });
  }

  function startMusic(status) {
    var status = status;
    $("#overlay").show();
    if(status == "play"){
      $('#play_pause').html("⏸");
      
      $("#player")[0].play();
      $("#overlay").hide();

      $("#play_pause").attr("onclick", "startMusic('pause')");
    }else {
      $('#play_pause').html("▶");

      $("#player")[0].pause();
      $("#overlay").hide();
      $("#play_pause").attr("onclick", "startMusic('play')");
    }
  }

  function formatTime(seconds) {
    let min = Math.floor(seconds / 60);
    let sec = seconds % 60;
    return min + ":" + (sec < 10 ? "0" + sec : sec);
  }
</script>

  </body>
</html>
