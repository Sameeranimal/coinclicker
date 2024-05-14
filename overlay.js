function overlayOff(overlays) {
  const overlay = document.getElementById(overlays);
  
  overlay.addEventListener('click', function(event) {
    if (event.target.classList.contains('close')) {
      overlay.style.display = 'none'; 
    }
  });
}

function overlayOn(overlays) {
  document.getElementById(overlays).style.display = 'block';
}
