// ====== JAVASCRIPT NAVBAR ====== //

  // ===== Navbar Scroll Hide/Show =====
  let lastScroll = 0;
  const navbar = document.getElementById('navbar');
  window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset;
    if (Math.abs(currentScroll - lastScroll) < 5) return;

    if (currentScroll > lastScroll && currentScroll > navbar.offsetHeight) {
      navbar.classList.add('navbar-hide');
    } else {
      navbar.classList.remove('navbar-hide');
    }
    lastScroll = currentScroll <= 0 ? 0 : currentScroll;
  });

  // ===== Mobile Menu =====
  const hamburger = document.getElementById('hamburger');
  const mobileMenu = document.getElementById('mobileMenu');
  const closeMenu = document.getElementById('closeMenu');

  hamburger.addEventListener('click', () => {
    mobileMenu.classList.remove('hidden');          
    setTimeout(() => {
      mobileMenu.classList.remove('translate-x-full'); 
      mobileMenu.classList.add('translate-x-0');
    }, 10);
  });

  closeMenu.addEventListener('click', () => {
    mobileMenu.classList.remove('translate-x-0');
    mobileMenu.classList.add('translate-x-full');
    setTimeout(() => mobileMenu.classList.add('hidden'), 300);
  });

  // ===== Popup Login =====
  const profileBtn = document.getElementById('profileBtn');
  const loginPopup = document.getElementById('loginPopup');
  const closePopup = document.getElementById('closePopup');
  const profileDropdown = document.getElementById("profileDropdown");

  profileBtn.addEventListener('click', () => { 
    loginPopup.classList.remove('hidden'); 
    loginPopup.classList.add('flex'); 
  });
  closePopup.addEventListener('click', () => { 
    loginPopup.classList.add('hidden'); 
    loginPopup.classList.remove('flex'); 
  });

  // ===== Dropdown Desktop =====
  const mediaBtn = document.getElementById('mediaBtn');
  const mediaDropdown = document.getElementById('mediaDropdown');
  const langBtn = document.getElementById('languageDropdownButton'); // ✅ disamakan
  const langDropdown = document.getElementById('language-dropdown'); // ✅ disamakan

  mediaBtn.addEventListener('click', () => {
    mediaDropdown.classList.toggle('hidden');
  });
  langBtn.addEventListener('click', () => {
    langDropdown.classList.toggle('hidden');
  });

  // ===== Social Login =====
  document.getElementById('loginGoogle').addEventListener('click', () => {
    signInWithPopup(auth, new GoogleAuthProvider()).then(() => {
      loginPopup.classList.add('hidden');
    }).catch(console.error);
  });

  document.getElementById('loginFacebook').addEventListener('click', () => {
    signInWithPopup(auth, new FacebookAuthProvider()).then(() => {
      loginPopup.classList.add('hidden');
    }).catch(console.error);
  });

  document.getElementById('loginApple').addEventListener('click', () => {
    signInWithPopup(auth, new OAuthProvider('apple.com')).then(() => {
      loginPopup.classList.add('hidden');
    }).catch(console.error);
  });

  // ===== Login via Email Link =====
  document.getElementById('loginEmailBtn').addEventListener('click', () => {
    const email = document.getElementById('emailInput').value;
    sendSignInLinkToEmail(auth, email, {
      url: window.location.href,
      handleCodeInApp: true
    }).then(() => {
      window.localStorage.setItem('emailForSignIn', email);
      alert("Cek email untuk verifikasi login.");
    }).catch(console.error);
  });



// ====== JAVASCRIPT FOOTER ====== //

    // init AOS
    AOS.init({ duration: 700, once: true });

    // mobile menu toggle
    const mobileBtn = document.getElementById('mobileBtn');
    const mobilePanel = document.getElementById('mobilePanel');
    mobileBtn?.addEventListener('click', () => {
      if (mobilePanel.classList.contains('hidden')) {
        mobilePanel.classList.remove('hidden');
        mobilePanel.classList.add('animate-slide-down');
      } else {
        mobilePanel.classList.add('hidden');
        mobilePanel.classList.remove('animate-slide-down');
      }
    });

    // simple "will-animate" reveal fallback (for browsers without AOS immediate triggering)
    document.addEventListener('DOMContentLoaded', () => {
      const els = document.querySelectorAll('.will-animate');
      els.forEach((el, idx) => {
        setTimeout(() => el.classList.add('show'), idx * 90);
      });
    });

    // Reader modal
    function openReader(title){
      document.getElementById('readerTitle').textContent = title;
      document.getElementById('readerModal').classList.remove('hidden');
      document.getElementById('readerModal').classList.add('flex');
    }
    function closeReader(){
      document.getElementById('readerModal').classList.add('hidden');
      document.getElementById('readerModal').classList.remove('flex');
    }

    // small accessibility: close modal with Esc
    document.addEventListener('keydown', (e)=>{
      if(e.key === 'Escape') closeReader();
    });

    // feather icons replacement (if present)
    try{ feather.replace(); }catch(e){}

    let player;
    function onYouTubeIframeAPIReady() {
      player = new YT.Player('ytPlayer', {
        events: {
          'onReady': function(event) {
            event.target.playVideo();
          }
        }
      });
    }

    // Klik iframe wrapper untuk play/pause
    document.getElementById("ytPlayer").addEventListener("click", function () {
      if (player.getPlayerState() === YT.PlayerState.PLAYING) {
        player.pauseVideo();
      } else {
        player.playVideo();
      }
    });
