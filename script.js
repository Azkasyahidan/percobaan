// ---------- guest name from URL ?to=Nama ----------
const params = new URLSearchParams(window.location.search);
const guest = params.get('to');
if (guest) { 
    document.getElementById('guest-name').textContent = decodeURIComponent(guest); 
}

// ---------- open invitation ----------
const cover = document.getElementById('cover');
const openBtn = document.getElementById('open-btn');
const musicBtn = document.getElementById('music-toggle');
const audio = document.getElementById('gamelan-audio');

document.body.style.overflow = 'hidden';

openBtn.addEventListener('click', () => {
    cover.classList.add('opened');
    document.body.style.overflow = 'auto';
    
    setTimeout(() => { 
        cover.style.display = 'none'; 
    }, 950);
    
    audio.play().then(() => {
        musicBtn.classList.add('spinning');
    }).catch(() => { /* no audio source provided yet */ });
});

// ---------- music toggle ----------
musicBtn.addEventListener('click', () => {
    if (audio.paused) {
        audio.play().then(() => musicBtn.classList.add('spinning')).catch(() => {});
    } else {
        audio.pause();
        musicBtn.classList.remove('spinning');
    }
});

// ---------- countdown ----------
const targetDate = new Date('2026-12-01T08:00:00+07:00').getTime();

function updateCountdown() {
    const now = Date.now();
    let diff = targetDate - now;
    if (diff < 0) diff = 0;
    
    const d = Math.floor(diff / (1000 * 60 * 60 * 24));
    const h = Math.floor((diff / (1000 * 60 * 60)) % 24);
    const m = Math.floor((diff / (1000 * 60)) % 60);
    const s = Math.floor((diff / 1000) % 60);
    
    document.getElementById('cd-days').textContent = String(d).padStart(2, '0');
    document.getElementById('cd-hours').textContent = String(h).padStart(2, '0');
    document.getElementById('cd-mins').textContent = String(m).padStart(2, '0');
    document.getElementById('cd-secs').textContent = String(s).padStart(2, '0');
}
updateCountdown();
setInterval(updateCountdown, 1000);

// ---------- copy account number ----------
document.querySelectorAll('.copy-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        const target = document.getElementById(btn.dataset.target);
        const text = target.textContent.trim();
        
        navigator.clipboard.writeText(text).then(() => {
            const original = btn.textContent;
            btn.textContent = 'Tersalin!';
            btn.classList.add('copied');
            
            setTimeout(() => { 
                btn.textContent = original; 
                btn.classList.remove('copied'); 
            }, 1800);
        }).catch(() => {});
    });
});

// ---------- RSVP -> WhatsApp ----------
// Ganti nomor di bawah ini dengan nomor WhatsApp aktif (format: kode negara tanpa "+")
const WHATSAPP_NUMBER = '6281234567890';

document.getElementById('rsvp-form').addEventListener('submit', (e) => {
    e.preventDefault();
    const name = document.getElementById('rsvp-name').value.trim();
    const count = document.getElementById('rsvp-count').value;
    const status = document.getElementById('rsvp-status').value;
    
    const text = `Assalamu'alaikum, saya ${name} ingin mengonfirmasi kehadiran (${count} orang): ${status} pada pernikahan Peggy & Jody.`;
    const url = `https://wa.me/${WHATSAPP_NUMBER}?text=${encodeURIComponent(text)}`;
    
    window.open(url, '_blank');
});

// ---------- Ucapan & Doa (tersimpan sementara selama sesi berlangsung) ----------
const wishList = document.getElementById('wish-list');
const wishEmpty = document.getElementById('wish-empty');

document.getElementById('wish-form').addEventListener('submit', (e) => {
    e.preventDefault();
    const name = document.getElementById('wish-name').value.trim();
    const message = document.getElementById('wish-message').value.trim();
    if (!name || !message) return;

    wishEmpty.style.display = 'none';
    
    const item = document.createElement('div');
    item.className = 'wish-item';
    
    const whoSpan = document.createElement('span');
    whoSpan.className = 'who';
    whoSpan.textContent = name;
    
    const msgP = document.createElement('p');
    msgP.textContent = message;
    
    item.appendChild(whoSpan);
    item.appendChild(msgP);
    
    wishList.insertBefore(item, wishEmpty.nextSibling);
    document.getElementById('wish-form').reset();
});

// ---------- scroll reveal ----------
const revealEls = document.querySelectorAll('.reveal');
const io = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) { 
            entry.target.classList.add('in'); 
        }
    });
}, { threshold: 0.15 });

revealEls.forEach(el => io.observe(el));