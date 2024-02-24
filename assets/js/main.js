document.addEventListener('DOMContentLoaded', function() {
  // const themeText = document.getElementById('darkModeDisplayText');
  const darkModeToggle = document.getElementById("darkModeToggle");
  const savedTheme = dGetCookie('darkMode') || (window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light");

// Apply Dark or Light theme
  if (savedTheme) {
    if(savedTheme === "dark") {
      document.documentElement.classList.add('drdt-dark-mode', 'dtdr-color-1');
      // themeText.textContent = 'Dark Mode';
      darkModeToggle.checked = true;
    } else {
      document.documentElement.classList.remove('drdt-dark-mode', 'dtdr-color-1');
      // themeText.textContent = 'Light Mode';
    }
  }
});

function toggleDarkMode () {
  // const themeText = document.getElementById('darkModeDisplayText');

  let currentTheme = document.documentElement.classList.contains('drdt-dark-mode') ? "dark" : "light";
  let newTheme = currentTheme === "dark" ? "light" : "dark";

  // Save the new theme preference
  dSetCookie('darkMode', newTheme);

  // Apply the new theme
  if(newTheme === "dark") {
    document.documentElement.classList.add('drdt-dark-mode', 'dtdr-color-1');
    // themeText.textContent = 'Dark Mode';
  } else {
    document.documentElement.classList.remove('drdt-dark-mode', 'dtdr-color-1');
    // themeText.textContent = 'Light Mode';
  }
}

// set cookie for droit dark mode
function dSetCookie(cname, cvalue, exdays = 365) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  var expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

// get cookie for droit dark mode
function dGetCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) === ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) === 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
